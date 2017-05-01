<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class StudentTableSeeder extends Seeder 
{
    public function run() 
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i <= 500; $i++) {
            $student = new Student();
            $student->first_name = $faker->firstName;
            $student->school_name = $faker->company;
            $student->description = $faker->text($maxNbChars = 200); 
            $student->save();
        }

    }
}
