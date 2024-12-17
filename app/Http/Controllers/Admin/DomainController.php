<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\URLMapping;

class DomainController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $web = URLMapping::select();
            return datatables()->of($web)
                ->addIndexColumn()
                // ->addColumn('sub', function ($web) {
                //     return $web->subdomains;
                // })
                ->addColumn('action', function ($web) {
                    return $this->getActionColumn($web, 'domain');
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('page.admin-dashboard.domain.index');
    }

    public function getActionColumn($data, $path = '', $prefix = 'admin')
    {
        $ident = Str::random(10);
        $deleteBtn = route("$prefix.$path.destroy", $data->id);
        $buttonAction = '<button type="button" onclick="delete_data(\'form' . $ident . '\')"class="' . self::CLASS_BUTTON_DANGER . '">Delete</button>' . '<form id="form' . $ident . '" action="' . $deleteBtn . '" method="post"> <input type="hidden" name="_token" value="' . csrf_token() . '" /> <input type="hidden" name="_method" value="DELETE"> </form>';
        return $buttonAction;
    }

    public function create()
    {
        $data = $this->createMetaPageData(null, 'Domain', 'domain');
        $code = [
            'greymilk' => 'greymilk',
            'oceanblue' => 'oceanblue',
            'minima' => 'minima',
            'antara' => 'antara',
            'redeye' => 'redeye',
        ];
        $code = json_encode($code);
        return view('page.admin-dashboard.domain.create-edit', compact('data', 'code'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'domain' => 'required',
            'name' => 'required',
            'code' => 'required',
        ]);

        $insertData = [];
        $city = array('jakarta', 'surabaya', 'yogyakarta', 'semarang', 'manado', 'aceh', 'pontianak', 'nasional', 'bandung', 'malang', 'kalimantan', 'pekanbaru', 'medan', 'jambi', 'lampung', 'samarinda', 'denpasar', 'lombok', 'makasar', 'gorontalo');
        foreach ($city as $value) {
            $insertData[] = [
                'id' => Str::uuid(),
                'sub' => $value,
                'domain' => $request->domain,
                'name' => $request->name,
                'code' => $request->code,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        URLMapping::insert($insertData);

        return redirect()->route('admin.domain.index')->with('success', 'Domain has been created');
    }

    public function destroy(URLMapping $domain)
    {
        try {
            $domain->delete();
            return redirect()->route('admin.domain.index')->with('success', 'Domain has been deleted');
        } catch (\Throwable $th) {
            return redirect()->route('admin.domain.index')->with('error', 'Domain cannot be deleted');
        }
    }
}
