<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder 
{
    public function run() 
    {

        $this->realUsers();

        $this->fakeUsers();
    }
    
    protected function realUsers()
    {
        $user = new \App\User();
        $user->name = 'Ryan';
        $user->email = 'ryan@codeup.com';
        $user->password = Hash::make('crappypassword');
        $user->save();

        $user1 = new \App\User();
        $user1->name = 'Luis';
        $user1->email = 'luis@codeup.com';
        $user1->password = Hash::make('betterpasswordsarelonger');
        $user1->save();
    }

    protected function fakeUsers()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++) {
            $user = new \App\User();
            $user->name = $faker->userName;
            $user->password = Hash::make($faker->password);
            $user->email = $faker->safeEmail;
            $user->save();
        }
    }
}
