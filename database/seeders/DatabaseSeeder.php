<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use function PHPSTORM_META\map;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'username' => 'fahmihwan',
            'password' => Hash::make('qweqwe123'),
            'nama' => 'fahmi',
            'alamat' => 'magetan',
            'telp' => '0812312312',
            'sim' => '12313123123',
        ]);
        \App\Models\User::factory()->create([
            'username' => 'dewa',
            'password' => Hash::make('qweqwe123'),
            'nama' => 'dewa',
            'alamat' => 'magetan',
            'telp' => '0812312312',
            'sim' => '12313123123',
        ]);

        \App\Models\User::factory()->create([
            'username' => 'tari',
            'password' => Hash::make('qweqwe123'),
            'nama' => 'tari',
            'alamat' => 'magetan',
            'telp' => '0812312312',
            'sim' => '12313123123',
        ]);


        \App\Models\Mobil::create([
            'merk' => 'inova',
            'model' => 'Venturer',
            'nomor_plat' => 'AE0001BB',
            'tarif_perhari' => 200000,
            'status_ketersediaan' => 'tersedia',
            'user_id' => 1,
        ]);

        \App\Models\Mobil::create([
            'merk' => 'jazz',
            'model' => 'GK5',
            'nomor_plat' => 'AD0001B2',
            'tarif_perhari' => 250000,
            'status_ketersediaan' => 'tersedia',
            'user_id' => 2,
        ]);
    }
}
