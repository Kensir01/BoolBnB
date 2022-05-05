<?php

namespace App\Http\Controllers\User;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::where('user_id', Auth::id())->get();

        return view('user.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('user.apartments.create');
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
                'image' => 'required|image|max:2048',
                'city' => 'required|max:50|min:2',
                'address' => 'required|max:50|min:2',
                'zip_code' => 'required|max:15|min:3'
                
            ]
        );

        //Prendo tutti i dati
        $data = $request->all();

        //Salvo l'immagine in public/bnb_images
        $img_path = Storage::put('bnb_images', $data['image']);
        $data['image'] = $img_path;

        //Nuovo oggetto Apartment
        $apartment = new Apartment();
        
        //Dati temporanei
        $apartment->latitude = 90;
        $apartment->longitude = 90;
        $apartment->visibility = true;
        //
        
        //user_id preso dall'utente che ha effettuato il log in
        $apartment->user_id = Auth::id();

        $apartment->fill($data);
        $apartment->save();

        return redirect()->route('user.apartments.index')->with('status', 'Elemento creato corretamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {

        return view('user.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        
        return view('user.apartments.edit', compact('apartment'));
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
                'image' => 'image|max:2048',
                'city' => 'required|max:50|min:2',
                'address' => 'required|max:50|min:2',
                'zip_code' => 'required|max:15|min:3'
            ]
        );

        $data = $request->all();

        if(isset($data['image'])) {
            Storage::delete($apartment['image']);
            $img_path = Storage::put('bnb_images', $data['image']);
            $data['image'] = $img_path;
        }

        $apartment->update($data);
        $apartment->save();

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
        
        Storage::disk('public')->delete($apartment->image);
       

        $apartment->delete();

        return redirect()->route('user.apartments.index')->with('status', 'Elemento cancellato corretamente!');
    }
}
