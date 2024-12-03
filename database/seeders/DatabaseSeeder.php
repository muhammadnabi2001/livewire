<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Group;
use App\Models\Post;
use App\Models\Talaba;
use App\Models\Task;
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
        for ($i=1; $i < 10; $i++) { 
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
    }

}
