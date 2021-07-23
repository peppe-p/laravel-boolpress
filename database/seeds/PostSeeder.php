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
            $n->title = $faker->catchPhrase();
            $n->author = $faker->name();
            $n->body = $faker->realText($maxNbChars = 300, $indexSize = 3);
            $n->img = $faker->imageUrl(640, 380, 'Random Placeholder Image', true);
            $n->note = $faker->realText($maxNbChars = 200, $indexSize = 3);
            $n->save();
        }
    }
}