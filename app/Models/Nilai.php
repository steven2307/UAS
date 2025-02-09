<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'tblnilai';
    use HasFactory;

    protected $fillable = [
        'id_mapel',
        'id_dosen',
        'id_mhs',
        'suasana_kelas',
        'waktu_kehadiran',
        'kualitas_pengajaran',
        'tugas_penilaian',
        'profesionalisme'
    ];

    public function getLabel($nilai)
    {
        $labels = [
            1 => 'Sangat Buruk',
            2 => 'Buruk',
            3 => 'Biasa',
            4 => 'Baik',
            5 => 'Sangat Baik',
        ];

        return $labels[$nilai] ?? 'Tidak Diketahui';
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'id_mhs'); // Relasi ke mahasiswa menggunakan id_mhs
    }

    public function dosen()
    {
        return $this->belongsTo(User::class, 'id_dosen');
    }
}
