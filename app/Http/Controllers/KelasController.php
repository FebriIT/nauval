<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $obj         = \App\Kelas::all();
        $data['obj'] = $obj;

        $data['action']         = 'KelasController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('kelas_index', $data);
    }
    public function tambah()
    {
        $data['obj']            =  new \App\Kelas();
        $data['action']         = 'KelasController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('kelas_form', $data);
    }
    public function simpan(Request $request)
    {
        $validasi = $this->validate(
            $request,
            [
                'nama_kelas' => 'required|unique:kelas,nama_kelas',
            ]
        );

        \App\Kelas::create($request->all());
        return redirect('admin/kelas/index')->with('pesan', 'Data sudah disimpan!');
    }
    public function hapus($id)
    {
        $obj = \App\Kelas::findOrFail($id);
        $obj->delete();
        return back()->with('pesan', 'Data sudah dihapus!');
    }
    public function edit($id)
    {
        $data['obj']     = \App\Kelas::findOrFail($id);
        $data['method']     = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action']     = array('KelasController@update', $id);
        return view('kelas_form', $data);
    }

    public function update(Request $request, $id)
    {
        $obj = \App\Kelas::findOrFail($id);
        $validasi = $this->validate($request, [
            'nama_kelas' => 'required|unique:kelas,nama_kelas,' . $id,
        ]);
        $obj->update($request->all());
        return redirect('admin/kelas/index')->with('pesan', 'Data diubah!');
    }
}