<?php

namespace App\Http\Controllers;

use App\Models\KategoriNarasumber;
use Illuminate\Http\Request;

class KategoriNarasumberController extends Controller
{
    public function index(Request $request)
    {
        
        $list_kategori = kategorinarasumber::with('Narasumber')->get();

        if($request->ajax()){
            return datatables()->of($list_kategori)
                        ->addColumn('action', function($data){
                            $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_kategori.'" data-original-title="Edit" class="edit btn btn-sm btn-warning btn-xs edit-post"><i class="fas fa-edit"></i> Edit</a>';
                            $button .= '&nbsp;&nbsp;';
                            // $button .= '<button type="button" name="detail" id="'.$data->id.'" class="detail btn btn-info btn-xs"><i class="fas fa-info-circle"></i> Detail</button>';
                            // $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" data-id="'.$data->id_kategori.'" class="delete btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i> Delete</button>';     
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        };
    return view('kategorinarasumber.index');
    }

    public function store(Request $request)
    {
        $id = $request->id;
        
        $post   =   kategorinarasumber::updateOrCreate(['id_kategori' => $id],
                    [
                        'kategori'=>$request->kategori,
                    ]); 

        return response()->json($post);
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
    $where = array('id_kategori' => $id);
            $post  = kategorinarasumber::where($where)->first();
        
            return response()->json($post);
    }

    public function destroy($id)
    {
        $post = KategoriNarasumber::find($id);
        $post->delete();
        return response()->json($post);
    }
}