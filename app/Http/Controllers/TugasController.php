<?php

namespace App\Http\Controllers;

use App\Tugas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TugasController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $id_guru = \App\Guru::where('user_id', $id)->first()->id;
        $data['obj'] = \App\Tugas::where('nip', $id_guru)->get();
        $data['sekarang'] = Carbon::now()->format('Y/m/d H:i');
        $data['id_guru'] = \App\Guru::where('user_id', $id)->first()->id;
        $data['action']         = 'TugasController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('tugas_index', $data);
    }

    public function indexx()
    {
        $id = Auth::user()->id;
        $id_guru = \App\Guru::where('user_id', $id)->first()->id;
        $data['obj'] = \App\Tugas::where('nip', $id_guru)->get();
        return view('tugass_index', $data);
    }

    public function siswa_tugas($id)
    {
        $data['obj'] = \App\Tugasygdikerjakan::where('tugas_id', $id)->get();
        $data['tugas'] = \App\Tugas::findOrFail($id);
        return view('tugass_detail', $data);
    }

    public function nilai_tugas(Request $request, $id1, $id2)
    {
        $request->validate([
            'nilai' => 'required|numeric',
        ]);

        \App\Tugasygdikerjakan::findOrFail($id2)->update(['nilai' => $request->nilai]);
        return redirect('guru/tugass/' . $id1)->with('pesan', 'Berhasil Menilai Siswa!');
    }


    public function print_nilai_tugas($id)
    {
        $data['obj'] = \App\Tugasygdikerjakan::where('tugas_id', $id)->get();
        $data['tugas'] = \App\Tugas::findOrFail($id);
        return view('tugass_print', $data);
    }


    public function tambah()
    {
        $id = Auth::user()->id;
        $data['id_guru'] = \App\Guru::where('user_id', $id)->first()->id;
        $data['obj']            =  new \App\Tugas();
        $data['action']         = 'TugasController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('tugas_form', $data);
    }
    public function simpan(Request $request)
    {
        $validasi = $this->validate(
            $request,
            [
                'nama_tugas' => 'required',
                'file_tugas'        => 'required|file|mimes:png,jpg,jpeg,gif,docx,doc,pdf',
                'batas_waktu' => 'required',
            ]
        );

        $batas_waktu = Carbon::createFromFormat('d/m/Y H:i', $request->batas_waktu);

        $id = Auth::user()->id;
        $id_guru = \App\Guru::where('user_id', $id)->first()->id;
        $request->request->add(['nip' => $id_guru]);

        $nama_tugas = $request->nama_tugas;
        $file = $request->file('file_tugas')->store('public/gambar');
        $nip = $id_guru;

        // dd($request->all());
        foreach ($request->kelas as $item) {
            $kelas = explode('|', $item);
            \App\Tugas::create(['nama_tugas' => $nama_tugas, 'mapel' => $kelas[1], 'kelas' => $kelas[0], 'file_tugas' => $file, 'nip' => $nip, 'batas_waktu' => $batas_waktu, 'status' => 0]);
        }

        // $file_nama             = $request->file('file_tugas')->store('public/gambar');
        // $requestData           = $request->all();
        // $requestData['file_tugas'] = $file_nama;
        // $requestData['batas_waktu'] = $batas_waktu;

        // \App\Tugas::create($requestData);
        return redirect('guru/tugas/index')->with('pesan', 'Data sudah disimpan!');
    }
    public function hapus($id)
    {
        $obj = \App\Tugas::findOrFail($id);
        $obj->delete();
        return back()->with('pesan', 'Data sudah dihapus!');
    }

    public function status($id)
    {
        $tugas = \App\Tugas::findOrFail($id);

        if ($tugas->status == 1) {
            $tugas->update(['status' => 0]);
        } else {
            $tugas->update(['status' => 1]);
        }

        return redirect('guru/tugas/index')->with('pesan', 'berhasil mengubah status!');
    }

    public function edit($id)
    {
        $id_user = Auth::user()->id;
        $data['id_guru'] = \App\Guru::where('user_id', $id_user)->first()->id;
        $data['obj']     = \App\Tugas::findOrFail($id);
        $data['method']     = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action']     = array('TugasController@update', $id);
        return view('tugas_form', $data);
    }
    public function update(Request $request, $id)
    {
        $Tugas   = \App\Tugas::findOrFail($id);
        $validasi = $this->validate($request, [
            'nama_tugas' => 'required',
            'file_tugas'        => '|file|mimes:png,jpg,jpeg,gif,docx,pdf,doc',
            'mapel'         => 'required',
            'batas_waktu' => 'required',
        ]);

        $batas_waktu = Carbon::createFromFormat('d/m/Y H:i', $request->batas_waktu);

        if ($request->file_tugas != null) {

            $datagambar = $Tugas->gambar;
            @\Storage::delete($datagambar);

            $file_nama             = $request->file('file_tugas')->store('public/gambar');
            $requestData           = $request->all();
            $requestData['file_tugas'] = $file_nama;
        } else {
            $request->except('file_tugas');
            $requestData           = $request->all();
        }

        $requestData['batas_waktu'] = $batas_waktu;


        $Tugas->update($requestData);
        return redirect('guru/tugas/index')->with('pesan', 'Data diubah!');
    }
    public function detail($id)
    {
        $obj = \App\Tugas::findOrFail($id);
        return view('tugas_detail', ['tugas' => $obj]);
    }
    public function view($id)
    {
        $obj = \App\Tugas::FindOrFail($id);
        $data['obj'] = $obj;
        return view('tugas_view', $data);
    }
}