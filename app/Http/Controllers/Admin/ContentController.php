<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Content;
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
            $content = Content::select();
            return datatables()->of($content)
            ->addIndexColumn()
            ->addColumn('posted_at', function($query){
                return Carbon::parse($query->posted_at)->format("d F Y");
            })
            ->addColumn('action', function ($query) {
                return $this->getActionColumn($query, 'content');
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('page.admin-dashboard.content.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->createMetaPageData(null, 'Content', 'content');
        $category = Category::get()->pluck('name', 'id');
        return view('page.admin-dashboard.content.create-edit', compact('data', 'category'));
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
            'category_id' => 'required',
        ]);

        $title = preg_replace('/[^a-zA-Z0-9\s]/', '', $request->title);
        $title = substr($title, 0, 100);
        $slug = Str::slug($title);

        $content = Content::create(array_merge($request->all(), [
            'author_id' => auth()->user()->id,
            'slug' =>  $slug
        ]));

        if ($request->recreate){
            return redirect()->route('admin.content.create', ['posted_at' => $request->posted_at, 'category_id' => $request->category_id])->with('success', 'Content has been created');
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

        $content->update($request->all());
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
