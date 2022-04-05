<?php

namespace App\Http\Controllers;

use App\Models\NarasumberKegiatan;
use Illuminate\Http\Request;
use DB;

class NarasumberKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('narasumberkegiatan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('narasumberkegiatan.create');
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
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        $array = $request->only([
            'name', 'email', 'password'
        ]);
        $array['password'] = bcrypt($array['password']);
        $narasumberkegiatan = NarasumberKegiatan::create($array);
        return redirect()->route('narasumberkegiatan.index')
            ->with('success_message', 'Berhasil menambah user baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $user = User::find($id);
    if (!$user) return redirect()->route('narasumberkegiatan.index')
        ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');

    return view('narasumberkegiatan.edit', [
        'user' => $user
    ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|'.$id,
            'password' => 'sometimes|nullable|confirmed'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('narasumberkegiatan.index')
            ->with('success_message', 'Berhasil mengubah user');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        return redirect()->route('narasumberkegiatan.index')
            ->with('success_message', 'Berhasil menghapus user');

    }
      public function provinsi()
    {
        $states = DB::table("states")->pluck("name", "id");
        return view('narasumberkegiatan.index', compact('states'));
    }

    public function getCity(Request $request)
    {
        $cities = DB::table("cities")
            ->where("state_id", $request->state_id)
            ->pluck("name", "id");
        return response()->json($cities);
    }
}