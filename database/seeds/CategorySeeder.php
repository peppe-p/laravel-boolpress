<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name_categories = ['Attualità', 'Sport', 'Generale', 'Cronaca'];
        foreach ($name_categories as $key => $name_categoria) {
            $n = new Category();
            $n->name = $name_categoria;
            $n->slug = Str::slug($name_categoria);
            $n->save();
        }
    }
}