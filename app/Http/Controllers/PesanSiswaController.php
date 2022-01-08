<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesanSiswaController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $siswa_id = \App\Siswa::where('user_id', $id)->first()->id;
        $pesan = \App\Pesan::where('siswa_id', $siswa_id)->where('status_siswa', 0)->with('guru', 'isipesan')->latest()->get();

        $data = [
            'pesan' => $pesan,
        ];

        // dd($pesan);

        return view('pesansiswa_index', $data);
    }

    public function user()
    {
        $guru = \App\Guru::all();

        $data = [
            'guru' => $guru
        ];

        return view('pesanusersiswa_index', $data);
    }

    public function tambah_pesan($id)
    {
        $siswa_id = auth()->user()->id;
        $siswa_id = \App\Siswa::where('user_id', $siswa_id)->first()->id;

        $guru_id = $id;

        $pesan = \App\Pesan::where('siswa_id', $siswa_id)->where('guru_id', $guru_id);


        $data = [
            'siswa_id' => $siswa_id,
            'guru_id' => $guru_id,
            'status_siswa' => 0,
            'status_guru' => 0,
        ];
        $create_pesan = \App\Pesan::create($data);

        return redirect('siswa/pesan/' . $create_pesan->id);
    }

    public function pesan($id)
    {
        $pesan = \App\Pesan::where('id', $id)->with('guru')->first();
        $isipesan = \App\Isipesan::where('pesan_id', $id)->with('user')->get();
        $siswa_id = auth()->user()->id;
        $profil_user = \App\Siswa::where('user_id', $siswa_id)->first()->getProfil();
        // dd($isipesan);

        $data = [
            'pesan' => $pesan,
            'isipesan' => $isipesan,
            'profil_user' => $profil_user,
            'id' => $id,
        ];
        return view('isipesansiswa', $data);
    }

    public function kirim_pesan(Request $request, $id)
    {
        $this->validate($request, [
            'pesan' => 'required',
        ]);

        $siswa_id = auth()->user()->id;
        $user_id = \App\Siswa::where('user_id', $siswa_id)->first()->id;

        $data = [
            'pesan_id' => $id,
            'user_type' => 'App\Siswa',
            'user_id' => $user_id,
            'pesan' => $request->input('pesan'),
        ];


        \App\Isipesan::create($data);
        \App\Pesan::findOrFail($id)->update(['status_guru' => 0, 'created_at' => \Carbon\Carbon::now()]);

        return redirect('siswa/pesan/' . $id);
    }

    public function hapus($id)
    {
        \App\Pesan::findOrFail($id)->update(['status_siswa' => '1']);
        return redirect('siswa/pesan')->with('pesan', 'Pesan sudah dihapus!');
    }
}