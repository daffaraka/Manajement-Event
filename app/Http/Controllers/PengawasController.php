<?php

namespace App\Http\Controllers;

use App\Models\Pengawas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengawasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengawas = Pengawas::all();

        return view('pengawas.index', [
            'pengawas' => $pengawas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengawas.create');
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
            'name' => 'required',
            'email' => 'required|email|unique:pengawas,email',
            'password' => 'required|confirmed'
        ]);
        $array = $request->only([
            'name', 'email', 'password'
        ]);
        $array['password'] = bcrypt($array['password']);
        $pengawas = Pengawas::create($array);
        return redirect()->route('pengawas.index')
            ->with('success_message', 'Berhasil menambah pengawas baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengawas = Pengawas::find($id);
        if (!$pengawas) return redirect()->route('pengawas.index')
            ->with('error_message', 'Pengawas dengan id'.$id.' tidak ditemukan');
    
        return view('pengawas.show', [
            'pengawas' => $pengawas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $pengawas = Pengawas::find($id);
    if (!$pengawas) return redirect()->route('pengawas.index')
        ->with('error_message', 'Pengawas dengan id'.$id.' tidak ditemukan');

    return view('pengawas.edit', [
        'pengawas' => $pengawas
    ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:pengawas,email,'.$id,
            'password' => 'sometimes|nullable|confirmed'
        ]);

        $pengawas = Pengawas::find($id);
        $pengawas->name = $request->name;
        $pengawas->email = $request->email;
        if ($request->password) $pengawas->password = bcrypt($request->password);
        $pengawas->save();

        return redirect()->route('pengawas.index')
            ->with('success_message', 'Berhasil mengubah pengawas');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $pengawas = Pengawas::find($id);

        if ($id == $request->$pengawas()->id) return redirect()->route('pengawas.index')
            ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');

        if ($pengawas) $pengawas->delete();

        return redirect()->route('pengawas.index')
            ->with('success_message', 'Berhasil menghapus pengawas');

    }
}
