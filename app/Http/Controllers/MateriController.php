<?php

namespace App\Http\Controllers;

use App\Materi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $id_guru = \App\Guru::where('user_id', $id)->first()->id;
        $data['obj'] = \App\Materi::where('nip', $id_guru)->get();
        $data['id_guru'] = \App\Guru::where('user_id', $id)->first()->id;

        $data['action']         = 'MateriController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('materi_index', $data);
    }
    public function tambah()
    {
        $id = Auth::user()->id;
        $data['id_guru'] = \App\Guru::where('user_id', $id)->first()->id;
        $data['obj']            =  new \App\Materi();
        $data['action']         = 'MateriController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('materi_form', $data);
    }
    public function simpan(Request $request)
    {
        $validasi = $this->validate(
            $request,
            [
                'nama_materi' => 'required',
                'file_materi'        => 'required|file|mimes:png,jpg,jpeg,gif,docx,pdf,MOV,mov',
                'kelas' => 'required'
            ]
        );
        $id = Auth::user()->id;
        $id_guru = \App\Guru::where('user_id', $id)->first()->id;

        $nama_materi = $request->nama_materi;
        $file = $request->file('file_materi')->store('public/gambar');
        $nip = $id_guru;

        // dd($request->all());
        foreach ($request->kelas as $item) {
            $kelas = explode('|', $item);
            \App\Materi::create(['nama_materi' => $nama_materi, 'mapel' => $kelas[1], 'kelas' => $kelas[0], 'file_materi' => $file, 'nip' => $nip]);
        }
        // die;
        // $id = Auth::user()->id;
        // $id_guru = \App\Guru::where('user_id', $id)->first()->id;
        // $request->request->add(['nip' => $id_guru]);

        // $file_nama             = $request->file('file_materi')->store('public/gambar');
        // $requestData           = $request->all();
        // $requestData['file_materi'] = $file_nama;

        // \App\Materi::create($requestData);
        return redirect('guru/materi/index')->with('pesan', 'Data sudah disimpan!');
    }
    public function hapus($id)
    {
        $obj = \App\Materi::findOrFail($id);
        $obj->delete();
        return back()->with('pesan', 'Data sudah dihapus!');
    }
    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $data['id_guru'] = \App\Guru::where('user_id', $user_id)->first()->id;
        $data['obj']     = \App\Materi::findOrFail($id);
        $data['method']     = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action']     = array('MateriController@update', $id);
        return view('materi_form', $data);
    }
    public function update(Request $request, $id)
    {
        $Materi   = \App\Materi::findOrFail($id);
        $validasi = $this->validate($request, [
            'nama_materi' => 'required',
            'file_materi'        => 'file|mimes:png,jpg,jpeg,gif,docx,docx,pdf',
        ]);
        if ($request->file_materi != null) {

            $datagambar = $Materi->gambar;
            @\Storage::delete($datagambar);

            $file_nama             = $request->file('file_materi')->store('public/gambar');
            $requestData           = $request->all();
            $requestData['file_materi'] = $file_nama;
        } else {
            $request->except('file_materi');
            $requestData           = $request->all();
        }

        $Materi->update($requestData);
        return redirect('guru/materi/index')->with('pesan', 'Data diubah!');
    }
    public function view($id)
    {
        $obj = \App\Materi::FindOrFail($id);
        $data['obj'] = $obj;
        return view('materi_view', $data);
    }
}