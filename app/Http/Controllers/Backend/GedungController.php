<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gedung;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete('Data akan dihapus!', 'Apa adna yakin?');
        $gedung = Gedung::all();
        return view('backend.gedung.index', compact('gedung'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.gedung.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_gedung' => 'required|string|max:255|unique:gedungs,nama_gedung',
        ], [
            'nama_gedung.required' => 'nama gedung harus diisi',
            'nama_gedung.unique'   => 'nama gedung sudah terdaftar',
        ]
        );

        $gedung              = new Gedung();
        $gedung->nama_gedung = $request->nama_gedung;
        $gedung->save();

        toast('Data gedung berhasil ditambahkan', 'success')->position('bottom-end');
        return redirect()->route('backend.gedung.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gedung = Gedung::findOrFail($id);
        return view('backend.gedung.edit', compact('gedung'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_gedung' => 'required|string|max:255',
        ], [
            'nama_gedung' => 'nama gedung harus diisi',
        ]);
        $gedung              = Gedung::findOrFail($id);
        $gedung->nama_gedung = $request->nama_gedung;
        $gedung->save();

        toast('success', 'Gedung berhasil di perbarui')->position('bottom-end');
        return redirect()->route('backend.gedung.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gedung = Gedung::findOrFail($id);
        $gedung->delete();
        toast('Data berhasil di hapus', 'success')->position('bottom-end');
        return back();

    }
}
