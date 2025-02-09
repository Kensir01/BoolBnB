<?php

namespace App\Http\Controllers\User;

use App\Apartment;
use App\Facility;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use function Ramsey\Uuid\v1;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::with('messages')->where('user_id', Auth::id())->get();

        return view('user.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $facilities = Facility::all();
        return view('user.apartments.create', compact('facilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validazione dati
        $request->validate(
            [
                'title' => 'required|max:30|min:2',
                'rooms_number' => 'required|numeric|max:255|min:1',
                'bathrooms_number' => 'required|numeric|max:255|min:1',
                'beds_number' => 'required|numeric|max:255|min:1',
                'square_meters' => 'required|numeric|max:32766|min:1',
                // formati accettati nel caricamento del file
                'image' => 'required|max:2048|mimes:jpeg,jpg,png,svg',
                'city' => 'required|max:50|min:2',
                'address' => 'required|max:50|min:2',
                'zip_code' => 'required|max:15|min:3',
                'description' => 'required|min:10',
                'facilities' => 'required|exists:facilities,id',
                'visibility' => 'nullable|boolean'
            ]
        );

        //Prendo tutti i dati
        $data = $request->all();


        // TOM TOM
        $response = Http::withoutVerifying()->get('https://api.tomtom.com/search/2/geocode/' . $data['address'] . ' ' . $data['zip_code'] . ' ' . $data['city'] . ' ' . '.json', [
            'key' => config('services.tomtom.key'),
            'limit' => '1'
        ]);

        $coordinates = $response->json();
        // dd($coordinates);
        $data['latitude'] = $coordinates['results'][0]['position']['lat'];
        $data['longitude'] = $coordinates['results'][0]['position']['lon'];
        // dd($response);
        // Log::info($response);



        //Salvo l'immagine in public/storage/bnb_images
        $img_path = Storage::put('bnb_images', $data['image']);
        $data['image'] = $img_path;

        //Creazione slug
        $slug = Str::slug($data['title']);

        $counter = 1;

        while (Apartment::where('slug', '=', $slug)->first()) {
            $slug = Str::slug($data['title']) . '-' . $counter;
            $counter++;
        }

        $data['slug'] = $slug;

        //Visibilità
        if(isset($data['visibility'])) {
            $data['visibility'] = true;
        } else {
            $data['visibility'] = false;
        }


        //Nuovo oggetto Apartment
        $apartment = new Apartment();


        //user_id preso dall'utente che ha effettuato il log in
        $apartment->user_id = Auth::id();

        $apartment->fill($data);
        $apartment->save();

        $apartment->facilities()->sync($data['facilities']);

        return redirect()->route('user.apartments.index')->with('status', 'Elemento creato corretamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $apartment = Apartment::with('messages')->where('slug', '=', $slug)->first();
        $this->authorize('view', $apartment);
        return view('user.apartments.show', compact('apartment'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $apartment = Apartment::where('slug', '=', $slug)->first();
        $this->authorize('view', $apartment);

        $facilities = Facility::all();
        return view('user.apartments.edit', compact('apartment', 'facilities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        //validazione dati
        $request->validate(
            [
                'title' => 'required|max:30|min:2',
                'rooms_number' => 'required|numeric|max:255|min:1',
                'bathrooms_number' => 'required|numeric|max:255|min:1',
                'beds_number' => 'required|numeric|max:255|min:1',
                'square_meters' => 'required|numeric|max:32766|min:1',
                'image' => 'max:2048|mimes:jpeg,jpg,png,svg',
                'city' => 'required|max:50|min:2',
                'address' => 'required|max:50|min:2',
                'zip_code' => 'required|max:15|min:3',
                'description' => 'required|min:10',
                'facilities' => 'required|exists:facilities,id'
            ]
        );

        // per privacy
        $this->authorize('update', $apartment);

        $data = $request->all();

        if(isset($data['city']) || isset($data['address']) || isset($data['zip_code'])) {

            $response = Http::withoutVerifying()->get('https://api.tomtom.com/search/2/geocode/' . $data['address'] . ' ' . $data['zip_code'] . ' ' . $data['city'] . ' ' . '.json', [
                'key' => config('services.tomtom.key'),
                'limit' => '1'
            ]);
    
            $coordinates = $response->json();
            // dd($coordinates);
            $data['latitude'] = $coordinates['results'][0]['position']['lat'];
            $data['longitude'] = $coordinates['results'][0]['position']['lon'];
            // dd($response);
            // Log::info($response);
        }

        if(isset($data['image'])) {
            Storage::delete($apartment['image']);
            $img_path = Storage::put('bnb_images', $data['image']);
            $data['image'] = $img_path;
        }

        //Creazione slug
        $slug = Str::slug($data['title']);

        if ($apartment->slug != $slug) {
            
            $counter = 1;
            
            while(Apartment::where('slug', '=', $slug)->first()) {
                
                $slug = Str::slug($data['title']) . '-' . $counter;
                $counter++;
            }
            
            $data['slug'] = $slug;
        }
        
        //Visibilità
        if(isset($data['visibility'])) {
            $data['visibility'] = true;
        } else {
            $data['visibility'] = false;
        }


        $apartment->update($data);
        $apartment->save();

        if(isset($data['facilities'])) {
            $apartment->facilities()->sync($data['facilities']);
        }

        return redirect()->route('user.apartments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        
        //Elimino l'immagine dal database
        Storage::disk('public')->delete($apartment->image);
       
        //Elimino l'appartamento
        $apartment->delete();

        return redirect()->route('user.apartments.index')->with('status', 'Elemento cancellato corretamente!');
    }
}
