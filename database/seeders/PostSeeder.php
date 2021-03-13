<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Faker::create();

        foreach(range(1,20) as $index){
            $title = $faker->sentence;
            Post::create([
                "user_id" => rand(1,20),
                "category_id" => rand(1,5),
                "title" =>    $title ,
                "slug" => slugify($title),
                "content" => $faker->paragraph,
                "thumbnail" => $faker->imageUrl(),
                "status" => $this->getRandomStatus(),
            ]);
    }
}
public function getRandomStatus(){
    $statuses = array('draft','published');
    return $statuses[array_rand($statuses)];
}
}
