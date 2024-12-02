<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Talaba;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        for ($i=1; $i < 20; $i++) { 
            Talaba::create([
                'fio'=>'name'.$i,
                'manzil'=>'manzil'.$i,
                'yosh'=>$i,
                'yunalish'=>'yunalish'.$i,
                'kurs'=>$i
            ]);
        }

        for ($i=1; $i < 15; $i++) { 
            Category::create([
                'name'=>'Category'.$i
            ]);
        }
        for ($i=1; $i < 20 ; $i++) { 
            Post::create([
                'title'=>'title'.$i,
                'description'=>'description'.$i,
                'category_id'=>rand(1,14)
            ]);
        }
    }

}
