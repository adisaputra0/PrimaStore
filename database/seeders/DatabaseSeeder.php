<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Wallet;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        for ($i = 1; $i <= 5; $i++) {
            User::create([
                "name" => "Pembeli $i",
                "email" => "pembeli$i@example.com",
                "password" => Hash::make("pembeli123"),
                "email_verified_at" => Carbon::now(),
                "role" => "pembeli",
                "bio" => "Saya adalah pembeli ke-$i",
                "is_verified" => 1
            ]);
            Wallet::create([
                "user_id" => $i,
                "balance" => 500
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            User::create([
                "name" => "Penjual $i",
                "email" => "penjual$i@example.com",
                "password" => Hash::make("penjual123"),
                "email_verified_at" => Carbon::now(),
                "role" => "penjual",
                "bio" => "Saya adalah penjual ke-$i",
                "is_verified" => 1
            ]);
        }
        
        Product::create([
            'user_id' => 7,
            'name' => "Template Web",
            'description' => 'Website Swiss',
            'price' => '50',
            'category' => 'Website',
            'file' => 'damifolder.zip',
            'picture' => 'swiss.png',
            'link' => 'https://profilswiss.vercel.app/',
        ]);
        Product::create([
            'user_id' => 8,
            'name' => "Artikel AI",
            'description' => 'Revolusi yang Mengubah Dunia',
            'price' => '10',
            'category' => 'Artikel',
            'file' => 'damifolder.zip',
            'picture' => 'ai.png',
            'link' => 'https://cloud.google.com/learn/what-is-artificial-intelligence?hl=id',
        ]);
        Product::create([
            'user_id' => 9,
            'name' => "Design Website",
            'description' => 'Website Anime',
            'price' => '50',
            'category' => 'Desain',
            'file' => 'damifolder.zip',
            'picture' => 'anime.png',
            'link' => 'https://animeindex.vercel.app/',
        ]);
        Product::create([
            'user_id' => 10,
            'name' => "Video Belajar",
            'description' => 'Let\'s go study with me',
            'price' => '20',
            'category' => 'Video',
            'file' => 'damifolder.zip',
            'picture' => 'study.jpeg',
            'link' => 'https://youtu.be/ZMsTMuyH7w8?si=5i3b8pJcjhqCnZvR',
        ]);
        Product::create([
            'user_id' => 11,
            'name' => "Musik Trouble",
            'description' => 'Musik Avicii',
            'price' => '50',
            'category' => 'Musik',
            'file' => 'damifolder.zip',
            'picture' => 'trouble.jpg',
            'link' => 'https://youtu.be/GiuabrUp8zM?si=Kxd14Kp5NYSgxz-O',
        ]);
        Product::create([
            'user_id' => 8,
            'name' => "Cherry Blossom",
            'description' => 'Cherry blossom tree',
            'price' => '50',
            'category' => 'Foto',
            'file' => 'damifolder.zip',
            'picture' => 'cherry.jpg',
            'link' => 'https://www.wallpaperflare.com/cherry-blossom-tree-on-cliff-digital-wallpaper-cherry-blossom-on-cliff-mountain-wallpaper-gn',
        ]);

        // User::create([
        //     "name" => "Angga",
        //     "email" => "anggasaputra2st@gmail.com",
        //     "password" => "pembeli123",
        //     "email_verified_at" => Carbon::now(),
        //     "role" => "pembeli",
        //     "bio" => "User senang, admin senang",
        //     "image" => "admin.png",
        //     "is_verified" => 1
        // ]);
        
        // User::create([
        //     "name" => "Adi",
        //     "email" => "ordiartini2268@gmail.com",
        //     "password" => "penjual123",
        //     "email_verified_at" => Carbon::now(),
        //     "role" => "penjual",
        //     "bio" => "User senang, admin senang",
        //     "image" => "admin.png",
        //     "is_verified" => 1
        // ]);
    }
}
