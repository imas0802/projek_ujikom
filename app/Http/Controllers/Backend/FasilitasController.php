<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete('Data akan dihapus!', 'Apa adna yakin?');
        $fasilitas = Fasilitas::all();
        return view('backend.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255|unique:fasilitas,nama_fasilitas',
        ], [
            'nama_fasilitas.required' => 'Fasilitas harus diisi',
            'nama_fasilitas.unique'   => 'Fasilitas sudah terdaftar',
        ]);

        $fasilitas                 = new Fasilitas();
        $fasilitas->nama_fasilitas = $request->nama_fasilitas;
        $fasilitas->save();

        toast('Data fasilitas berhasil ditambahkan', 'success')->position('bottom-end');
        return redirect()->route('backend.fasilitas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $fasilitas = Fasilitas::findOrFail($id);
        // return view('backend.fasilitas.show', compact('fasilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('backend.fasilitas.edit', compact('fasilitas'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
        ], [
            'nama_fasilitas' => ' fasilitas harus diisi',
        ]);
        $fasilitas                 = Fasilitas::findOrFail($id);
        $fasilitas->nama_fasilitas = $request->nama_fasilitas;
        $fasilitas->save();

        toast('Fasilitas berhasil diperbarui', 'success')->position('bottom-end');
        return redirect()->route('backend.fasilitas.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->delete();
        toast('Data berhasil di hapus', 'success')->position('bottom-end');
        return back();

    }
}
