<?php

namespace App\Http\Controllers\Api;

use App\Apartment;
use App\Http\Controllers\Controller;
use Doctrine\DBAL\Query;
use Dotenv\Result\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\ElseIf_;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $apartments = Apartment::with(['facilities'])->get();

        $apartments->each(function($apartment) {
            $apartment->image = url('storage/' . $apartment->image);
        });


        return response()->json(
            [
                'data' => $apartments,
                'success' => true
            ]
            );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $apartment = Apartment::where('slug', '=', $slug)->with(['facilities'])->first();

        $apartment->image = url('storage/' . $apartment->image);

        if($apartment) {
            return response()->json(
                [
                    'data' => $apartment,
                    'success' => true
                ]
            );
        } else {
            return response()->json(
                [
                    'data' => 'Nessun risultato',
                    'success' => false
                ]
            );
        }

    }

    /**
     *
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request 
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $location = $request->input('location');

        $geocoded = Http::withoutVerifying()->get('https://api.tomtom.com/search/2/geocode/'. $location .'.json', [
            'key' => config('services.tomtom.key'),
            'limit' => '1'
        ]);

       
        $lat = $geocoded['results'][0]['position']['lat'];
        $lon = $geocoded['results'][0]['position']['lon'];
        
        $apartments = Apartment::all();

        $filtered = [];
        foreach($apartments as $apartment) {
            $distance = self::getDistance($lat, $lon, $apartment->latitude, $apartment->longitude);
            if($distance <= 20000) {
                array_push($filtered, $apartment);
            };
        }

        return compact('filtered', 'lat', 'lon');
    }

    /**
     *
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request 
     * @return \Illuminate\Http\Response
     */
    public function filteredSearch(Request $request)
    {

        if($request->input('location') !== null) {
            $location = $request->input('location');
        } else {
            $response = [
                        'result' => false,
                        'data' => 'Nessun risultato'
                    ];
            return compact('response');
        }
        

        if(null !== $request->input('beds') || $request->input('beds') >= 0) {
            $beds = $request->input('beds');
        } else{
            $beds = 1;
        }

        if(null !== $request->input('rooms') || $request->input('rooms') >= 0) {
            $rooms = $request->input('rooms');
        } else{
            $rooms = 1;
        }

        if(null !== $request->input('distance') || $request->input('distance') >= 20000) {
            $range = $request->input('distance');
        } else{
            $range = 20000;
        }

        if(null !== $request->input('facilities')) {
            $facilities = $request->input('facilities');
        } else{
            $facilities = [];
        }

        $geocoded = Http::withoutVerifying()->get('https://api.tomtom.com/search/2/geocode/'. $location .'.json', [
            'key' => config('services.tomtom.key'),
            'limit' => '1'
        ]);

        

        $lat = $geocoded['results'][0]['position']['lat'];
        $lon = $geocoded['results'][0]['position']['lon'];
        

        //query di ricerca
        $apartments = Apartment::with('facilities')
        ->where([['rooms_number', '>=', $rooms],['beds_number', '>=', $beds]])
        ->where(function($query) use($facilities){
            foreach($facilities as $facility) {
                $query->whereHas('facilities', function($query) use ($facility) {
                    $query->where('id', $facility);
                });
            }

        })->get();



        $filtered = [];
        foreach($apartments as $apartment) {
            $distance = self::getDistance($lat, $lon, $apartment->latitude, $apartment->longitude);
            if($distance <= $range) {
                array_push($filtered, $apartment);
            };
        }

        $response = [
            'result' => true,
            'data' => $filtered
        ];
        return compact('response');
    }

    //Calcolo distanza dal punto inserito
    //FORMULA DI 

    protected function getDistance($lat1, $lon1, $lat2, $lon2) {

        $R = 6371000;

        $lat1 = round($lat1 * (M_PI / 180), 14);
        $lat2 = round($lat2 * (M_PI / 180), 14);

        $deltaLat = round(($lat2-$lat1) * (M_PI / 180), 14);
        $deltaLon = round(($lon2-$lon1) * (M_PI / 180), 14);
        
        //$d = asin( sin($lat1)*sin($lat2) + cos($lat1)*cos($lat2) * cos($deltaLon) ) * $R;
        $a = pow(sin($deltaLat/2), 2) + cos($lat1) * cos($lat2) * pow(sin($deltaLon/2), 2);
        $c = 2 * atan2(sqrt($a),sqrt(1-$a));

        $d = $R * $c;

        return $d;
    }
}
