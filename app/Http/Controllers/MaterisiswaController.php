<?php

namespace App\Http\Controllers;

use App\Materi;
use App\Materisiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MaterisiswaController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $kelas = \App\Siswa::where('user_id', $id)->first()->kelas;

        $obj = DB::select('select * from materis where kelas = ?', [$kelas]);
        return view('materisiswa_index', ['obj' => $obj]);
    }
    public function view($id)
    {
        $obj = \App\Materi::FindOrFail($id);
        $data['obj'] = $obj;
        return view('materi_view', $data);
    }
}