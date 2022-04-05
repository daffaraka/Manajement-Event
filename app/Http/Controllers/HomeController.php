<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Peserta;
use App\Models\Regency;
use App\Models\Kegiatan;
use App\Models\Province;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use Illuminate\Support\Facades\DB;
use Spatie\Searchable\ModelSearchAspect;

class HomeController extends Controller
{
   
    public function index()
    {
        
        $provinces = Province::all();
        $kegiatan = DB::table('kegiatan')->latest('created_at')->first();
        $kegiatanLain = DB::table('kegiatan')->latest()->take(3)->skip(1)->get();
        $listKegiatan = Kegiatan::all();
        $dateNow = Carbon::now();
        
        return view('index',
        [
            'kegiatan'=>$kegiatan,
            'kegiatanLain'=>$kegiatanLain,
            'listKegiatan'=>$listKegiatan,
            'dateNow'=>$dateNow,
            'provinces'=>$provinces,
        ]);
    }

    public function show($id)
    {
        
        $detailKegiatan = Kegiatan::findOrFail($id);
        $dateNow = Carbon::now();

        return view('detail',[
            'detailKegiatan'=>$detailKegiatan,
            'dateNow'=>$dateNow,
        ]);
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

    public function search(Request $request)
    {
            // $adv_query = trim($request->query());
            // dd($adv_query);
            // $search =  ['namakegiatan','provinsi','kota','waktu'];
            // $result = Kegiatan::latest()
            //         ->where('namakegiatan','like','%'.$search.'%')
            //         ->orWhere('provinsi','like','%'.$search.'%')
            //         ->orWhere('kota','like','%'.$search.'%')
            //         ->orWhereHas('kegiatan',function($q) use($search) {
            //             $q->where('waktu','like','%'.$search.'$');
            //         })->get();

            // dd($result);
                    
            // Kegiatan::latest()
            //         ->where('')
            $dateNow = Carbon::now();
            $searchterm = $request->input('query');
            $searchResults = (new Search())
            ->registerModel(Kegiatan::class, function(ModelSearchAspect $modelSearchAspect){
                $modelSearchAspect->addSearchableAttribute('namakegiatan')
                ->addExactSearchableAttribute('provinsi')
                ->addExactSearchableAttribute('kota')
                ->addExactSearchableAttribute('waktu');
            })->perform($searchterm);
            
            return view('search', compact('searchResults','searchterm','dateNow'));
    }
}
