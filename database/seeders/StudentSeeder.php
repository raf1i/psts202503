<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;  // <-- Pastikan Anda mengimpor model Student di sini

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::factory(100)->create();  // Ini akan membuat 100 data student secara otomatis
    }
}
