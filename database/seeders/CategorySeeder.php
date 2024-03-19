<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Bahan Baku', 'unique_code' => 'BB'],
            ['name' => 'Perlengkapan Produksi', 'unique_code' => 'PP'],
            ['name' => 'Peralatan Keselamatan dan Pelindung', 'unique_code' => 'PKP'],
            ['name' => 'Peralatan Kantor dan Administrasi', 'unique_code' => 'PK'],
            ['name' => 'Peralatan dan Bahan Pembersih', 'unique_code' => 'PBP'],
            ['name' => 'Pakaian dan Perlengkapan Karyawan', 'unique_code' => 'PPK'],
            ['name' => 'Peralatan dan Bahan untuk Perawatan Mesin', 'unique_code' => 'PBM'],
            ['name' => 'Bahan Pembungkus dan Penyimpanan', 'unique_code' => 'BPP'],
        ];

        foreach ($categories as $category) {
            Category::factory()->create($category);
        }
    }
}
