<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Akki',
            'email' => 'akshayyydabhade@gmail.com',
            'password' => 'root',
            'role' => 'teacher',
        ]);

        User::create([
            'name' => 'shubham pingale',
            'email' => 'shubham@example.com',
            'password' => 'shubham',
            'role' => 'student',
        ]);

        User::create([
            'name' => 'raj',
            'email' => 'raj@example.com',
            'password' => 'raj',
            'role' => 'teacher',
        ]);

    }
}
