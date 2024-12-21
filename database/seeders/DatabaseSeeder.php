<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Group;
use App\Models\Masalliq;
use App\Models\Ovqat;
use App\Models\OvqatMasalliq;
use App\Models\Post;
use App\Models\Talaba;
use App\Models\Task;
use App\Models\Tulov;
use App\Models\User;
use App\Models\Yangiliklar;
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
        for ($i=1; $i <= 30; $i++) { 
            User::factory()->create([
                'name' =>fake()->name(),
                'email' => fake()->email(),
            ]);
        }
        
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
        for ($i=1; $i <=10; $i++) { 
            Group::create([
                'name'=>'Group'.$i,
                'sort'=>rand(1,10)
            ]);
        }
        for ($i=1; $i <=40 ; $i++) { 
            Task::create([
                'name'=>'Task'.$i,
                'status'=>rand(1,4)
            ]);
        }
        for ($i=1; $i <=6 ; $i++) { 
            Ovqat::create([
                'name'=>'Ovqat'.$i
            ]);
        }
        for ($i=1; $i <=20 ; $i++) { 
            Masalliq::create([
                'name'=>'Masalliq'.$i
            ]);
        }
        for ($i=1; $i <=6 ; $i++) { 
            OvqatMasalliq::create([
                'ovqat_id'=>$i,
                'masalliq_id'=>rand(1,20)
            ]);
        }
        for ($i=0; $i <=30 ; $i++) { 
            Tulov::create([
                'user_id'=>rand(1,30),
                'summa'=>rand(100,5000000)
            ]);
        }
        for ($i=1; $i <=10; $i++) { 
            Yangiliklar::create([
                'title'=>'title'.$i,
                'description'=>"description".$i,
                'img'=>'img_uploaded/2024-12-18_1734510556.png'
            ]);
        }
    }

}
