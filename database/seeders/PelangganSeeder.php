<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pelanggan::create([
            'NmPelanggan' => 'Adi Wijaya',
            'email' => 'Adi@gmail.com',
            'Telpon' => '08980512312',
            'password' => bcrypt('jayawijaya'),
            'Alamat' => 'Jl Mastrip No 18',
            'Kota' => 'Jember'
        ]);
    }
}
