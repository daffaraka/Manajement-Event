<?php

namespace App\Http\Controllers;

use App\Models\newKegiatan;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class NewkegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
        $provinces = Province::all();
        $data['title'] = 'Data Post';
        $data['q'] = $request->q;
        $data['rows'] = Newkegiatan::where('post_title', 'like', '%' . $request->q . '%')->get();
        return view('kegiatan.index', $data , compact('provinces'));
    }

    public function getkabupaten(request $request){
        $id_provinsi = $request->id_provinsi;

        $kabupatens = Regency::where('province_id', $id_provinsi)->get();

        $option = "<option>Pilih Kabupaten..</option>";
        foreach ($kabupatens as $kabupaten) {
            $option.= "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }

        echo $option;
    }

    public function getkecamatan(request $request){
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id', $id_kabupaten)->get();

        $option = "<option>Pilih Kecamatan..</option>";
        foreach ($kecamatans as $kecamatan) {
            $option.= "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }
        echo $option;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\newKegiatan  $newKegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(newKegiatan $newKegiatan)
    {
        $data['row'] = $newKegiatan;
        return view('kegiatan.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\newKegiatan  $newKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(newKegiatan $newKegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\newKegiatan  $newKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, newKegiatan $newKegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\newKegiatan  $newKegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(newKegiatan $newKegiatan)
    {
        //
    }
}
