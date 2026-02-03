<?php
namespace App\Http\Controllers\Backend;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Models\FasilitasRuangan;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class FasilitasRuanganController extends Controller
{
    public function index()
    {
        confirmDelete('Data akan dihapus!', 'Apa anda yakin?');
        $data = FasilitasRuangan::with(['fasilitas', 'ruangan'])->get();
        return view('backend.fasilitasruangan.index', compact('data'));
    }

    public function create()
    {
        $fasilitas = Fasilitas::all();
        $ruangan   = Ruangan::all();
        return view('backend.fasilitasruangan.create', compact('fasilitas', 'ruangan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fasilitas_id' => 'required|exists:fasilitas,id',
            'ruangan_id'   => 'required|exists:ruangans,id',
        ]);

        FasilitasRuangan::create($request->all());

        Alert::success('Berhasil', 'Data berhasil ditambahkan!');
        return redirect()->route('backend.fasilitasruangan.index');
    }

    public function show($id)
    {
        $data = FasilitasRuangan::with(['fasilitas', 'ruangan'])->findOrFail($id);
        return view('backend.fasilitasruangan.show', compact('data'));
    }

    public function edit($id)
    {
        $data      = FasilitasRuangan::findOrFail($id);
        $fasilitas = Fasilitas::all();
        $ruangan   = Ruangan::all();
        return view('backend.fasilitasruangan.edit', compact('data', 'fasilitas', 'ruangan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fasilitas_id' => 'required|exists:fasilitas,id',
            'ruangan_id'   => 'required|exists:ruangans,id',
        ]);

        $data = FasilitasRuangan::findOrFail($id);
        $data->update($request->all());

        Alert::success('Berhasil', 'Data berhasil diperbarui!');
        return redirect()->route('backend.fasilitasruangan.index');
    }

    public function destroy($id)
    {
        $data = FasilitasRuangan::findOrFail($id);
        $data->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus!');
        return redirect()->route('backend.fasilitasruangan.index');
    }
}
