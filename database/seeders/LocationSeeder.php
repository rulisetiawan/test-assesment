<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            ['name' => 'Gudang Bahan Baku', 'description' => 'Tempat penyimpanan bahan baku', 'city' => 'Bandung'],
            ['name' => 'Lantai Produksi 1', 'description' => 'Area produksi untuk produk jadi', 'city' => 'Bandung'],
            ['name' => 'Lantai Produksi 2', 'description' => 'Area produksi untuk produk bahan', 'city' => 'Bandung'],
            ['name' => 'Kantor Administrasi', 'description' => 'Kantor untuk keperluan administratif pabrik', 'city' => 'Bandung'],
            ['name' => 'Laboratorium Kualitas', 'description' => 'Tempat pengujian kualitas produk', 'city' => 'Bandung'],
            ['name' => 'Ruangan Mesin dan Pemeliharaan', 'description' => 'Tempat perawatan dan pemeliharaan mesin', 'city' => 'Bandung'],
            ['name' => 'Gudang Barang Jadi', 'description' => 'Tempat penyimpanan produk jadi sebelum pengiriman', 'city' => 'Bandung'],
            ['name' => 'Kantor Manajemen', 'description' => 'Kantor untuk manajemen pabrik', 'city' => 'Bandung'],
            ['name' => 'Area Parkir Karyawan', 'description' => 'Tempat parkir karyawan', 'city' => 'Bandung'],
            ['name' => 'Ruang Pertemuan', 'description' => 'Tempat untuk rapat dan pertemuan internal', 'city' => 'Bandung'],
        ];

        // Insert data into the locations table
        foreach ($locations as $location) {
            Location::factory()->create($location);
        }
    }
}
