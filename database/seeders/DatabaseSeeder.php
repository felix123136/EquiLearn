<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        // Create 1 admin instance
        $admin = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
            'address' => '123 Main Street',
            'phone' => '1234567890',
            'isAdmin' => true
        ];

        DB::table('users')->insert($admin);

        $categories = ['Coding', 'Web3/Blockchain', 'Design'];
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category
            ]);
        }

        Course::factory(20)->create();
    }
}
