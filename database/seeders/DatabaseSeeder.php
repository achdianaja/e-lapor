<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categories;
use App\Models\Petugas;
use App\Models\Masyarakat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Categories::create(['name' => 'Covid-19']);
        $kategori = [
            'Kesehatan',
            'Ekonomi ',
            'Ketenagakerjaan',
            'Lainnya'
        ];

        foreach ($kategori as $key ) {
            Categories::create([
                'name'=> $key
            ]);
        }

        Petugas::create([
            'nama_petugas' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'telp' => '08979090',
            'level' => 'admin',

        ]);

        Petugas::create([
            'nama_petugas' => 'petugas1',
            'username' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('password'),
            'telp' => '08979090',
            'level' => 'petugas',

        ]);

        Masyarakat::create([
            'nik' => '3209103132091031',
            'username' => 'user1',
            'nama' => 'user1',
            'alamat' => 'sukamukti',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('123123123'),
            'telp' => '0897909012',
            'gender' => 'laki_laki'

        ]);
        Masyarakat::create([
            'nik' => '3209103032091030',
            'username' => 'user2',
            'nama' => 'user2',
            'alamat' => 'bojong',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('123123123'),
            'telp' => '0897909042',
            'gender' => 'perempuan'
        ]);
    }
}
