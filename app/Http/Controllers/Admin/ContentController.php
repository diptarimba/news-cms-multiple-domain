<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Content;
use App\Models\URLMapping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $content = Content::orderBy('created_at', 'desc')->select('posted_at','title', 'slug', 'id');
            $domain = $request->getHttpHost();
            return datatables()->of($content)
            ->addIndexColumn()
            ->addColumn('code', function($query){
                return $query->code ?? '';
            })
            ->addColumn('posted_at', function($query){
                return Carbon::parse($query->posted_at)->format("d F Y");
            })
            ->addColumn('link', function($query) use ($domain){
                $url = $domain . '/show/' . $query->slug;
                $buttonAction = '<a target="_blank" href="//' . $url . '" class="' . self::CLASS_BUTTON_INFO . '">View</a>';
                return $buttonAction;
            })
            ->addColumn('action', function ($query) {
                return $this->getActionColumn($query, 'content');
            })
            ->rawColumns(['action', 'link'])
            ->make(true);
        }

        return view('page.admin-dashboard.content.index');
    }

    public function getActionColumn($data, $path = '', $prefix = 'admin')
    {
        $ident = Str::random(10);
        $editBtn = route("$prefix.$path.edit", $data->id);
        $deleteBtn = route("$prefix.$path.destroy", $data->id);
        $duplicateBtn = route("$prefix.$path.duplicate", $data->id);
        $buttonAction = '<a href="' . $duplicateBtn . '" class="' . self::CLASS_BUTTON_WARNING . '">Duplicate</a>';
        $buttonAction .= '<a href="' . $editBtn . '" class="' . self::CLASS_BUTTON_PRIMARY . '">Edit</a>';
        $buttonAction .= '<button type="button" onclick="delete_data(\'form' . $ident . '\')"class="' . self::CLASS_BUTTON_DANGER . '">Delete</button>' . '<form id="form' . $ident . '" action="' . $deleteBtn . '" method="post"> <input type="hidden" name="_token" value="' . csrf_token() . '" /> <input type="hidden" name="_method" value="DELETE"> </form>';
        return $buttonAction;
    }

    public function duplicate(Content $content)
    {
        $data = [
            'title' => "Duplicate Content Data",
            'url' => route("admin.content.store"),
            'home' => route("admin.content.index")
        ];
        $category = Category::get()->pluck('name', 'id');
        $content->posted_at = Carbon::parse($content->posted_at)->format("Y-m-d");
        return view('page.admin-dashboard.content.create-edit', compact('data', 'content', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->createMetaPageData(null, 'Content', 'content');
        $category = Category::get()->pluck('name', 'id');
        $domain = URLMapping::groupBy('domain')->get('domain')->pluck('domain')->mapWithKeys(function($each) {
            return [$each => $each];
        });
        return view('page.admin-dashboard.content.create-edit', compact('data', 'category', 'domain'));
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required',
                'posted_at' => 'required',
                'content' => 'required',
                'code' => 'sometimes',
                'category_id' => 'required',
                'domain' => 'required|array|min:1'
            ]);

            $title = trim($request->title);
            $title = preg_replace('/[^a-zA-Z0-9\s]/', '', $title);
            $title = substr($title, 0, 100);
            $slug = Str::slug($title) .'-'. strtoupper(Str::random(10));

            $content = Content::create(array_merge($request->all(), [
                'author_id' => auth()->user()->id,
                'slug' =>  $slug,
                'title' => trim($request->title)
            ]));

            $getDomainId = URLMapping::whereIn('domain', $request->domain)->pluck('id');

            $content->domain()->attach($getDomainId);
            // dd($getDomainId);

            $returnData = ['posted_at' => $request->posted_at, 'category_id' => $request->category_id, 'domain' => $request->domain];
            if ($request->code){
                $returnData['code'] = $request->code;
            }

            if ($request->recreate){
                return redirect()->route('admin.content.create', $returnData)->with('success', 'Content has been created');
            }

            return redirect()->route('admin.content.index')->with('success', 'Content has been created');
        }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        $data = $this->createMetaPageData($content->id, 'Content', 'content');
        $category = Category::get()->pluck('name', 'id');
        $content->posted_at = Carbon::parse($content->posted_at)->format("Y-m-d");
        return view('page.admin-dashboard.content.create-edit', compact('data', 'content', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Content $content)
    {
        $request->validate([
            'title' => 'required',
            'posted_at' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        $content->update($request->all(), [
            'title' => trim($request->title),
        ]);
        return redirect()->route('admin.content.index')->with('success', 'Content has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        try {
            $content->delete();
            return redirect()->route('admin.content.index')->with('success', 'Content has been deleted');
        } catch (\Throwable $th) {
            return redirect()->route('admin.content.index')->with('error', 'Content cannot be deleted');
        }
    }

}
