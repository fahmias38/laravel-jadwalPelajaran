<?php

use App\Models\Kelas;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicJadwalController;

Route::get('/jadwal', [PublicJadwalController::class, 'index']);
Route::post('/jadwal', [PublicJadwalController::class, 'search'])->name('jadwal.search');


// Halaman default Laravel
Route::get('/', function () {
    return view('welcome');
});

// Halaman publik untuk melihat jadwal pelajaran
Route::get('/jadwal', function () {
    $kelas = Kelas::all();                 // Ambil semua kelas
    $selected = request('kelas');          // Ambil ID kelas yang dipilih dari dropdown

    $jadwal = collect();                   // Default kosong

    if ($selected) {
        $jadwal = Jadwal::where('kelas_id', $selected)
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();
    }

    return view('jadwal', [
        'kelas'    => $kelas,
        'selected' => $selected,
        'jadwal'   => $jadwal,
    ]);
});
