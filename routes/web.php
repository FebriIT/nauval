<?php

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout')->name('logout');


Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('auth', 'Admin:admin')->group(function () {
    Route::get('/profil', 'DashboardController@profil');
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/password', 'DashboardController@password');
    Route::put('/simpan', 'DashboardController@simpan');
    Route::get('kelas/index', 'KelasController@index');
    Route::get('kelas/tambah', 'KelasController@tambah');
    Route::post('kelas/simpan', 'KelasController@simpan');
    Route::get('kelas/hapus/{id}', 'KelasController@hapus');
    Route::get('kelas/edit/{id}', 'KelasController@edit');
    Route::put('kelas/update/{id}', 'KelasController@update');

    Route::get('guru/index', 'GuruController@index');
    Route::get('guru/tambah', 'GuruController@tambah');
    Route::post('guru/simpan', 'GuruController@simpan');
    Route::get('guru/hapus/{id}', 'GuruController@hapus');
    Route::get('guru/edit/{id}', 'GuruController@edit');
    Route::put('guru/update/{id}', 'GuruController@update');
    Route::get('guru/profil/{id}', 'GuruController@profil');

    Route::get('siswa/index', 'SiswaController@index');
    Route::get('siswa/tambah', 'SiswaController@tambah');
    Route::post('siswa/simpan', 'SiswaController@simpan');
    Route::get('siswa/hapus/{id}', 'SiswaController@hapus');
    Route::get('siswa/edit/{id}', 'SiswaController@edit');
    Route::put('siswa/update/{id}', 'SiswaController@update');
    Route::get('siswa/profil/{id}', 'SiswaController@profil');

    Route::get('mapel/index', 'MapelController@index');
    Route::get('mapel/tambah', 'MapelController@tambah');
    Route::post('mapel/simpan', 'MapelController@simpan');
    Route::get('mapel/hapus/{id}', 'MapelController@hapus');
    Route::get('mapel/edit/{id}', 'MapelController@edit');
    Route::put('mapel/update/{id}', 'MapelController@update');
});
Route::prefix('guru')->middleware('auth', 'Guru:guru')->group(function () {
    Route::get('/profil', 'HomeController@profil');

    Route::get('/home', 'HomeController@index');
    Route::get('materi/{id}/detail', 'MateriController@detail');

    Route::get('materi/index', 'MateriController@index');
    Route::get('materi/tambah', 'MateriController@tambah');
    Route::post('materi/simpan', 'MateriController@simpan');
    Route::get('materi/hapus/{id}', 'MateriController@hapus');
    Route::get('materi/edit/{id}', 'MateriController@edit');
    Route::put('materi/update/{id}', 'MateriController@update');
    Route::put('materi/detail/{id}', 'MateriController@detail');
    Route::get('materi/materi_view/{id}', 'MateriController@view');



    Route::get('kuis/index', 'KuisController@index');
    Route::get('kuiss/index', 'KuisController@indexx');
    Route::get('kuiss/{id}', 'KuisController@siswa_kuis');
    Route::get('kuiss/{id}/print', 'KuisController@print_nilai_latihan');
    Route::get('kuiss/{id1}/detail/{id2}', 'KuisController@detail_kuis_siswa');
    Route::get('kuis/tambah', 'KuisController@tambah');
    Route::post('kuis/simpan', 'KuisController@simpan');
    Route::get('kuis/hapus/{id}', 'KuisController@hapus');
    Route::get('kuis/edit/{id}', 'KuisController@edit');
    Route::put('kuis/update/{id}', 'KuisController@update');
    Route::get('kuis/detail/{id}/{idd}', 'KuisController@detail');
    Route::get('kuis/lihatsoal/{id}', 'KuisController@lihatsoal');
    Route::get('kuis/{id}/status', 'KuisController@status');

    Route::get('soal/index', 'SoalController@index');
    Route::get('soal/tambah/{id}', 'SoalController@tambah');
    Route::post('soal/simpan/{id}', 'SoalController@simpan');
    Route::get('soal/hapus/{id}', 'SoalController@hapus');
    Route::get('soal/edit/{id}', 'SoalController@edit');
    Route::put('soal/update/{id}', 'SoalController@update');

    Route::get('kelasguru/index', 'KelasguruController@index');
    Route::get('siswaguru/{id}', 'SiswaguruController@index');

    Route::get('tugas/{id}/detail', 'TugasController@detail');
    Route::get('tugas/index', 'TugasController@index');
    Route::get('tugass/index', 'TugasController@indexx');
    Route::get('tugass/{id}', 'TugasController@siswa_tugas');
    Route::put('tugass/{id1}/nilai/{id2}', 'TugasController@nilai_tugas');
    Route::get('tugass/{id1}/print', 'TugasController@print_nilai_tugas');
    Route::get('tugas/tambah', 'TugasController@tambah');
    Route::post('tugas/simpan', 'TugasController@simpan');
    Route::get('tugas/hapus/{id}', 'TugasController@hapus');
    Route::get('tugas/edit/{id}', 'TugasController@edit');
    Route::get('materi/materi_view/{id}', 'MateriController@view');
    Route::put('tugas/update/{id}', 'TugasController@update');
    Route::get('tugas/tugas_view/{id}', 'TugasController@view');
    Route::get('tugas/{id}/status', 'TugasController@status');

    Route::get('pesan', 'PesanGuruController@index');
    Route::get('pesan/user', 'PesanGuruController@user');
    Route::get('pesan/user/{id}/tambah', 'PesanGuruController@tambah_pesan');
    Route::get('pesan/{id}', 'PesanGuruController@pesan');
    Route::get('pesan/{id}/hapus', 'PesanGuruController@hapus');
    Route::post('pesan/{id}/kirim', 'PesanGuruController@kirim_pesan');
});

Route::prefix('siswa')->middleware('auth', 'Siswa:siswa')->group(function () {
    Route::get('/homee', 'HomeeController@index');
    Route::get('/profil', 'HomeeController@profil');
    Route::get('materi/{id}/detail', 'MateriController@detail');
    Route::get('materisiswa/materi_view/{id}', 'MaterisiswaController@view');
    Route::get('materisiswa/index', 'MaterisiswaController@index');


    Route::get('tugassiswa/index', 'TugassiswaController@index');
    Route::get('tugassiswa/tugas_view/{id}', 'TugassiswaController@view');
    Route::get('tugassiswa/kirim/{id}', 'TugassiswaController@kirim');
    Route::post('tugassiswa/simpan', 'TugassiswaController@simpan');

    Route::get('kuissiswa/index', 'KuissiswaController@index');
    Route::get('soal/kerjakansoal/{id}', 'KuissiswaController@kerjakansoal');
    Route::get('kerjakansoal/prosessimpan', 'KuissiswaController@prosessimpan');
    Route::post('kuissiswa/simpan/{id}', 'KuissiswaController@simpan');
    Route::get('kuissiswa/{id}', 'KuissiswaController@detail_kuis_siswa');

    Route::get('pesan', 'PesanSiswaController@index');
    Route::get('pesan/user', 'PesanSiswaController@user');
    Route::get('pesan/user/{id}/tambah', 'PesanSiswaController@tambah_pesan');
    Route::get('pesan/{id}', 'PesanSiswaController@pesan');
    Route::get('pesan/{id}/hapus', 'PesanSiswaController@hapus');
    Route::post('pesan/{id}/kirim', 'PesanSiswaController@kirim_pesan');
});