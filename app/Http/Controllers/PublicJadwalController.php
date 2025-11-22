<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use Illuminate\Http\Request;

class PublicJadwalController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('jadwal', compact('kelas'));
    }

    public function search(Request $request)
    {
        $kelas = Kelas::all();
        $selected = $request->kelas;

        $jadwal = Jadwal::where('kelas_id', $selected)
            ->orderByRaw("FIELD(hari, 'Senin','Selasa','Rabu','Kamis','Jumat')")
            ->orderBy('jam_mulai')
            ->get();

        return view('jadwal', compact('kelas', 'selected', 'jadwal'));
    }
}
