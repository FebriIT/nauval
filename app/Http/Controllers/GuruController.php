<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Mapel;
use App\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $obj         = \App\Guru::all();
        $data['obj'] = $obj;

        $data['action']         = 'GuruController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('guru_index', $data);
    }
    public function tambah(Request $request)
    {
        $data['obj']            =  new \App\Guru();
        $data['action']         = 'GuruController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('guru_form', $data);
    }
    public function simpan(Request $request)
    {
        $validasi = $this->validate(
            $request,
            [
                'id' => 'required|unique:gurus|min:5',
                'nama_guru'     => 'required',
                'alamat'        => 'required',
                'jenkel'        => 'required',
                'tmpt_lahir'    => 'required',
                'tgl_lahir'     => 'required',
                'email'         => 'required',
                'password'      => 'required',
            ]
        );
        $id = $request->id;
        $id = (int)$id;
        //insert ke tabel user
        $user = new \App\User;
        $user->name = $request->nama_guru;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->akses = '1';
        $user->remember_token = str_random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $request->merge(['id' => $id]);
        \App\Guru::create($request->all());
        return redirect('admin/guru/index')->with('pesan', 'Data sudah disimpan!');
    }
    public function hapus($id)
    {
        $obj = \App\Guru::findOrFail($id);
        $mapel=Mapel::where('nip',$id)->delete();
        $user=User::find($obj->user_id)->delete();
        $obj->delete();
        return back()->with('pesan', 'Data sudah dihapus!');
    }
    public function edit($id)
    {
        $data['obj']     = \App\Guru::findOrFail($id);
        $data['method']     = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action']     = array('GuruController@update', $id);
        return view('guru_form', $data);
    }
    public function update(Request $request, $id)
    {
        $obj = \App\Guru::findOrFail($id);
        $id_user = $obj->user_id;
        $validasi = $this->validate($request, [
            'id' => 'required|unique:gurus,id,' . $id,
            'nama_guru'     => 'required',
            'alamat'        => 'required',
            'tmpt_lahir'    => 'required',
            'tgl_lahir'     => 'required',
            'email'         => 'required',
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
        return redirect('admin/guru/index')->with('pesan', 'Data diubah!');
    }
    public function profil($id)
    {
        $data     = \App\Guru::find($id);
        return view('guru_profil', ['guru' => $data]);
    }
}