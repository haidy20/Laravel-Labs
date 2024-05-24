<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post; // Add this line to import the Post model

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()->count(10)->create();
    }
}
