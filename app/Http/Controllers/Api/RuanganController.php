<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Data ruangan berhasil diambil',
            'data'    => Ruangan::with(['kategori'  , 'lantai'])->get()
        ]);
    }

   public function store(Request $request)
  {
    $ruangan = \App\Models\Ruangan::create($request->all());
    return response()->json($ruangan);
}




    public function show($id)
    {
        $ruangan = Ruangan::findOrFail($id);

        return response()->json([
            'message' => 'Detail ruangan',
            'data'    => $ruangan,
        ]);
    }

    public function update(Request $request, $id)
    {
        $ruangan = Ruangan::findOrFail($id);

        $validated = $request->validate([
            'nama_ruangan'      => 'required',
            'gedung_id' => 'required',
            'lantai_id' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $ruangan->update($validated);

        return response()->json([
            'message' => 'Ruangan berhasil diupdate',
            'data'    => $ruangan,
        ]);
    }

    public function destroy($id)
    {
        $ruangan = \App\Models\Ruangan::findOrFail($id);
$ruangan->delete();

return response()->json([
    'message' => 'Data berhasil dihapus',
]);

    }
}
