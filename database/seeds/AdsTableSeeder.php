<?php

use App\Ad;
use Illuminate\Database\Seeder;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ads = [

            [
                'name'=>'Basic',
                'price'=>2.99,
                'duration'=>'24'
            ],
            [
                'name'=>'Medium',
                'price'=>5.99,
                'duration'=>'72'
            ],
            [
                'name'=>'Premium',
                'price'=>9.99,
                'duration'=>'144'
            ]
        
        ];

        foreach($ads as $ad) {
            $newAd = new Ad();
            $newAd->name = $ad['name'];
            $newAd->price = $ad['price'];
            $newAd->duration = $ad['duration'];
            $newAd->save();
        }
    }
}
