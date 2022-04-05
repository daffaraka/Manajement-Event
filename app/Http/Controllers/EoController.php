<?php

namespace App\Http\Controllers;

use App\Models\Eo;
use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\User;

class EoController extends Controller
{
    public function index(Request $request)
    {
        $list_eo = eo::all();
        if($request->ajax()){
            return datatables()->of($list_eo)
                        ->addColumn('action', function($data){
                            $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-sm btn-warning btn-xs edit-post"><i class="fas fa-edit"></i> Edit</a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i> Delete</button>';     
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        };
    return view('eo.index');
    }

    public function store(Request $request)
    {
        $id = $request->id;
        
        $post   =   eo::updateOrCreate(['id' => $id],
                    [
                        'name' => $request->name,
                        'nomorhp' => $request->nomorhp,
                        'alamat' => $request->alamat,
                        'email' => $request->email,
                        'password' => bcrypt ($request->password),
                    ]); 

        return response()->json($post);
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
    $where = array('id' => $id);
            $post  = eo::where($where)->first();
        
            return response()->json($post);
    }

    public function destroy(Request $request, $id)
    {
        $post = eo::where('id',$id)->delete();
     
        return response()->json($post);
    }
}