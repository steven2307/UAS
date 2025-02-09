<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nilai;
use Illuminate\Support\Facades\Hash;

class NilaiSeeder extends Seeder
{
    public function run()
    {
        $nilais = [
            ['id_mapel' => 1, 'id_dosen' => 19, 'id_mhs' => 1 , 'suasana_kelas' => 3 , 'waktu_kehadiran' => 3 ,
             'kualitas_pengajaran' => 3 , 'tugas_penilaian' => 3  , 'profesionalisme' => 3],
            ['id_mapel' => 1, 'id_dosen' => 19, 'id_mhs' => 17 , 'suasana_kelas' => 5 , 'waktu_kehadiran' => 5 ,
             'kualitas_pengajaran' => 5 , 'tugas_penilaian' => 5  , 'profesionalisme' => 5],
            ['id_mapel' => 1, 'id_dosen' => 19, 'id_mhs' => 18 , 'suasana_kelas' => 1 , 'waktu_kehadiran' => 1 ,
             'kualitas_pengajaran' => 1 , 'tugas_penilaian' => 1  , 'profesionalisme' => 1],

        ];

        foreach ($nilais as $nilai) {
            Nilai::create($nilai);
        }
    }
}
