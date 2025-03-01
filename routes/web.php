<?php

use Illuminate\Support\Facades\Route;

// Default routing
Route::get('/home', function () {
    return "<div style='text-align:center; font-family:Arial, sans-serif;'>
                <h1 style='color:#2c3e50;'>Halaman Utama</h1>
                <p style='font-size:18px; color:#34495e;'>Selamat datang di halaman utama!</p>
            </div>";
})->name('home');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/', function () {
    return view('welcome');
});

Route::post('submit', function () {
    return "<div style='text-align:center; font-size:20px; color:green;'>
                <h2>Form Submitted!</h2>
            </div>";
});

Route::put('update/{id}', function ($id) {
    return "<div style='text-align:center; font-size:20px; color:blue;'>
                <h2>Update Data</h2>
                <p>Update data untuk ID: <b>$id</b></p>
            </div>";
});

Route::delete('delete/{id}', function ($id) {
    return "<div style='text-align:center; font-size:20px; color:red;'>
                <h2>Delete Data</h2>
                <p>Data dengan ID: <b>$id</b> telah dihapus.</p>
            </div>";
});

Route::get('/profile', function () {
    return "<div style='text-align:center; font-family:Arial, sans-serif;'>
                <h1 style='color:#2c3e50;'>Profile</h1>
                <p style='font-size:18px; color:#34495e;'>Jurusan Teknologi Informasi - Politeknik Negeri Padang</p>
                <p>Selamat datang di halaman profil kami!</p>
                <p>Kami berkomitmen untuk memberikan pendidikan berkualitas di bidang teknologi informasi.</p>
            </div>";
});

Route::get('mahasiswa/ti/Abdhu', function () {
    return "<div style='text-align:center; font-family:Arial, sans-serif;'>
                <p style='font-size:40px; color:orange;'>Jurusan Teknologi Informasi</p>
                <h1 style='color:#2c3e50;'>Selamat Datang Abdhu...</h1>
                <hr>
                <p style='font-size:18px;'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vitae justo et eros ultrices suscipit.</p>
                <p>Semoga sukses dalam perjalanan akademikmu!</p>
            </div>";
});

// Route with parameter
Route::get('mahasiswa/{nama}', function ($nama) {
    return "<div style='text-align:center; font-size:20px;'>
                <p>Nama mahasiswa RPL: <b>$nama</b></p>
            </div>";
});

Route::get('hitungusia/{nama}/{tahunlahir}', function ($nama, $tahun_lahir) {
    $usia = date('Y') - $tahun_lahir;
    return "<div style='text-align:center; font-size:20px;'>
                <p>Hai <b>$nama</b><br>Usia anda sekarang adalah <b>$usia</b> tahun.</p>
            </div>";
});

// Route with optional parameter
Route::get('mahasiswa/{nama?}', function ($nama = 'M Abdhu Syukra') {
    return "<div style='text-align:center; font-size:20px;'>
                <p>Nama mahasiswa RPL: <b>$nama</b></p>
            </div>";
});

Route::get('hitungusia/{nama?}/{tahunlahir?}', function ($nama = "M Abdhu Syukra", $tahun_lahir = "2005") {
    $usia = date('Y') - $tahun_lahir;
    return "<div style='text-align:center; font-size:20px;'>
                <p>Hai <b>$nama</b><br>Usia anda sekarang adalah <b>$usia</b> tahun.</p>
            </div>";
});

// Route with regular expression
Route::get('user/{id}', function ($id) {
    return "<div style='text-align:center; font-size:20px;'>
                <p>User admin memiliki ID: <b>$id</b></p>
            </div>";
})->where('id', '[0-9]+');

// Route redirect
Route::redirect('public', 'mahasiswa');

// Route group
Route::prefix('login')->group(function () {
    Route::get('mahasiswa', function () {
        return "<div style='text-align:center; font-size:20px; color:#2980b9;'>
                    <h2>Login sebagai mahasiswa</h2>
                </div>";
    });
    Route::get('dosen', function () {
        return "<div style='text-align:center; font-size:20px; color:#27ae60;'>
                    <h2>Login sebagai dosen</h2>
                </div>";
    });
    Route::get('admin', function () {
        return "<div style='text-align:center; font-size:20px; color:#c0392b;'>
                    <h2>Login sebagai admin</h2>
                </div>";
    });
});

// Route fallback
Route::fallback(function () {
    return "<div style='text-align:center; font-size:20px; color:red;'>
                <h2>Mohon maaf, halaman yang anda cari <b>tidak ditemukan</b></h2>
            </div>";
});