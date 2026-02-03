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
        return view('backend.dash', [
            'totalFasilitas' => Fasilitas::count(),
            'totalRuangan'   => Ruangan::count(),
            'totalGedung'    => Gedung::count(),
            'totalKategori'  => Kategori::count(),
        ]);
    }
}
