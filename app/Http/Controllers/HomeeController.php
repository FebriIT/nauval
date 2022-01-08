<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homee');
    }
    public function profil()
    {
        $id = Auth::user()->id;
        $data['siswa'] = \App\Siswa::where('user_id', $id)->first();
        return view('siswa_profil2', $data);
    }
}