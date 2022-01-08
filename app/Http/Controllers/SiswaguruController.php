<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Siswaguru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiswaguruController extends Controller
{
    public function index($id)
    {

        $id_guru = \App\Kelas::findOrFail($id)->nama_kelas;
        $obj = \App\Siswa::where('kelas', $id_guru)->get();
        return view('siswaguru_index', ['obj' => $obj]);
    }
}