<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Models\Kategori;
use App\Models\Lantai;
use App\Models\Ruangan;
use App\Models\RuanganImage;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Str;

class RuanganController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Kategori::all();
        $lantai = Lantai::all();

        $query = Ruangan::with('fasilitas', 'kategori', 'lantai');

        if ($request->has('kategori_id') && $request->kategori_id != '') {
            $query->where('kategori_id', $request->kategori_id);
        }

        $ruangan = $query->get();

        return view('backend.ruangan.index', compact('ruangan', 'kategori', 'lantai'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $fasilitas = Fasilitas::all();
        $lantai = Lantai::all();
        return view('backend.ruangan.create', compact('kategori', 'fasilitas', 'lantai'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_ruangan' => 'required|unique:ruangans,nama_ruangan',
                'kategori_id' => 'required',
                'deskripsi' => 'nullable',
                'gambar' => 'required|image',
                'denah' => 'nullable|image',
                'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
                'fasilitas_id' => 'nullable',
                'lantai_id' => 'required',
            ],
            [
                'nama_ruangan.required' => 'Nama ruangan tidak boleh kosong',
                'kategori_id.required' => 'Pilih salah satu kategori',
                'gambar.required' => 'Masukkan gambar ruangan',
                'lantai_id.required' => 'Pilih lokasi ruangan',
            ],
        );

        $data = $request->only(['nama_ruangan', 'kategori_id', 'deskripsi', 'lantai_id']);
        $data['slug'] = Str::slug($request->nama_ruangan);

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gambar_ruangan', 'public');
        }

        // Upload denah
        if ($request->hasFile('denah')) {
            $data['denah'] = $request->file('denah')->store('gambar_denah', 'public');
        }

        $ruangan = Ruangan::create($data);
        //MULTI IMAGE FASILITAS RUANGAN
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('ruangan_fasilitas', 'public');

                RuanganImage::create([
                    'ruangan_id' => $ruangan->id,
                    'image' => $path,
                ]);
            }
        }

        if ($request->has('fasilitas_id')) {
            $ruangan->fasilitas()->attach($request->fasilitas_id);
        }

        toast('Ruangan berhasil ditambahkan', 'success')->position('bottom-end');
        return redirect()->route('backend.ruangan.index');
    }

    public function show($id)
    {
        $ruangan = Ruangan::with(['kategori', 'lantai.gedung', 'fasilitas', 'images'])->findOrFail($id);
        $kategori = Kategori::all();
        $lantai = Lantai::all();
        $fasilitas = Fasilitas::all();

        return view('backend.ruangan.show', compact('ruangan', 'kategori', 'lantai', 'fasilitas'));
    }

    public function edit($id)
    {
        $ruangan = Ruangan::with('fasilitas')->findOrFail($id);
        $kategori = Kategori::all();
        $fasilitas = Fasilitas::all();
        $lantai = Lantai::all();
        return view('backend.ruangan.edit', compact('ruangan', 'kategori', 'lantai', 'fasilitas'));
    }

    public function update(Request $request, $id)
    {
        $ruangan = Ruangan::findOrFail($id);
        $request->validate(
            [
                'nama_ruangan' => 'required',
                'kategori_id' => 'required',
                'deskripsi' => 'nullable',
                'gambar' => 'required',
                'fasilitas_id' => 'nullable',
                'lantai_id' => 'required',
                'status' => 'required|in:kosong,dipakai',
                'kegiatan' => 'nullable',
            ],
            [
                'nama_ruangan' => 'Nama ruangan harus diisi',
                'kategori_id' => 'Pilih salah satu kategori',
                'gambar' => 'Masukkan gambar ruangan',
                'lantai_id' => 'Pilih lokasi ruangan',
            ],
        );

        $data = $request->only(['nama_ruangan', 'kategori_id', 'deskripsi', 'lantai_id', 'gambar', 'status', 'kegiatan']);
        $data['slug'] = Str::slug($request->nama_ruangan);
        if ($request->hasFile('gambar')) {
            if ($ruangan->gambar) {
                Storage::disk('public')->delete($ruangan->gambar);
                $path = $request->file('gambar')->store('gambar_ruangan', 'public');
                $data['gambar'] = $path;
            }
        }
        if ($request->hasFile('denah')) {
            if ($ruangan->denah) {
                Storage::disk('public')->delete($ruangan->denah);
                $path = $request->file('denah')->store('gambar_denah', 'public');
                $data['denah'] = $path;
            }
        }

        $ruangan->update($data);

        $ruangan->fasilitas()->sync($request->fasilitas_id ?? []);

        toast('Ruangan berhasil diperbarui', 'success')->position('bottom-end');
        return redirect()->route('backend.ruangan.index');
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:kosong,dipakai',
        ]);

        $ruangan = Ruangan::findOrFail($id);
        $ruangan->update([
            'status' => $request->status,
        ]);

        toast('Status ruangan berhasil diubah', 'success')->position('bottom-end');

        return back();
    }

    public function destroy($id)
    {
        $ruangan = Ruangan::findOrFail($id);
        if ($ruangan->gambar) {
            Storage::disk('public')->delete($ruangan->gambar);
        }

        $ruangan->fasilitas()->detach();
        $ruangan->delete();

        toast('Ruangan berhasil dihapus', 'success')->position('bottom-end');
        return back();
    }
    public function destroyImage($id)
    {
        $img = RuanganImage::findOrFail($id);

        if (Storage::disk('public')->exists($img->image)) {
            Storage::disk('public')->delete($img->image);
        }

        $img->delete();

        toast('Foto fasilitas berhasil dihapus', 'success')->position('bottom-end');
        return back();
    }
    
}
