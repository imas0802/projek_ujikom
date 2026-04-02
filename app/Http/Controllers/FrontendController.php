<?php
namespace App\Http\Controllers;

use App\Models\Ruangan;

class FrontendController extends Controller
{
    public function index()
    {
        $ruangan = Ruangan::all();
        return view('index', compact('ruangan'));
    }
    public function labkom()
    {
        $ruangan = Ruangan::with(['lantai', 'fasilitas', 'kategori'])
            ->whereHas('kategori', function ($query) {
                $query->where('nama', 'Labkom');
            })
            ->get();

        return view('frontend.labkom', compact('ruangan'));
    }
    public function bengkelMotor()
    {
        $ruangan = Ruangan::with(['lantai', 'fasilitas', 'kategori'])
            ->whereHas('kategori', function ($query) {
                $query->where('nama', 'Bengkel Motor');
            })
            ->get();

        return view('frontend.bengkel_motor', compact('ruangan'));
    }
    public function bengkelMobil()
    {
        $ruangan = Ruangan::with(['lantai', 'fasilitas', 'kategori'])
            ->whereHas('kategori', function ($query) {
                $query->where('nama', 'Bengkel Mobil');
            })
            ->get();

        return view('frontend.bengkel_mobil', compact('ruangan'));
    }
    public function tu()
    {
        $ruangan = Ruangan::with(['lantai', 'fasilitas', 'kategori'])
            ->whereHas('kategori', function ($query) {
                $query->where('nama', 'Administrasi');
            })
            ->get();

        return view('frontend.tu', compact('ruangan'));
    }
    public function ru()
    {
        $ruangan = Ruangan::with(['lantai', 'fasilitas', 'kategori'])
            ->whereHas('kategori', function ($query) {
                $query->where('nama', 'Ruang Guru');
            })
            ->get();

        return view('frontend.guru', compact('ruangan'));
    }
    public function studio()
    {
        $ruangan = Ruangan::with(['lantai', 'fasilitas', 'kategori'])
            ->whereHas('kategori', function ($query) {
                $query->where('nama', 'Ruang Kesenian');
            })
            ->get();

        return view('frontend.studio', compact('ruangan'));
    }
    public function perpus()
    {
        $ruangan = Ruangan::with(['lantai', 'fasilitas', 'kategori'])
            ->whereHas('kategori', function ($query) {
                $query->where('nama', 'Ruang Baca');
            })
            ->get();

        return view('frontend.perpus', compact('ruangan'));
    }
    public function uks()
    {
        $ruangan = Ruangan::with(['lantai', 'fasilitas', 'kategori'])
            ->whereHas('kategori', function ($query) {
                $query->where('nama', 'Unit Kesehatan');
            })
            ->get();

        return view('frontend.uks', compact('ruangan'));
    }
    public function blk()
    {
        $ruangan = Ruangan::with(['lantai', 'fasilitas', 'kategori'])
            ->whereHas('kategori', function ($query) {
                $query->where('nama', 'Balai Latihan');
            })
            ->get();

        return view('frontend.blk', compact('ruangan'));
    }
    public function osis()
    {
        $ruangan = Ruangan::with(['lantai', 'fasilitas', 'kategori'])
            ->whereHas('kategori', function ($query) {
                $query->where('nama', 'Organisasi');
            })
            ->get();

        return view('frontend.osis', compact('ruangan'));
    }
    public function wakasek()
    {
        $ruangan = Ruangan::with(['lantai', 'fasilitas', 'kategori'])
            ->whereHas('kategori', function ($query) {
                $query->where('nama', 'Wakasek');
            })
            ->get();

        return view('frontend.wakasek', compact('ruangan'));
    }
    public function bk()
    {
        $ruangan = Ruangan::with(['lantai', 'fasilitas', 'kategori'])
            ->whereHas('kategori', function ($query) {
                $query->where('nama', 'Bimbingan Konseling');
            })
            ->get();

        return view('frontend.bk', compact('ruangan'));
    }
    public function detail($slug)
{
    $ruangan = Ruangan::with(['lantai', 'fasilitas', 'kategori', 'images'])
        ->where('slug', $slug)
        ->firstOrFail();

    return view('layouts.frontend_component.detail', compact('ruangan'));
}
}
