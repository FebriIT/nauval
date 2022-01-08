<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Kelasguru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KelasguruController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $kelas = \App\Guru::where('user_id', $id)->first()->id;
        $id_guru = \App\Mapel::where('nip', $kelas)->pluck('kelas');
        // dd($id_guru);
        //$obj = \App\Siswa::whereIn('kelas', $id_guru)->get();
        $obj = \App\kelas::whereIn('nama_kelas', $id_guru)->get();
        return view('kelasguru_index', ['obj' => $obj]);
        //$obj = DB::select('select * from kelas');
        //return view('kelasguru_index', ['obj' => $obj]);
    }
}