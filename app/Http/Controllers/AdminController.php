<?php
namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Gedung;
use App\Models\Kategori;
use App\Models\Ruangan;

class AdminController extends Controller
{
    public function index()
    {
        //tabel status
        $ruangan = Ruangan::with('lantai.gedung')
            ->orderBy('nama_ruangan')
            ->limit(5) // biar dashboard ga berat
            ->get();

        return view('backend.dash', [
            'totalFasilitas' => Fasilitas::count(),
            'totalRuangan' => Ruangan::count(),
            'totalGedung' => Gedung::count(),
            'totalKategori' => Kategori::count(),
            'ruangan' => $ruangan,
        ]);
    }
}
