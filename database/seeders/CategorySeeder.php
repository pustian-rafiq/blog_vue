<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Faker::create();

        foreach(range(1,5) as $index){
            $category = $faker->unique()->name;
            Category::create([
                "name" => $category,
                "slug" => $this->slugify($category),
                "status" => rand(0,1),
            ]);
        }
    }

    public function slugify($text){
        //replace non letters or digits by -
        $text = preg_replace('~[^\pL\d]+~u','-',$text);
        //Transliterate
        $text = iconv('utf-8','us-ascii//TRANSLIT',$text);
        //replace unwanted characters

        $text = preg_replace('~[^-\w]+~','',$text);
        //trim
        $text = trim($text,'-');

        $text = preg_replace('~-+~','-',$text);
        $text = strtolower($text);
        if(empty($text)){
            return 'n-a';
        }
        return $text;
    }
}
