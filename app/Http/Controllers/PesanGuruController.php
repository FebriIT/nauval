<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesanGuruController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $guru_id = \App\Guru::where('user_id', $id)->first()->id;
        $pesan = \App\Pesan::where('guru_id', $guru_id)->where('status_guru', 0)->with('siswa', 'isipesan')->latest()->get();

        $data = [
            'pesan' => $pesan,
        ];

        // dd($pesan);

        return view('pesan_index', $data);
    }

    public function user()
    {
        $siswa = \App\Siswa::all();

        $data = [
            'siswa' => $siswa
        ];

        return view('pesanuser_index', $data);
    }

    public function tambah_pesan($id)
    {
        $guru_id = auth()->user()->id;
        $guru_id = \App\Guru::where('user_id', $guru_id)->first()->id;

        $siswa_id = $id;

        $pesan = \App\Pesan::where('siswa_id', $siswa_id)->where('guru_id', $guru_id);

        $data = [
            'siswa_id' => $siswa_id,
            'guru_id' => $guru_id,
            'status_siswa' => 0,
            'status_guru' => 0,
        ];

        $create_pesan = \App\Pesan::create($data);

        return redirect('guru/pesan/' . $create_pesan->id);
    }

    public function pesan($id)
    {
        $pesan = \App\Pesan::where('id', $id)->with('siswa')->first();
        $isipesan = \App\Isipesan::where('pesan_id', $id)->with('user')->get();
        $guru_id = auth()->user()->id;
        $profil_user = \App\Guru::where('user_id', $guru_id)->first()->getProfil();

        $data = [
            'pesan' => $pesan,
            'isipesan' => $isipesan,
            'profil_user' => $profil_user,
            'id' => $id,
        ];

        return view('isipesan', $data);
    }

    public function kirim_pesan(Request $request, $id)
    {
        $this->validate($request, [
            'pesan' => 'required',
        ]);

        $guru_id = auth()->user()->id;
        $user_id = \App\Guru::where('user_id', $guru_id)->first()->id;

        $data = [
            'pesan_id' => $id,
            'user_type' => 'App\Guru',
            'user_id' => $user_id,
            'pesan' => $request->input('pesan'),
        ];

        \App\Isipesan::create($data);
        \App\Pesan::findOrFail($id)->update(['status_siswa' => 0, 'created_at' => \Carbon\Carbon::now()]);


        return redirect('guru/pesan/' . $id);
    }

    public function hapus($id)
    {
        \App\Pesan::findOrFail($id)->update(['status_guru' => '1']);;
        return redirect('guru/pesan')->with('pesan', 'Pesan sudah dihapus!');
    }
}