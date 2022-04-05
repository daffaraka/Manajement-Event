<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\http\Controllers\Controller;

class PelaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelaporan = User::all();

        return view('pelaporan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelaporan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'persiapan' => 'required',
            'pelaksanaan' => 'required',
            'paskapelaksanaan' => 'required|confirmed',
            'efektifitas' => 'required|confirmed',
        ]);
        $array = $request->only([
            'persiapan', 'pelaksanaan', 'paskapelaksanaan', 'efektifitas'
        ]);
        $user = User::create($array);
        return redirect()->route('pelaporan.index')
            ->with('success_message', 'Berhasil menambah laporan baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pelaporan $pelaporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelaporan $pelaporan)
   {
       //
    }


    public function update(Request $request, Pelaporan $pelaporan)
    {
        $request->validate([
            'persiapan' => 'required',
            'pelaksanaan' => 'required',
            'paskapelaksanaan' => 'required|confirmed',
            'efektifitas' => 'required|confirmed',
        ]);

        return redirect()->route('pelaporan.index')
            ->with('success_message', 'Berhasil mengubah laporan');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelaporan $pelaporan)
    {
     
        return redirect()->route('pelaporan.index')
            ->with('success_message', 'Berhasil menghapus user');

    }
}
