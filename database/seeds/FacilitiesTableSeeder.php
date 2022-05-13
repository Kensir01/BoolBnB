<?php

use App\Facility;
use Illuminate\Database\Seeder;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facilities = ['WiFi', 'Parcheggio', 'Piscina', 'Sauna', 'Vista mare', 'Cucina', 'Animali ammessi', 'Lavatrice', 'Riscaldamento', 'Carta igienica'];
        foreach($facilities as $facility) {
            $newFacility = new Facility();
            $newFacility->name = $facility;
            $str = strtolower($facility);
            $str = str_replace(' ', '_', $str);
            $newFacility->icon_normal = 'icons/normal/' . $str . '.svg';
            $newFacility->icon_highlight = 'icons/yellow/' . $str . '_y.svg';
            $newFacility->save();
        }
        
    }
}
