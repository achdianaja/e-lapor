<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        
        Petugas::create([
            'nama_petugas' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'telp' => '08979090',
            'level' => 'admin',

        ]);

        Petugas::create([
            'nama_petugas' => 'Administrator',
            'username' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('password'),
            'telp' => '08979090',
            'level' => 'petugas',

        ]);

        Masyarakat::create([
            'nik' => '32091031',
            'username' => 'user2',
            'nama' => 'aguss',
            'alamat' => 'sukamukti',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('123123123'),
            'telp' => '0897909012',
            'gender' => 'laki_laki'

        ]);
        Masyarakat::create([
            'nik' => '32091030',
            'username' => 'user',
            'nama' => 'abbot',
            'alamat' => 'bojong',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('123123123'),
            'telp' => '0897909042',
            'gender' => 'perempuan'
        ]);
    }
}
