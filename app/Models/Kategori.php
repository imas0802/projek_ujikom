<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = [
        'kategori',
    ];
    public function ruangan()
    {
        return $this->hasMany(Ruangan::class, 'kategori_id');
    }
}
