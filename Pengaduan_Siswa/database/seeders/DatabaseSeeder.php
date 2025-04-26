<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Aspirasi;
use App\Models\Input_aspirasi;
use App\Models\Kategori;
use App\Models\Penduduk;
use Illuminate\Database\Seeder;
use App\Models\Siswa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
         //Input Data Kategori
         Kategori::create(
            [
                'ket_kategori' => 'Kebersihan'
            ]
        );
        Kategori::create(
            [
                'ket_kategori' => 'Keamanan'
            ]
        );
        Kategori::create(
            [
                'ket_kategori' => 'Kesehatan'
            ]
        );
        //Input Data Penduduk
        Siswa::create([
            'id' => '20208878',
            'nama' => 'Ina Sari',
            'kelas' => 'XII TEL 11',
        ]);
        Siswa::create([
            'id' => '20209899',
            'nama' => 'Ahmad Guntoro',
            'kelas' => 'XII TEL 10',
        ]);
        Siswa::create([
            'id' => '20209987',
            'nama' => 'Runay Amelia',
            'kelas' => 'XII TEL 13',
        ]);
        // //Input Data Aspirasi
        //   Aspirasi::create([
        //     'id' => 1,
        //     'id_aspirasi' => 1,
        //     'kategori_id' => 2,
        //     'status' => 'Menunggu',
        // ]);
        // Aspirasi::create([
        //     'id' => 2,
        //     'id_aspirasi' => 2,
        //     'kategori_id' => 3,
        //     'status' => 'Menunggu',
        // ]);
        // //Input Aspirasi
        // Input_aspirasi::create([
        //     'nis' => '1506926508141921',
        //     'kategori_id' => '2',
        //     'lokasi' => 'SMK TELKOM',
        //     'ket' => 'kehilangan motor',
        // ]);
        // Input_aspirasi::create([
        //     'nis' => '1506926508141921',
        //     'kategori_id' => '3',
        //     'lokasi' => 'Kalideres',
        //     'ket' => 'Kali kotor',
        // ]);
        //input data admin
        Admin::create([
            'username' => 'admin',
            'password' => bcrypt('password'),
        ]);
        Admin::create([
            'username' => 'fauzi',
            'password' => bcrypt('haifauzi'),
        ]);
    }
}
