<?php
namespace App\Http\Controllers;

use App\Models\Ruangan;

class FrontendController extends Controller
{
    private function getByKategori($nama)
    {
        return Ruangan::with(['lantai', 'fasilitas', 'kategori'])
            ->whereHas('kategori', function ($q) use ($nama) {
                $q->where('nama', $nama);
            })
            ->get();
    }

    public function index()
    {
        $ruangan = Ruangan::all();
        return view('index', compact('ruangan'));
    }

    public function labkom()
    {
        $ruangan = $this->getByKategori('Labkom');
        return view('frontend.labkom', compact('ruangan'));
    }

    public function bengkelMotor()
    {
        $ruangan = $this->getByKategori('Bengkel Motor');
        return view('frontend.bengkel_motor', compact('ruangan'));
    }

    public function bengkelMobil()
    {
        $ruangan = $this->getByKategori('Bengkel Mobil');
        return view('frontend.bengkel_mobil', compact('ruangan'));
    }

    public function tu()
    {
        $ruangan = $this->getByKategori('Administrasi');
        return view('frontend.tu', compact('ruangan'));
    }

    public function ru()
    {
        $ruangan = $this->getByKategori('Ruang Guru');
        return view('frontend.guru', compact('ruangan'));
    }

    public function studio()
    {
        $ruangan = $this->getByKategori('Ruang Kesenian');
        return view('frontend.studio', compact('ruangan'));
    }

    public function perpus()
    {
        $ruangan = $this->getByKategori('Ruang Baca');
        return view('frontend.perpus', compact('ruangan'));
    }

    public function uks()
    {
        $ruangan = $this->getByKategori('Unit Kesehatan');
        return view('frontend.uks', compact('ruangan'));
    }

    public function blk()
    {
        $ruangan = $this->getByKategori('Balai Latihan');
        return view('frontend.blk', compact('ruangan'));
    }

    public function osis()
    {
        $ruangan = $this->getByKategori('Organisasi');
        return view('frontend.osis', compact('ruangan'));
    }

    public function wakasek()
    {
        $ruangan = $this->getByKategori('Wakasek');
        return view('frontend.wakasek', compact('ruangan'));
    }

    public function bk()
    {
        $ruangan = $this->getByKategori('Bimbingan Konseling');
        return view('frontend.bk', compact('ruangan'));
    }

    public function detail($slug)
    {
        $ruangan = Ruangan::with(['lantai', 'fasilitas', 'kategori'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('layouts.frontend_component.detail', compact('ruangan'));
    }
}
