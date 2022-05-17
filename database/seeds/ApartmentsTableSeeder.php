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


        $apartments = [
            [
                'title' => 'Appartamento via Meda',
                'description' => 'L’appartamento ha una camera con letto matrimoniale, un bagno, una cucina completa di accessori (inclusa lavastoviglie). Un soggiorno con divano letto nuovo per due persone e due balconi. L’appartamento si trova in un palazzo con ascensore.',
                'visibility' => 1,
                'rooms_numbers' => 3,
                'beds_numbers' => 1,
                'bathrooms_numbers' => 1,
                'square_meters' => 201,
                'image' => 'cover',
                'city' => 'Milano',
                'zip_code' => '20141',
                'address' => 'Via Giuseppe Meda, 52',
                'latitude' => 45.43861,
                'longitude' => 9.17826,
                'slug' => 'Appartamento-a-roma-5',
                'user_id' => 1,
            ],
            [
                'title' => "Il Naviglio dietro l'angolo",
                'description' => 'Luminoso e confortevole, 7 minuti da piazza Duomo con metropolitana linea 3 (gialla). Da qui potrai raggiungere facilmente la Fondazione Prada - via Monte Napoleone e la Stazione Centrale.',
                'visibility' => 1,
                'rooms_numbers' => 3,
                'beds_numbers' => 2,
                'bathrooms_numbers' => 1,
                'square_meters' => 60,
                'image' => 'cover',
                'city' => 'Milano',
                'zip_code' => '20144',
                'address' => 'Viale Gorizia, 22',
                'latitude' => 45.45342,
                'longitude' => 9.17489,
                'slug' => 'Appartamento-a-roma-5',
                'user_id' => 1,
            ],
            [
                'title' => 'Appartamento a Roma',
                'description' => 'Grazioso e luminoso bilocale in zona Corso Sempione, ristrutturato di recente, vicino alla movida milanese e ai mezzi di trasporto. Dotato di aria condizionata, WiFi, televisione 55 pollici in soggiorno e 32 pollici in camera da letto, Netflix gratuito, macchina da caffè Nespresso, cassaforte, asciugacapelli.',
                'visibility' => 1,
                'rooms_numbers' => 2,
                'beds_numbers' => 3,
                'bathrooms_numbers' => 2,
                'square_meters' => 201,
                'image' => 'cover',
                'city' => 'Lazio',
                'zip_code' => 'Roma',
                'address' => 'Largo dei Lombardi 23, 00187 Roma',
                'latitude' => 41.9059015,
                'longitude' => 12.477944,
                'slug' => 'Appartamento-a-roma-5',
                'user_id' => 1,
            ],
            [
                'title' => 'Appartamento a Roma',
                'description' => "La casa dello scultore è al piano terra rialzato situata in una via tranquilla adiacente alla Metropolitana Cornelia (3 fermate dal Vaticano!), Dall'aeroporto è facile con la fermata Sitbusshuttle a 200 metri dalla casa (Circ. Aurelia 19).",
                'visibility' => 1,
                'rooms_numbers' => 2,
                'beds_numbers' => 3,
                'bathrooms_numbers' => 2,
                'square_meters' => 201,
                'image' => 'cover',
                'city' => 'Lazio',
                'zip_code' => 'Roma',
                'address' => 'Largo dei Lombardi 23, 00187 Roma',
                'latitude' => 41.9059015,
                'longitude' => 12.477944,
                'slug' => 'Appartamento-a-roma-5',
                'user_id' => 1,
            ],
            [
                'title' => 'Appartamento a Roma',
                'description' => "Il mio alloggio è situato nel quartiere Monti il più antico quartiere di Roma. Nella stessa via è vissuto Giulio Cesare. E' vicinissimo al Colosseo e ai Fori Imperiali (circa 200 metri).",
                'visibility' => 1,
                'rooms_numbers' => 2,
                'beds_numbers' => 3,
                'bathrooms_numbers' => 2,
                'square_meters' => 201,
                'image' => 'cover',
                'city' => 'Lazio',
                'zip_code' => 'Roma',
                'address' => 'Largo dei Lombardi 23, 00187 Roma',
                'latitude' => 41.9059015,
                'longitude' => 12.477944,
                'slug' => 'Appartamento-a-roma-5',
                'user_id' => 1,
            ],
            [
                'title' => 'Appartamento a Roma',
                'description' => "L'appartamento è al primo piano di uno storico edificio. Consiste in una camera da letto, una cucina e un bagno con doccia. La camera da letto è arredata con un letto matrimoniale e due letti pieghevoli.",
                'visibility' => 1,
                'rooms_numbers' => 2,
                'beds_numbers' => 3,
                'bathrooms_numbers' => 2,
                'square_meters' => 201,
                'image' => 'cover',
                'city' => 'Lazio',
                'zip_code' => 'Roma',
                'address' => 'Largo dei Lombardi 23, 00187 Roma',
                'latitude' => 41.9059015,
                'longitude' => 12.477944,
                'slug' => 'Appartamento-a-roma-5',
                'user_id' => 1,
            ],
            [
                'title' => 'Interno 7 Appartmento Gioioso',
                'description' => "Incredibile appartamento con lavastoviglie molto spazioso, collocato in zona residenziale tranquilla appena fuori dal centro di Padova. La fermata dell'autobus è a pochi metri di distanza ed è possibile raggiungere in meno di 10 minuti i monumenti principali",
                'visibility' => 1,
                'rooms_numbers' => 5,
                'beds_numbers' => 4,
                'bathrooms_numbers' => 2,
                'square_meters' => 100,
                'image' => 'cover',
                'city' => 'Padova',
                'zip_code' => '35127',
                'address' => 'Via Antonio Riccoboni, 6',
                'latitude' => 45.3875192,
                'longitude' => 11.8974231,
                'slug' => 'Appartamento-a-roma-5',
                'user_id' => 1,
            ],
        ];
    }
}
