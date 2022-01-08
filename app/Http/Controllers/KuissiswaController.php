<?php

namespace App\Http\Controllers;

use App\Kuis;
use App\Kuissiswa;
use App\Soal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KuissiswaController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $siswa = \App\Siswa::where('user_id', $id)->first();
        $data['siswa_id'] = $siswa->id;
        $data['kuis'] = \App\Kuis::where('kelas', $siswa->kelas)->get();
        return view('kuissiswa_index', $data);
    }
    public function kerjakansoal($id_soal)
    {
        $kuis = \App\Kuis::findOrFail($id_soal);
        $data['waktu_selesai'] = Carbon::parse($kuis->waktu_selesai)->timestamp;
        $data['waktu_sekarang'] = Carbon::now()->timestamp;


        $id_user = Auth::user()->id;
        $data['siswa_id'] = \App\Siswa::where('user_id', $id_user)->first()->id;
        $data['nip_guru'] = \App\Kuis::where('id', $id_soal)->first()->nip;
        $data['soal'] = \App\Soal::where('kuis_id', $id_soal)->get();
        $data['obj']            =  new \App\Soaljawaban();
        $data['action']         = ['KuissiswaController@simpan', $id_soal];
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        $data['id_kuis'] = $id_soal;
        return view('kerjakansoal', $data);
    }


    public function simpan(Request $request, $id)
    {

        $status = \App\Kuissiswa::where('kuis_id', $id)->where('siswa_id', $request->siswa_id)->first();

        if ($status) {
            return redirect('siswa/kuissiswa/index')->with('pesan', 'Kuis telah dikerjakan');
        }

        $pilih = $request->pilih;
        $total_soal = \App\Soal::where('kuis_id', $id)->count();
        $benar = 0;
        $salah = 0;
        foreach ($pilih as $key => $value) {
            $soal_jawaban = \App\Soal::findOrFail($key)->jawaban;
            $siswa_jawaban = $value;
            if ($soal_jawaban == $siswa_jawaban) {
                $benar++;
            } else {
                $salah++;
            }
        }

        $nilai = $benar / $total_soal * 100;

        $kuissiswa = \App\Kuissiswa::create(['kuis_id' => $id, 'siswa_id' => $request->siswa_id, 'nilai' => $nilai]);

        foreach ($pilih as $key => $value) {
            $soal_jawaban = \App\Soal::findOrFail($key)->jawaban;
            $siswa_jawaban = $value;
            if ($soal_jawaban == $siswa_jawaban) {
                $nilai = 1;
            } else {
                $nilai = 0;
            }
            \App\Soaljawaban::create(['kuissiswa_id' => $kuissiswa->id, 'soal_id' => $key, 'jawaban' => $siswa_jawaban, 'value' => $nilai]);
        }



        return redirect('siswa/kuissiswa/index')->with('pesan', 'Kuis telah dikerjakan');
    }

    public function detail_kuis_siswa($id)
    {
        $data['kuissiswa'] = \App\Kuissiswa::findOrFail($id);
        $data['kuis'] = \App\Kuis::findOrFail($data['kuissiswa']->kuis_id);
        return view('kuis_detail', $data);
    }
}
