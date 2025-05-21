<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            "name" => "Admin",
            "email" => "putuadi208@gmail.com",
            "password" => "admin123",
            "email_verified_at" => Carbon::now(),
            "role" => "admin",
            "bio" => "User senang, admin senang",
            "image" => "admin.png",
            "is_verified" => 1
        ]);

        User::create([
            "name" => "Angga",
            "email" => "anggasaputra2st@gmail.com",
            "password" => "pembeli123",
            "email_verified_at" => Carbon::now(),
            "role" => "pembeli",
            "bio" => "User senang, admin senang",
            "image" => "admin.png",
            "is_verified" => 1
        ]);
        
        User::create([
            "name" => "Adi",
            "email" => "ordiartini2268@gmail.com",
            "password" => "penjual123",
            "email_verified_at" => Carbon::now(),
            "role" => "penjual",
            "bio" => "User senang, admin senang",
            "image" => "admin.png",
            "is_verified" => 1
        ]);
    }
}
