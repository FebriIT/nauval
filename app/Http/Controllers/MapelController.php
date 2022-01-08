<?php

namespace App\Http\Controllers;

use App\Mapel;
use App\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MapelController extends Controller
{
    public function index()
    {
        $obj         = \App\Mapel::all();
        $data['obj'] = $obj;

        $data['action']         = 'MapelController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('mapel_index', $data);
    }
    public function tambah()
    {
        $data['obj']            =  new \App\Mapel();
        $data['action']         = 'MapelController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('mapel_form', $data);
    }
    public function simpan(Request $request)
    {
        $validasi = $this->validate(
            $request,
            [
                'nama_pelajaran' => 'required',
            ]
        );

        \App\Mapel::create($request->all());
        return redirect('admin/mapel/index')->with('pesan', 'Data sudah disimpan!');
    }
    public function hapus($id)
    {
        $obj = \App\Mapel::findOrFail($id);
        $obj->delete();
        return back()->with('pesan', 'Data sudah dihapus!');
    }
    public function edit($id)
    {
        $data['obj']     = \App\Mapel::findOrFail($id);
        $data['method']     = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action']     = array('MapelController@update', $id);
        return view('mapel_form', $data);
    }
    public function update(Request $request, $id)
    {
        $obj = \App\Mapel::findOrFail($id);
        $validasi = $this->validate($request, [
            // 'nama_pelajaran' => 'required|unique:mapels,nama_pelajaran,' . $id,
        ]);
        $obj->update($request->all());
        return redirect('admin/mapel/index')->with('pesan', 'Data diubah!');
    }
}