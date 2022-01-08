<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $obj         = \App\Siswa::all();
        $data['obj'] = $obj;

        $data['action']         = 'SiswaController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('siswa_index', $data);
    }
    public function tambah()
    {
        $data['obj']            =  new \App\Siswa();
        $data['action']         = 'SiswaController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('siswa_form', $data);
    }
    public function simpan(Request $request)
    {
        $validasi = $this->validate(
            $request,
            [
                'id' => 'required|unique:siswas|min:5',
                'nama_siswa'  => 'required',
                'alamat'      => 'required',
                'tpt_lahir'   => 'required',
                'tgl_lahir'   => 'required',
                'kelas'    => 'required',
                'jenkel'      => 'required',
                'email'       => 'required',
                'password'    => 'required',
            ]
        );
        $id = $request->id;
        $id = (int)$id;
        $siswa = new \App\User;
        $siswa->name = $request->nama_siswa;
        $siswa->email = $request->email;
        $siswa->password = bcrypt($request->password);
        $siswa->akses = '2';
        $siswa->remember_token = str_random(60);
        $siswa->save();


        $request->request->add(['user_id' => $siswa->id]);
        $request->merge(['id' => $id]);
        \App\Siswa::create($request->all());
        return redirect('admin/siswa/index')->with('pesan', 'Data sudah disimpan!');
    }
    public function hapus($id)
    {
        $obj = \App\Siswa::findOrFail($id);
        $user=User::find($obj->user_id)->delete();
        $obj->delete();
        return back()->with('pesan', 'Data sudah dihapus!');
    }
    public function edit($id)
    {
        $data['obj']     = \App\Siswa::findOrFail($id);
        $data['method']     = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action']     = array('SiswaController@update', $id);
        return view('siswa_form', $data);
    }
    public function update(Request $request, $id)
    {
        $obj = \App\Siswa::findOrFail($id);
        $id_user = $obj->user_id;
        $validasi = $this->validate($request, [
            'id' => 'required|unique:siswas,id,' . $id,
            'nama_siswa'  => 'required',
            'alamat'      => 'required',
            'tpt_lahir'   => 'required',
            'tgl_lahir'   => 'required',
            'kelas'    => 'required',
            'jenkel'      => 'required',
            'email'       => 'required',
        ]);

        if ($request->password != '') {
            $password = bcrypt($request->password);
            \App\User::where('id', $id_user)->update(['password' => $password]);
        } else {
            $request->request->remove('password');
        }
        $obj->update($request->all());
        if ($request->hasFile('profil')) {
            $request->file('profil')->move('images/', $request->file('profil')->getClientOriginalName());
            $obj->profil = $request->file('profil')->getClientOriginalName();
            $obj->save();
        }
        return redirect('admin/siswa/index')->with('pesan', 'Data diubah!');
    }
    public function profil($id)
    {
        $data     = \App\Siswa::find($id);
        return view('siswa_profil', ['siswa' => $data]);
    }
}