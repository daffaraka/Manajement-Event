<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Kegiatan;
use App\Models\Province;
use Illuminate\Http\Request;

class PendaftaranEventController extends Controller
{
    public function pendaftaranEvent($id)
    {
        $kegiatan = Kegiatan::find($id);
        $provinces = Province::all();
        return view('daftar',compact(['kegiatan','provinces']));
        
    }

    public function daftarEvent(Request $request,$id)
    {
            
        $kegiatan = Kegiatan::find($id);
        $kegiatan->id_kegiatan;

        $provincesName = Province::where('id',$request->provinsi)->value('name');

        $peserta = new Peserta;
        $pesertaAttribute = [];
        $pesertaAttribute['id_kegiatan'] = $kegiatan->id_kegiatan;
        $pesertaAttribute['name'] = $request->name;
        $pesertaAttribute['email'] = $request->email;
        $pesertaAttribute['usia'] = $request->usia;
        $pesertaAttribute['jk'] = $request->jk;
        $pesertaAttribute['nomorhp'] = $request->nomorhp;
        $pesertaAttribute['kota'] = $request->kota;
        $pesertaAttribute['provinsi'] = $provincesName;
        $pesertaAttribute['pendidikan'] = $request->pendidikan;
        $pesertaAttribute['pekerjaan'] = $request->pekerjaan;
        $peserta->create($pesertaAttribute);
    
        return redirect()->route('home');
    }
}
