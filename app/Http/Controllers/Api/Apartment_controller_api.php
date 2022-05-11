<?php

namespace App\Http\Controllers\Api;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

        
        $geometryList = [
            [
                'type' => 'CIRCLE',
                'position' => $lat . ', ' . $lon ,
                'radius' => 20000
            ]
        ];

        $apartments = Apartment::all();


        foreach ($apartments as $apartment) {
            $poiList[] = [

                'poi' => [
                    "name" => $apartment->title,
                ],
                'address' => [
                    "freeFormAddress" => $apartment->address . ', ' . $apartment->city . ', ' . $apartment->zip_code
                ],
                'position' => [
                    "lat" => $apartment->latitude ,
                    "lon" => $apartment->longitude
                ]

            ];
        }

        $poiList = json_encode($poiList);
        $geometryList = json_encode($geometryList);

        $filtered = Http::withoutVerifying()->get("https://api.tomtom.com/search/2/geometryFilter.json", [
            'key' => config('services.tomtom.key'),
            'poiList' => $poiList,
            'geometryList' => $geometryList
        ]);

        $filtered = $filtered->json();

        return compact('filtered', 'poiList','geometryList');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
