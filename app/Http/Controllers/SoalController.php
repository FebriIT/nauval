<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SoalController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $kelas = \App\Siswa::where('user_id', $id)->first()->kelas;
        $id_siswa = \App\Siswa::where('user_id', $id)->first()->id;

        $kuis = DB::select('select * from kuis where kelas = ?', [$kelas]);
        return view('soal', ['kuis' => $kuis, 'id_siswa' => $id_siswa]);
    }


    public function tambah($id_kuis)
    {
        $id = Auth::user()->id;
        $data['id_guru'] = \App\Guru::where('user_id', $id)->first()->id;
        $data['obj']            =  new \App\Soal();
        $data['action']         = ['SoalController@simpan', $id_kuis];
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('soal_form', $data);
    }

    public function simpan(Request $request, $id)
    {

        $request->validate([
            'soal' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'jawaban' => 'required',
            'keterangan' => 'required',
        ]);

        $request->request->add(['kuis_id' => $id]);

        \App\Soal::create($request->all());
        return redirect('guru/kuis/lihatsoal/' . $id)->with('pesan', 'Data sudah disimpan!');
    }

    public function hapus($id)
    {
        $obj = \App\Soal::findOrFail($id);
        $obj->delete();
        return back()->with('pesan', 'Data sudah dihapus!');
    }

    public function edit($id)
    {
        $data['obj']     = \App\Soal::findOrFail($id);
        $data['method']     = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action']     = array('SoalController@update', $id);
        return view('soal_form', $data);
    }
}
