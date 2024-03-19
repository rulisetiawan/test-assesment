<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Department;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'nik' => self::generateNIK(),
            'department_id' => Department::inRandomOrder()->first()->id
        ];
    }

    // Definisikan fungsi untuk generate NIK
    public static function generateNIK()
    {
        // Mendapatkan tanggal lahir secara acak antara 1950 hingga 2000
        $year = rand(1980, 2002);
        $month = sprintf("%02d", rand(1, 12)); // Menghasilkan bulan dengan format 2 digit (01-12)
        $day = sprintf("%02d", rand(1, 28)); // Menghasilkan tanggal dengan format 2 digit (01-28)

        // Menghasilkan nomor seri secara acak
        $serialNumber = sprintf("%06d", rand(1, 999999));

        // Menggabungkan semua bagian untuk membentuk NIK dengan format yang diinginkan
        $NIK = $year . $month . $day . $serialNumber;

        // Menambahkan tanda verifikasi (T) menggunakan algoritma Luhn
        $NIK .= static::generateLuhnDigit($NIK);

        // Kembalikan NIK yang dihasilkan
        return $NIK;
    }

    // Fungsi untuk menghasilkan tanda verifikasi (T) menggunakan algoritma Luhn
    private static function generateLuhnDigit($NIK)
    {
        $sum = 0;
        $length = strlen($NIK);

        for ($i = 0; $i < $length; $i++) {
            $digit = (int)$NIK[$i];

            if ($i % 2 === 0) {
                $digit *= 2;

                if ($digit > 9) {
                    $digit -= 9;
                }
            }

            $sum += $digit;
        }

        $remainder = $sum % 10;

        return ($remainder === 0) ? 0 : (10 - $remainder);
    }
}
