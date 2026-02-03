<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangans';

    public $fillable = [
        'nama_ruangan',
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
