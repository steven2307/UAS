<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mapel;
use Illuminate\Support\Facades\Hash;

class MapelSeeder extends Seeder
{
    public function run()
    {
        $mapels = [
            ['id_dosen' => 19, 'mapel' => 'Basis Data', 'jurusan' => 'Sistem Informasi' , 'semester' => '1'],
            ['id_dosen' => 19, 'mapel' => 'Basis Data', 'jurusan' => 'Sistem Informasi' , 'semester' => '3'],
            ['id_dosen' => 19, 'mapel' => 'Basis Data', 'jurusan' => 'Sistem Informasi' , 'semester' => '5'],
            ['id_dosen' => 19, 'mapel' => 'Basis Data', 'jurusan' => 'Sistem Informasi' , 'semester' => '7'],
            ['id_dosen' => 19, 'mapel' => 'Algoritma', 'jurusan' => 'Sistem Informasi' , 'semester' => '1'],
            ['id_dosen' => 19, 'mapel' => 'Algoritma', 'jurusan' => 'Sistem Informasi' , 'semester' => '3'],
            ['id_dosen' => 19, 'mapel' => 'Algoritma', 'jurusan' => 'Sistem Informasi' , 'semester' => '5'],
            ['id_dosen' => 19, 'mapel' => 'Algoritma', 'jurusan' => 'Sistem Informasi' , 'semester' => '7'],
            ['id_dosen' => 20, 'mapel' => 'Desain Grafis', 'jurusan' => 'Sistem Informasi' , 'semester' => '1'],
            ['id_dosen' => 20, 'mapel' => 'Desain Grafis', 'jurusan' => 'Sistem Informasi' , 'semester' => '3'],
            ['id_dosen' => 20, 'mapel' => 'Desain Grafis', 'jurusan' => 'Sistem Informasi' , 'semester' => '5'],
            ['id_dosen' => 20, 'mapel' => 'Desain Grafis', 'jurusan' => 'Sistem Informasi' , 'semester' => '7'],



            ['id_dosen' => 20, 'mapel' => 'IOT', 'jurusan' => 'Teknik Informasi' , 'semester' => '1'],
            ['id_dosen' => 20, 'mapel' => 'IOT', 'jurusan' => 'Teknik Informasi' , 'semester' => '3'],
            ['id_dosen' => 20, 'mapel' => 'IOT', 'jurusan' => 'Teknik Informasi' , 'semester' => '5'],
            ['id_dosen' => 20, 'mapel' => 'IOT', 'jurusan' => 'Teknik Informasi' , 'semester' => '7'],
            ['id_dosen' => 20, 'mapel' => 'Algoritma', 'jurusan' => 'Teknik Informasi' , 'semester' => '1'],
            ['id_dosen' => 20, 'mapel' => 'Algoritma', 'jurusan' => 'Teknik Informasi' , 'semester' => '3'],
            ['id_dosen' => 20, 'mapel' => 'Algoritma', 'jurusan' => 'Teknik Informasi' , 'semester' => '5'],
            ['id_dosen' => 20, 'mapel' => 'Algoritma', 'jurusan' => 'Teknik Informasi' , 'semester' => '7'],

            ['id_dosen' => 21, 'mapel' => 'Akuntansi Keuangan', 'jurusan' => 'Akuntansi' , 'semester' => '1'],
            ['id_dosen' => 21, 'mapel' => 'Akuntansi Keuangan', 'jurusan' => 'Akuntansi' , 'semester' => '3'],
            ['id_dosen' => 21, 'mapel' => 'Akuntansi Keuangan', 'jurusan' => 'Akuntansi' , 'semester' => '5'],
            ['id_dosen' => 21, 'mapel' => 'Akuntansi Keuangan', 'jurusan' => 'Akuntansi' , 'semester' => '7'],
            ['id_dosen' => 21, 'mapel' => 'Audit', 'jurusan' => 'Akuntansi' , 'semester' => '1'],
            ['id_dosen' => 21, 'mapel' => 'Audit', 'jurusan' => 'Akuntansi' , 'semester' => '3'],
            ['id_dosen' => 21, 'mapel' => 'Audit', 'jurusan' => 'Akuntansi' , 'semester' => '5'],
            ['id_dosen' => 21, 'mapel' => 'Audit', 'jurusan' => 'Akuntansi' , 'semester' => '7'],

            ['id_dosen' => 22, 'mapel' => 'Manajemen Pemasaran', 'jurusan' => 'Manajemen' , 'semester' => '1'],
            ['id_dosen' => 22, 'mapel' => 'Manajemen Pemasaran', 'jurusan' => 'Manajemen' , 'semester' => '3'],
            ['id_dosen' => 22, 'mapel' => 'Manajemen Pemasaran', 'jurusan' => 'Manajemen' , 'semester' => '5'],
            ['id_dosen' => 22, 'mapel' => 'Manajemen Pemasaran', 'jurusan' => 'Manajemen' , 'semester' => '7'],
            ['id_dosen' => 22, 'mapel' => 'Manajemen SDM', 'jurusan' => 'Manajemen' , 'semester' => '1'],
            ['id_dosen' => 22, 'mapel' => 'Manajemen SDM', 'jurusan' => 'Manajemen' , 'semester' => '3'],
            ['id_dosen' => 22, 'mapel' => 'Manajemen SDM', 'jurusan' => 'Manajemen' , 'semester' => '5'],
            ['id_dosen' => 22, 'mapel' => 'Manajemen SDM', 'jurusan' => 'Manajemen' , 'semester' => '7'],
        ];

        foreach ($mapels as $mapel) {
            Mapel::create($mapel);
        }
    }
}
