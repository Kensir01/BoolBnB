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
        $facilities = ['WiFi', 'Posto macchina', 'Piscina', 'Portineria', 'Sauna', 'Vista mare', 'Cucina', 'Animali domestici consentiti', 'Self check-in', 'Lavatrice', 'Asciugatrice', 'Riscaldamento', 'Carta igienica'];
        foreach($facilities as $facility) {
            $newFacility = new Facility();
            $newFacility->name = $facility;
            $newFacility->save();
        }
        
    }
}
