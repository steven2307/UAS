<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'tblmapel';

    protected $fillable = [
        'id_dosen',
        'mapel',
        'jurusan',
        'semester',
    ];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'id_dosen');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_mapel');
    }
}
