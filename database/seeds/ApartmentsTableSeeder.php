<?php

use App\Apartment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        //Prende tutti i file dalla cartella /storage/stock_bnb_images
        $stockImages = Storage::files('stock_bnb_images');
        //Conta quanti file sono
        $imagesLength = count($stockImages);

        for ($i=0; $i<40; $i++) {
            $newApartment = new Apartment();
            $newApartment->title = $faker->unique()->sentence(1);
            $newApartment->rooms_number = $faker->numberBetween(1, 9);
            $newApartment->beds_number = $faker->numberBetween(1, 9);
            $newApartment->bathrooms_number = $faker->numberBetween(1, 9);
            $newApartment->square_meters = $faker->numberBetween(50, 200);
            $newApartment->latitude = $faker->latitude(-90, 90);
            $newApartment->longitude = $faker-> longitude(-180, 180);

            //Genera un numero casuale tra 0 e il numero di immagini totali nella cartella /storage/stock_bnb_images
            $imageIndex = $faker->numberBetween(0, $imagesLength-1);
            //Associa all'appartamento generato casualmente un'immagine casuale contenuta in /storage/stock_bnb_images
            $newApartment->image = $stockImages[$imageIndex];

            $newApartment->visibility = true;
            $newApartment->user_id = $faker->numberBetween(1, 10);
            $newApartment->city = $faker->city();
            $newApartment->address = $faker->streetAddress();
            $newApartment->zip_code = $faker->postcode();
            $newApartment->slug = Str::slug($newApartment->title);
            $newApartment->description = $faker->paragraph();
            $newApartment->save();
        };
    }
}
