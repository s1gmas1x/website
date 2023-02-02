<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Graphic;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

            // Message::factory(50)->create();
            // User::factory(100)->create()->each(function($user){
            //     Post::factory(rand(1,3))->create([
            //         'user_id' => $user->id
            //     ]);
            //     Graphic::factory(rand(1,3))->create([
            //         'user_id' => $user->id
            //     ]);
                
            // });
    }
}
