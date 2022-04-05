<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Http\Controllers\PostController;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables as DataTables;

class PesertaController extends Controller
{

    public function index(Request $request)
    {       
       
            
            if($request->ajax()){
               
                return DataTables::of(Peserta::all())
                            ->addColumn('kegiatan', function (Peserta $peserta) {
                                // return $peserta->Kegiatan;
                                return $peserta->kegiatan->namakegiatan;
                            })
                            
                            ->addColumn('action', function($data){
                                $button  = '<button type="button" name="detail" data-toggle="tooltip" name="detail" data-id="'.$data->id.'" class="detail btn btn-info btn-xs detail-peserta"><i class="fas fa-info-circle"></i> Detail</button>';
                                $button .= '&nbsp;&nbsp;';
                                // $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i> Delete</button>';     
                                return $button;
                            })
                            ->rawColumns(['action'])
                            ->addIndexColumn()
                            ->make(true);
            };
       
       
          return view('manpeserta.index');
    }

   
    public function create(Request $request)
    {
        $data['title'] = 'Tambah Peserta';
        $data['categories'] = ['Laki-Laki', 'Wanita'];
        $data['umur'] = ['18', '20', '22', '24', '27', '33', '30', '40'];
         return view('manpeserta.create', $data);
    }

  
    // public function store(Request $request)
    // {
    //        $request->validate([
    //         'post_peserta' => 'required',
    //         'category' => 'required',
    //     ]);

    //     $post = new Post();
    //     $post->post_peserta = $request->post_;
    //     $post->category = $request->category;
    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $name = rand(1000, 9999) . $image->getClientOriginalName();
    //         $image->move('images/post', $name);
    //         $post->image = $name;
    //     }
    //     $post->content = $request->content;
    //     $post->save();
    //     return redirect('post')->with('success', 'Tambah Data Berhasil');
    // }

   
    public function show($id)
    {
        $where =  array('id' => $id);
           $post  = Peserta::where('id',$id)->first();

    return response()->json($post);
        
    }
   
    public function edit(Peserta $peserta)
    {
        //
    }


    public function update(Request $request, Peserta $peserta)
    {
        //
    }

    public function destroy(Peserta $peserta)
    {
        
    }
}
