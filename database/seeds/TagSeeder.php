<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['css', 'html', 'attualita', 'news', 'laravel', 'php'];
        foreach ($tags as $key => $tag) {
            $n = new Tag();
            $n->name = $tag;
            $n->slug = Str::slug($tag);
            $n->save();
        }
    }
}