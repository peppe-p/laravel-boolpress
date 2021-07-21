<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 4; $i++) {
            $n = new Post;
            $n->author = $faker->name();
            $n->body = $faker->paragraph();
            $n->img = $faker->imageUrl(640, 480, 'blog', true);
            $n->note = $faker->paragraph();
            $n->save();
        }
    }
}