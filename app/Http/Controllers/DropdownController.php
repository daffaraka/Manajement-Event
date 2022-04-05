<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DropdownController extends Controller
{
    public function daftar()
    {
        $states = DB::table("states")->pluck("name", "id");
        return view('daftar', compact('states'));
    }
    public function profile()
    {
        $states = DB::table("states")->pluck("name", "id");
        return view('profile', compact('states'));
    }

    public function getCity(Request $request)
    {
        $cities = DB::table("cities")
            ->where("state_id", $request->state_id)
            ->pluck("name", "id");
        return response()->json($cities);
    }
}
