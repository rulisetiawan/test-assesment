<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'Produksi'],
            ['name' => 'Kualitas'],
            ['name' => 'Pengembangan Produk'],
            ['name' => 'Pembelian dan Persediaan'],
            ['name' => 'Sumber Daya Manusia (SDM)'],
            ['name' => 'Keuangan dan Akuntansi'],
            ['name' => 'Teknik dan Pemeliharaan'],
            ['name' => 'Pemasaran dan Penjualan'],
            ['name' => 'Logistik dan Distribusi'],
            ['name' => 'Teknologi Informasi (TI)'],
            ['name' => 'Keamanan dan Keselamatan'],
        ];

        // Insert data into the departments table
        foreach ($departments as $department) {
            Department::factory()->create($department);
        }
    }
}
