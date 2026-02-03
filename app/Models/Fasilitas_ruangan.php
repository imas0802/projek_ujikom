<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FasilitasRuangan extends Model
{
    protected $fillable = [
        'fasilitas_id',
        'ruangan_id',
    ];
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }
    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'fasilitas_id');
    }
}
