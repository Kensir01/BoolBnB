<?php

use App\Apartment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for ($i=0; $i<20; $i++) {
            $newApartment = new Apartment();
            $newApartment->title = $faker->sentence(2);
            $newApartment->rooms_number = $faker->numberBetween(1, 9);
            $newApartment->beds_number = $faker->numberBetween(1, 9);
            $newApartment->bathrooms_number = $faker->numberBetween(1, 9);
            $newApartment->square_meters = $faker->numberBetween(50, 200);
            $newApartment->latitude = $faker->latitude(-90, 90);
            $newApartment->longitude = $faker-> longitude(-90, 90);
            $newApartment->image = $faker->imageUrl(300, 300, 'houses', true, 'BnB');
            $newApartment->visibility = true;
            $newApartment->user_id = $faker->numberBetween(1, 10);
            $newApartment->city = $faker->city();
            $newApartment->address = $faker->streetAddress();
            $newApartment->zip_code = $faker->postcode();
            $newApartment->save();
        };
    }
}
