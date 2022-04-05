<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Routing\Controller;
use App\Http\Requests\StorePertanyaanRequest;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Requests\UpdatePertanyaanRequest;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Data Pertanyaan';
        $data['q'] = $request->q;
        $data['rows'] = Pertanyaan::where('pertanyaan_title', 'like', '%' . $request->q . '%')->get();
        return view('pertanyaan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['title'] = 'Tambah Pertanyaan';
        $data['row'] = $pertanyaan;
        $data['jawabans'] = [
            'soal'=>'required|min:5',
			'opsiA'=>'required|different:opsiB,opsiC,opsiD',
			'opsiB'=>'required|different:opsiA,opsiC,opsiD',
			'opsiC'=>'required|different:opsiA,opsiB,opsiD',
			'opsiD'=>'required|different:opsiA,opsiB,opsiC',
			'opsiBenar'=>'required',
			'kuis_id'=>'required|integer',
        ];
        return view('pertanyaan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePertanyaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StorePertanyaanRequest $request)
    // {
    //     //
    // }

    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan_title' => 'required',
            'jawaban' => 'required',
        ]);

        $pertanyaan = new Pertanyaan();
        $pertanyaan->pertanyaan_title = $request->pertanyaan_title;
        $pertanyaan->jawaban = $request->jawaban;

        $pertanyaan->content = $request->content;
        $pertanyaan->save();
        return redirect('pertanyaan')->with('success', 'Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pertanyaan $pertanyaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pertanyaan $pertanyaan)
    {
        $data['title'] = 'Ubah Pertanyaan';
        $data['row'] = $pertanyaan;
        $data['jawabans'] = [
            'soal'=>'required|min:5',
			'opsiA'=>'required|different:opsiB,opsiC,opsiD',
			'opsiB'=>'required|different:opsiA,opsiC,opsiD',
			'opsiC'=>'required|different:opsiA,opsiB,opsiD',
			'opsiD'=>'required|different:opsiA,opsiB,opsiC',
			'opsiBenar'=>'required',
			'pertanyaan_id'=>'required|integer',
        ];
        return view('pertanyaan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePertanyaanRequest  $request
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePertanyaanRequest $request, Pertanyaan $pertanyaan)
    {
        $request->validate([
            'pertanyaan_title' => 'required',
            'jawaban' => 'required',
        ]);

        $pertanyaan->pertanyaan_title = $request->pertanyaan_title;
        $pertanyaan->jawaban = $request->jawaban;
        
        $pertanyaan->content = $request->content;
        $pertanyaan->save();
        return redirect('pertanyaan')->with('success', 'Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pertanyaan $pertanyaan)
    {
        //
    }
}
