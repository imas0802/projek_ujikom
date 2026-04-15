<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lantai;
use App\Models\Kategori;

class Ruangan extends Model
{
    protected $table = 'ruangans';

    protected $fillable = [
        'nama_ruangan',
        'slug',
        'kategori_id',
        'deskripsi',
        'status',
        'lantai_id',
        'gambar',
        'denah',
        'latitude',
        'longitude',
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function lantai()
    {
        return $this->belongsTo(Lantai::class, 'lantai_id');
    }
    public function fasilitas()
    {
        return $this->belongsToMany(Fasilitas::class, 'fasilitas_ruangans', 'ruangan_id', 'fasilitas_id');
    }
}