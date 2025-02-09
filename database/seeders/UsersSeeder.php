<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['name' => 'Mhs 1', 'nomor_induk' => '222001' , 'email' => 'mhs1@gmail.com', 'semester' => 1 , 'jurusan' => 'Sistem Informasi' , 'password' => Hash::make('password123'), 'id_mhs' => 1],
            ['name' => 'Mhs 2', 'nomor_induk' => '222002' , 'email' => 'mhs2@gmail.com', 'semester' => 3 , 'jurusan' => 'Sistem Informasi' , 'password' => Hash::make('password123'), 'id_mhs' => 2],
            ['name' => 'Mhs 3', 'nomor_induk' => '222003' , 'email' => 'mhs3@gmail.com', 'semester' => 5 , 'jurusan' => 'Sistem Informasi' , 'password' => Hash::make('password123'), 'id_mhs' => 3],
            ['name' => 'Mhs 4', 'nomor_induk' => '222004' , 'email' => 'mhs4@gmail.com', 'semester' => 7 , 'jurusan' => 'Sistem Informasi' , 'password' => Hash::make('password123'), 'id_mhs' => 4],

            ['name' => 'Mhs 5', 'nomor_induk' => '222005' , 'email' => 'mhs5@gmail.com', 'semester' => 1 , 'jurusan' => 'Teknik Informasi' , 'password' => Hash::make('password123'), 'id_mhs' => 5],
            ['name' => 'Mhs 6', 'nomor_induk' => '222006' , 'email' => 'mhs6@gmail.com', 'semester' => 3 , 'jurusan' => 'Teknik Informasi' , 'password' => Hash::make('password123'), 'id_mhs' => 6],
            ['name' => 'Mhs 7', 'nomor_induk' => '222007' , 'email' => 'mhs7@gmail.com', 'semester' => 5 , 'jurusan' => 'Teknik Informasi' , 'password' => Hash::make('password123'), 'id_mhs' => 7],
            ['name' => 'Mhs 8', 'nomor_induk' => '222008' , 'email' => 'mhs8@gmail.com', 'semester' => 7 , 'jurusan' => 'Teknik Informasi' , 'password' => Hash::make('password123'), 'id_mhs' => 8],

            ['name' => 'Mhs 9', 'nomor_induk' => '222009' , 'email' => 'mhs9@gmail.com', 'semester' => 1 , 'jurusan' => 'Akuntansi' , 'password' => Hash::make('password123'), 'id_mhs' => 9],
            ['name' => 'Mhs 10', 'nomor_induk' => '222010' , 'email' => 'mhs10@gmail.com', 'semester' => 3 , 'jurusan' => 'Akuntansi' , 'password' => Hash::make('password123'), 'id_mhs' => 10],
            ['name' => 'Mhs 11', 'nomor_induk' => '222011' , 'email' => 'mhs11@gmail.com', 'semester' => 5 , 'jurusan' => 'Akuntansi' , 'password' => Hash::make('password123'), 'id_mhs' => 11],
            ['name' => 'Mhs 12', 'nomor_induk' => '222012' , 'email' => 'mhs12@gmail.com', 'semester' => 7 , 'jurusan' => 'Akuntansi' , 'password' => Hash::make('password123'), 'id_mhs' => 12],

            ['name' => 'Mhs 13', 'nomor_induk' => '222013' , 'email' => 'mhs13@gmail.com', 'semester' => 1 , 'jurusan' => 'Manajemen' , 'password' => Hash::make('password123'), 'id_mhs' => 13],
            ['name' => 'Mhs 14', 'nomor_induk' => '222014' , 'email' => 'mhs14@gmail.com', 'semester' => 3 , 'jurusan' => 'Manajemen' , 'password' => Hash::make('password123'), 'id_mhs' => 14],
            ['name' => 'Mhs 15', 'nomor_induk' => '222015' , 'email' => 'mhs15@gmail.com', 'semester' => 5 , 'jurusan' => 'Manajemen' , 'password' => Hash::make('password123'), 'id_mhs' => 15],
            ['name' => 'Mhs 16', 'nomor_induk' => '222016' , 'email' => 'mhs16@gmail.com', 'semester' => 7 , 'jurusan' => 'Manajemen' , 'password' => Hash::make('password123'), 'id_mhs' => 16],

            ['name' => 'Mhs 17', 'nomor_induk' => '222017' , 'email' => 'mhs17@gmail.com', 'semester' => 1 , 'jurusan' => 'Sistem Informasi' , 'password' => Hash::make('password123'), 'id_mhs' => 17],
            ['name' => 'Mhs 18', 'nomor_induk' => '222018' , 'email' => 'mhs18@gmail.com', 'semester' => 1 , 'jurusan' => 'Sistem Informasi' , 'password' => Hash::make('password123'), 'id_mhs' => 18],


            ['name' => 'Dosen 1', 'nomor_induk' => '12345' , 'email' => 'dosen1@ibbi.ac.id', 'password' => Hash::make('password123'), 'id_dosen' => 19],
            ['name' => 'Dosen 2', 'nomor_induk' => '12346' , 'email' => 'dosen2@ibbi.ac.id', 'password' => Hash::make('password123'), 'id_dosen' => 20],
            ['name' => 'Dosen 3', 'nomor_induk' => '12347' , 'email' => 'dosen3@ibbi.ac.id', 'password' => Hash::make('password123'), 'id_dosen' => 21],
            ['name' => 'Dosen 4', 'nomor_induk' => '12348' , 'email' => 'dosen4@ibbi.ac.id', 'password' => Hash::make('password123'), 'id_dosen' => 22],





            ['name' => 'admin', 'email' => 'admin@admin.com', 'password' => Hash::make('password123')],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
