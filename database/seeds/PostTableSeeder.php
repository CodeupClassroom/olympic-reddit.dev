<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class PostTableSeeder extends Seeder 
{
    public function run() 
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i <= 500; $i++) {
            $post = new Post();
            $post->url = $faker->url;
            $post->title = $faker->catchPhrase;
            $post->content = $faker->bs;
            $post->created_by = \App\User::all()->random()->id;
            $post->save();
        }   
    }
}
