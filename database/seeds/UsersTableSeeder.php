<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(Faker $faker)
    {
        //
        for ($i=0; $i<10; $i++) {
            $newUser = new User();
            $newUser->email = $faker->email();
            $newUser->name = $faker->firstName();
            $newUser->surname = $faker->lastName();
            $newUser->password = Hash::make($faker->password());
            $newUser->date_of_birth = $faker->date();
            $newUser->save();
        };
    }
}
