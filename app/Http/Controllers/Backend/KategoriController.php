<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete('Data akan dihapus!', 'Apa anda yakin?');
        $kategori = Kategori::all();
        return view('backend.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'kategori' => ucwords(strtolower($request->kategori)),
        ]);

        $request->validate(
            [
                'kategori' => 'required|string|max:255|unique:kategoris,nama',
            ],
            [
                'kategori.required' => 'Kategori harus diisi',
                'kategori.unique'   => 'Kategori sudah terdaftar',
            ],
        );

        $kategori       = new Kategori();
        $kategori->nama = $request->kategori;
        $kategori->save();

        toast('Data Kategori berhasil ditambahkan', 'success')->position('bottom-end');
        return redirect()->route('backend.kategori.index');
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
        $kategori = Kategori::findOrFail($id);
        return view('backend.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'kategori' => 'required|string|max:255',
            ],
            [
                'kategori' => ' Kategori harus diisi',
            ],
        );
        $kategori       = Kategori::findOrFail($id);
        $kategori->nama = $request->kategori;
        $kategori->save();

        toast('Kategori berhasil diperbarui', 'success')->position('bottom-end');
        return redirect()->route('backend.kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        toast('Data berhasil di hapus', 'success')->position('bottom-end');
        return back();
    }
}
