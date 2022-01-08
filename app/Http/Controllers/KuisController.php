<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class KuisController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $id_guru = \App\Guru::where('user_id', $id)->first()->id;
        $data['obj'] = \App\Kuis::where('nip', $id_guru)->get();
        $data['sekarang'] = Carbon::now()->format('Y/m/d H:i');
        $data['id_guru'] = \App\Guru::where('user_id', $id)->first()->id;

        $data['action']         = 'KuisController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('kuis_index', $data);
    }
    public function indexx()
    {
        $id = Auth::user()->id;
        $id_guru = \App\Guru::where('user_id', $id)->first()->id;
        $data['kuis'] = \App\Kuis::where('nip', $id_guru)->get();

        return view('kuiss_index', $data);
    }

    public function siswa_kuis($id)
    {
        $data['kuissiswa'] = \App\Kuissiswa::where('kuis_id', $id)->get();
        $data['kuis'] = \App\Kuis::findOrFail($id);

        return view('kuiss_detail', $data);
    }

    public function detail($id, $id2)
    {
        $data['obj'] = \App\Soaljawaban::where('siswa_id', $id)->where('id_kuis', $id2)->get();
        return view('kuis_detail', $data);
    }

    public function tambah()
    {
        $id = Auth::user()->id;
        $data['id_guru'] = \App\Guru::where('user_id', $id)->first()->id;
        $data['obj']            =  new \App\Kuis();
        $data['action']         = 'KuisController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('kuis_form', $data);
    }
    public function simpan(Request $request)
    {
        $validasi = $this->validate(
            $request,
            [
                'soal' => 'required',
                'waktu_mulai' => 'required',
                'waktu_selesai' => 'required'
            ]
        );

        $waktu_mulai = Carbon::createFromFormat('d/m/Y H:i', $request->waktu_mulai);
        $waktu_selesai = Carbon::createFromFormat('d/m/Y H:i', $request->waktu_selesai);


        $id = Auth::user()->id;
        $id_guru = \App\Guru::where('user_id', $id)->first()->id;
        $request->request->add(['nip' => $id_guru]);
        $requestData           = $request->all();
        $requestData['waktu_mulai'] = $waktu_mulai;
        $requestData['waktu_selesai'] = $waktu_selesai;
        $requestData['status'] = 0;

        \App\Kuis::create($requestData);
        return redirect('guru/kuis/index')->with('pesan', 'Data sudah disimpan!');
    }

    public function hapus($id)
    {
        $obj = \App\Kuis::findOrFail($id);
        $obj->delete();
        return back()->with('pesan', 'Data sudah dihapus!');
    }
    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $data['id_guru'] = \App\Guru::where('user_id', $user_id)->first()->id;
        $data['obj']     = \App\Kuis::findOrFail($id);
        $data['method']     = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action']     = array('KuisController@update', $id);
        return view('kuis_form', $data);
    }
    public function update(Request $request, $id)
    {
        $kategori = \App\Kuis::findOrFail($id);
        $validasi = $this->validate($request, [
            'soal' => 'required',
        ]);
        $waktu_mulai = Carbon::createFromFormat('d/m/Y H:i', $request->waktu_mulai);
        $waktu_selesai = Carbon::createFromFormat('d/m/Y H:i', $request->waktu_selesai);
        $requestData           = $request->all();
        $requestData['waktu_mulai'] = $waktu_mulai;
        $requestData['waktu_selesai'] = $waktu_selesai;
        $kategori->update($requestData);
        return redirect('guru/kuis/index')->with('pesan', 'Data sudah diubah!');
    }
    public function lihatsoal($id)
    {
        $data['obj'] = \App\Soal::where('kuis_id', $id)->get();
        $data['add'] = $id;
        $data['action']         = ['SoalController@simpan', $id];
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('lihatsoal_index', $data);
    }
    public function status($id)
    {
        $status = \App\Kuis::where('id', $id)->first();
        if ($status->status == 0) {
            $status->update(['status' => 1]);
        } else {
            $status->update(['status' => 0]);
        }

        return redirect('guru/kuis/index')->with(['pesan' => 'Berhasil Ubah Status']);
    }

    public function detail_kuis_siswa($id1, $id2)
    {
        $data['kuissiswa'] = \App\Kuissiswa::findOrFail($id2);
        $data['kuis'] = \App\Kuis::findOrFail($data['kuissiswa']->kuis_id);
        return view('kuis_siswa_detail', $data);
    }

    public function print_nilai_latihan($id)
    {
        $data['obj'] = \App\Kuissiswa::where('kuis_id', $id)->get();
        $data['kuis'] = \App\Kuis::findOrFail($id);
        return view('kuiss_print', $data);
    }
}