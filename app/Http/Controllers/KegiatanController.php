<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Regency;
use App\Models\Kegiatan;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorekegiatanRequest;
use App\Http\Requests\UpdatekegiatanRequest;
use JeroenNoten\LaravelAdminLte\View\Components\Form\Input;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {

        $provinces = Province::all();
        $regencies = Regency::all();
        $list_kegiatan = kegiatan::all();
        
        
        if($request->ajax()){
            return datatables()->of($list_kegiatan)
                        ->addColumn('waktu', function($waktu)
                        {
                        $date = date("D,d F Y : H i s", strtotime($waktu->waktu));
                        return $date;
                        })
                        ->addColumn('action', function($data){
                            $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_kegiatan.'" data-original-title="Edit" class="edit btn btn-sm btn-warning btn-xs edit-post"><i class="fas fa-edit"></i> Edit</a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="detail" data-toggle="tooltip" name="detail" data-id="'.$data->id_kegiatan.'" class="detail btn btn-info btn-xs detail-kegiatan"><i class="fas fa-info-circle"></i> Detail</button>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id_kegiatan.'" class="delete btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i> Delete</button>';     
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        };
    return view('kegiatan.index',compact('provinces'));
    }

    public function getkota(Request $request)
    {
        $id_provinsi = $request->id_provinsi;

        $kotas = Regency::where('province_id',$id_provinsi)->get();

        foreach($kotas as $kota)
        {
            echo "<option value='$kota->name'>$kota->name</option>";
        }
    }

    public function uploadFile(Request $request){
        $data = array();

        $validator = Validator::make($request->all(),[
            'banner'=> 'required|mimes:png,jpg,jpeg,csv,pdf,txt,docx|max:2048'
        ]);

        if ($validator->fails()){
            $data['success'] = 0;
            $data['error'] = $validator->errors()->first('banner');
        }else{
            if ($request->file('banner')){
                $file = $request->file('banner');
                $filename = time()."_".$file->getClientOriginalName();

                $extension = $file->getClientOriginalExtension();

                //uploaded location
                $location = "files";

                //uploaded file
                $file->move($location, $filename);

                //file path
                $filepath = url('files/'.$filename);

                //response
                $data['success'] = 1;
                $data['message'] = "Uploaded Successfully.";
                $data['filepath'] = $filepath;
                $data['extension'] = $extension;

            }else{
                $data['success'] = 2;
                $data['message'] = "File not uploaded.";
            }
        }

        return response()->json($data);
    }

    public function store(Request $request)
    { 


        // request file image banner
        $file = $request->file('banner');
        $filename = $file->getClientOriginalName();
       
        $extension = $file->getClientOriginalExtension();

        //uploaded location
        $location = "files";

        //uploaded file
        $file->move($location, $request->namakegiatan.'-'.$filename);

        //file path
        $filepath = url('files/'.$filename);



        // Rundown files
        $rundownFile = $request->file('rundown');
        $rundownFilename = $rundownFile->getClientOriginalName();
        $rundownExtension = $rundownFile->getClientOriginalExtension();
        //uploaded location
        $rundownLocation = "rundown";
        //uploaded file
        $rundownFile->move($rundownLocation, $request->namakegiatan.'-'.$rundownFilename);
        //file path
        $filepath = url('files/'.$rundownFilename);


        // input provinsi berdasarkan nama dari id
        $provincesName = Province::where('id',$request->provinsi)->value('name');

        // ubah input waktu dari yyyy/mm/dd ke dd/mm/yyyy
        
        // $originalDate = $request->waktu;
        // $newDate = date('d-m-Y',strtotime($originalDate));

        // dd($newDate);

        $strAnggaran = $request->anggaran;
        $intAnggaran = str_replace(',','',$strAnggaran);
        $intAnggaran = (int)$intAnggaran;
       
     

        // dd($request->all());
        $id = $request->id_kegiatan;
        $post   =   kegiatan::updateOrCreate(['id_kegiatan' => $id],
                    [
                        'banner'=> $request->namakegiatan.'-'.$filename,
                        'namakegiatan' => $request->namakegiatan,
                        'kota' => $request->kota,
                        'provinsi' => $provincesName,
                        'waktu' => $request->waktu,
                        'jenis' => $request->jenis,
                        'target' => $request->target,
                        'undangan' => $request->undangan,
                        'deskripsi' => $request->deskripsi,
                        'anggaran' => $intAnggaran,
                        'rundown' => $request->namakegiatan.'-'.$rundownFilename,
                        'mediapromosi' => $request->mediapromosi,
                    ]); 


        return redirect()->back()->with('Session','success');
    }

    public function update($id,Request $request)
    {

        $provincesName = Province::where('id',$request->provinsi)->value('name');


        $kegiatan = Kegiatan::find($id);
        $kegiatan->banner = $request->banner;
        $kegiatan->namakegiatan = $request->namakegiatan;
        $kegiatan->provinsi = $provincesName;
        $kegiatan->kota = $request->kota;
        $kegiatan->jenis = $request->jenis;
        $kegiatan->target = $request->target;
        $kegiatan->undangan = $request->undangan;
        $kegiatan->deskripsi = $request->deskripsi;
        $kegiatan->anggaran = $request->anggaran;
        $kegiatan->rundown = $request->rundown;
        $kegiatan->mediapromosi = $request->mediapromosi;

        $kegiatan->save();

        
    }

    public function show($id)
    {
        $where =  array('id_kegiatan' => $id);
           $post  = Kegiatan::where('id_kegiatan',$id)->first();

    return response()->json($post);
        
    }

    
    public function edit($id)
    {
    $where = array('id_kegiatan' => $id);
            $post  = Kegiatan::where($where)->first();
        
            return response()->json($post);
    }

    public function destroy(Request $request, $id)
    {
        $post = Kegiatan::find($id);
        Storage::delete('files/'.$post->banner);
        $post->delete();
        
        return response()->json($post);
    }
}
