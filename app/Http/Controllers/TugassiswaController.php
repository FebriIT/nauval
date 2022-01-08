<?php

namespace App\Http\Controllers;

use App\Tugas;
use App\Tugassiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TugassiswaController extends Controller
{
    public function index()
    {
        $id     = Auth::user()->id;
        $kelas  = \App\Siswa::where('user_id', $id)->first()->kelas;
        $id_siswa = \App\Siswa::where('user_id', $id)->first()->id;

        $obj = DB::select('select * from tugas where kelas = ?', [$kelas]);
        return view('tugassiswa_index', ['obj' => $obj, 'id_siswa' => $id_siswa]);
    }

    public function view($id)
    {
        $obj = \App\Tugas::FindOrFail($id);
        $data['obj'] = $obj;
        return view('tugas_view', $data);
    }
    public function kirim($id)
    {
        $id_user = Auth::user()->id;
        $data['id_guru']        = \App\Siswa::where('user_id', $id_user)->first()->id;
        $data['nip_guru']       = \App\Tugas::where('id', $id)->first()->nip;
        $data['obj']            =  new \App\Tugasygdikerjakan();
        $data['action']         = 'TugassiswaController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        $data['id_tugas']       = $id;
        return view('tugassiswa_form', $data);
    }
    public function simpan(Request $request)
    {
        $validasi = $this->validate(
            $request,
            [
                'file_jawaban'        => 'required|file|mimes:png,jpg,jpeg,gif,docx',
            ]
        );
        $id         = Auth::user()->id;
        $id_siswa   = \App\Siswa::where('user_id', $id)->first()->id;
        $request->request->add(['siswa_id' => $id_siswa]);

        $tanggal_sekarang = \Carbon\Carbon::now();
        $request->request->add(['tgl_upload' => $tanggal_sekarang]);



        $file_nama             = $request->file('file_jawaban')->store('public/gambar');
        $requestData           = $request->all();
        $requestData['file_jawaban'] = $file_nama;

        \App\Tugasygdikerjakan::create($requestData);
        return redirect('siswa/tugassiswa/index')->with('pesan', 'Tugas sudah dikerjakan!');
    }
}