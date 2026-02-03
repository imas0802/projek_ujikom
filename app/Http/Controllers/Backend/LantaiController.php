<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gedung;
use App\Models\Lantai;
use Illuminate\Http\Request;

class LantaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete('Data akan dihapus!', 'Apa adna yakin?');
        $lantai = Lantai::all();
        return view('backend.lantai.index', compact('lantai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lantai = Lantai::all();
        $gedung = Gedung::all();
        return view('backend.lantai.create', compact('lantai', 'gedung'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lantai' => 'required|max:3',
            'gedung_id'   => 'required',
        ], [
            'nama_lantai' => 'Inputkan lantai maksimal 3',
            'gedung_id'   => 'Pilih salah satu gedung',
        ]);

        $lantai              = new Lantai();
        $lantai->nama_lantai = $request->nama_lantai;
        $lantai->gedung_id   = $request->gedung_id;
        $lantai->save();

        toast('Data lantai berhasil ditambahkan', 'success')->position('bottom-end');
        return redirect()->route('backend.lantai.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lantai = Lantai::findOrFail($id);
        return view('backend.lantai.show', compact('lantai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lantai = Lantai::findOrFail($id);
        $gedung = Gedung::all();
        return view('backend.lantai.edit', compact('lantai', 'gedung'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lantai' => 'required|max:3',
            'gedung_id'   => 'required',
        ], [
            'nama_lantai' => 'Lantai tidak ada',
            'gedung_id'   => 'Pilih gedung terlebih dahulu',
        ]);

        $lantai              = Lantai::findOrFail($id);
        $lantai->nama_lantai = $request->nama_lantai;
        $lantai->gedung_id   = $request->gedung_id;
        $lantai->save();

        toast('Data lantai berhasil diperbarui', 'success')->position('bottom-end');
        return redirect()->route('backend.lantai.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lantai = Lantai::findOrFail($id);
        $lantai->delete();
        toast('Lantai berhasil dihapus', 'success')->position('bottom-end');
        return back();

    }
}
