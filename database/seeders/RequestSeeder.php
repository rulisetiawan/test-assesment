<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Request;
use App\Models\RequestDetail;
use App\Models\Item;
use App\Models\Employee;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ambil semua item dan karyawan dari database
        $items = Item::all();
        $employees = Employee::all();

        // Buat sebanyak mungkin permintaan
        for ($i = 0; $i < 20; $i++) {
            // Pilih satu karyawan secara acak
            $employee = $employees->random();

            // Buat permintaan baru
            $request = Request::create([
                'employee_id' => $employee->id,
                'date_time' => now()->subDays(rand(1, 30)) // Tanggal waktu permintaan, misalnya antara 1 hingga 30 hari yang lalu
            ]);

            // Pilih beberapa item secara acak untuk permintaan ini
            $selectedItems = $items->random(rand(1, 5));

            // Tambahkan detail permintaan untuk setiap item yang dipilih
            foreach ($selectedItems as $item) {
                RequestDetail::create([
                    'request_id' => $request->id,
                    'item_id' => $item->id,
                    'description' => 'Permintaan untuk ' . $item->name,
                    'status' => true,
                    'qty' => rand(1, 10)
                ]);
            }
        }
    }
}