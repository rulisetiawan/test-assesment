<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => 'Kain Katun', 'unit' => 'Meter', 'stock' => 100, 'location_id' => 1, 'category_id' => 1],
            ['name' => 'Benang Wol', 'unit' => 'Kilogram', 'stock' => 50, 'location_id' => 2, 'category_id' => 2],
            ['name' => 'Mesin Jahit', 'unit' => 'Unit', 'stock' => 5, 'location_id' => 3, 'category_id' => 3],
            ['name' => 'Sarung Tangan', 'unit' => 'Pasang', 'stock' => 200, 'location_id' => 4, 'category_id' => 4],
            ['name' => 'Kertas A4', 'unit' => 'Rim', 'stock' => 30, 'location_id' => 5, 'category_id' => 5],
            ['name' => 'Baju Seragam', 'unit' => 'Buah', 'stock' => 80, 'location_id' => 6, 'category_id' => 6],
            ['name' => 'Oli Mesin', 'unit' => 'Liter', 'stock' => 10, 'location_id' => 7, 'category_id' => 7],
            ['name' => 'Kardus Pengiriman', 'unit' => 'Buah', 'stock' => 150, 'location_id' => 8, 'category_id' => 8],
            ['name' => 'Sutra Alam', 'unit' => 'Meter', 'stock' => 120, 'location_id' => 1, 'category_id' => 1],
            ['name' => 'Benang Sintetis', 'unit' => 'Kilogram', 'stock' => 70, 'location_id' => 2, 'category_id' => 2],
            ['name' => 'Mesin Tenun', 'unit' => 'Unit', 'stock' => 3, 'location_id' => 3, 'category_id' => 3],
            ['name' => 'Topi Keselamatan', 'unit' => 'Buah', 'stock' => 100, 'location_id' => 4, 'category_id' => 4],
            ['name' => 'Kertas HVS', 'unit' => 'Rim', 'stock' => 40, 'location_id' => 5, 'category_id' => 5],
            ['name' => 'Kemeja Kerja', 'unit' => 'Buah', 'stock' => 90, 'location_id' => 6, 'category_id' => 6],
            ['name' => 'Pelumas Mesin', 'unit' => 'Liter', 'stock' => 15, 'location_id' => 7, 'category_id' => 7],
            ['name' => 'Kardus Besar', 'unit' => 'Buah', 'stock' => 200, 'location_id' => 8, 'category_id' => 8]           
        ];

        // Insert data into the items table
        foreach ($items as $item) {
            Item::factory()->create($item);
        }
    }
}
