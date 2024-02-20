<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert(
            [
            'name' => 'دانیال رومیانی',
            'email' => 'daniyal_roomiyani@yahoo.com',
            'password' =>'$2y$12$7PkuFKThjOM5pzZwaHja9e9CWm8iMwnvfrS42ecEqVnqXyMO66WWq',
            'admin' =>true,
            'image' =>'profile.png',
        ]
        );
        DB::table('users')->insert(
            [
            'name' => 'مجتبی رومانی',
            'email' => 'mojtaba_roomani@yahoo.com',
            'password' =>'$2y$12$43WX9zxqdu0MMNBZtZAc/OEsVOD4OMoeUkuhiZDBST1DY9KKj5Ome',
            'admin' =>true,
            'image' =>'profile.png',
        ]
        );
    }
}
