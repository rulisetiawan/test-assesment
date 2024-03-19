<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Daftar nama-nama orang Indonesia.
     *
     * @var array
     */
    private $firstNames = [
        'Adi', 'Agung', 'Ahmad', 'Ali', 'Andre', 'Anton', 'Arief', 'Bambang', 'Dedi', 'Deni',
        'Dewi', 'Dian', 'Dika', 'Doni', 'Dwi', 'Eka', 'Endah', 'Eva', 'Fani', 'Ferry',
        'Fitri', 'Hadi', 'Hendra', 'Henny', 'Herman', 'Hesti', 'Imam', 'Indah', 'Irwan', 'Iwan',
        'Joko', 'Kris', 'Lia', 'Lina', 'Linda', 'Mira', 'Nina', 'Nita', 'Rani', 'Rina',
        'Rudi', 'Sari', 'Siska', 'Siti', 'Sri', 'Suci', 'Tina', 'Toni', 'Yanti', 'Yoga'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [];

        // Generate random number of words for each name (2 or 3 words)
        foreach ($this->firstNames as $firstName) {
            $fullName = $firstName;
            $wordCount = rand(1, 2); // Randomly choose 1 or 2 additional words
            for ($i = 0; $i < $wordCount; $i++) {
                $fullName .= ' ' . $this->randomName();
            }
            $employees[] = [
                'name' => $fullName,
                'department_id' => rand(1, 11)
            ];
        }

        // Insert data into the employees table
        foreach ($employees as $employee) {
            Employee::factory()->create($employee);
        }
    }

    /**
     * Get a random name from the first names list.
     *
     * @return string
     */
    private function randomName()
    {
        return $this->firstNames[array_rand($this->firstNames)];
    }
}