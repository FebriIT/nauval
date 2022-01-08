<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->check() && Auth::user()->akses == '0') {
            $login = 'Admin';
            return view('dashboard.index')->with('login', $login);
        } elseif (auth()->check() && Auth::user()->akses == '1') {
            $login = 'Guru';
            return view('home')->with('login', $login);
        } elseif (auth()->check() && Auth::user()->akses == '2') {
            $login = 'Siswa';
            return view('homee')->with('login', $login);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
    public function password()
    {
        $data['obj']            =  new \App\User();
        $data['action']         = 'DashboardController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "PUT";
        return view('setting_index', $data);
    }
    public function simpan(Request $request)
    {
        $validasi = $this->validate(
            $request,
            [
                'password' => 'required',
            ]
        );

        $password = bcrypt($request->password);
        $id = auth()->user()->id;

        \App\User::where('id', $id)->update(['password' => $password]);
        return redirect('admin/kelas/index')->with('pesan', 'Data sudah disimpan!');
    }
    public function profil()
    {
        $id = Auth::user()->id;
        $data['admin'] = \App\User::where('id', $id)->first();
        return view('admin_profil2', $data);
    }
}