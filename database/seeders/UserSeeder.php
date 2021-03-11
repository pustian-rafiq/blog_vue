<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->defaultUser();
        $faker =  Faker::create();

        foreach(range(1,20) as $index){
            User::create([
                "name" => $faker->name,
                "email" => $faker->unique()->email,
                "password" => bcrypt($faker->password),
            ]);
        }


    }
  public  function defaultUser(){
        User::create([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("12345678")
        ]);
    }
}
