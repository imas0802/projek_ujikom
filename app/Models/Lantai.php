<?php
namespace App\Models;

use App\Models\Gedung;
use App\Models\Ruangan;
use Illuminate\Database\Eloquent\Model;

class Lantai extends Model
{
    protected $table = 'lantai';

    public $fillable = [
        'nama_lantai',
        'gedung_id',
    ];
    public function gedung()
    {
        return $this->belongsTo(Gedung::class, 'gedung_id');
    }
    public function ruangan()
    {
        return $this->hasMany(Ruangan::class, 'lantai_id');
    }
}
