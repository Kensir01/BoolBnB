@extends('user.layouts.base')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            {{-- Errori --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{route('user.apartments.store')}}" enctype="multipart/form-data" class="login-form">
            
                @csrf
            
               

               

                <h5 class="my-2">Tutti i campi sono obbligatori</h5>

                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input type="text" class="form-control form_create" id="title" name="title" value="{{old('title')}}" required min="2" max="30" placeholder="Es. Villa vista mare">
                </div>
            
                <div class="form-group">
                    <label for="rooms_number">Numero delle stanze</label>
                    <input type="number" class="form-control form_create" id="rooms_number" name="rooms_number" value="{{old('rooms_number')}}" required min="1" max="255" placeholder="Es. 5">
                </div>
            
                <div class="form-group">
                    <label for="bathrooms_number">Numero dei bagni</label>
                    <input type="number" class="form-control form_create" id="bathrooms_number" name="bathrooms_number" value="{{old('bathrooms_number')}}" required min="1" max="255" placeholder="Es. 2">
                </div>
            
                <div class="form-group">
                    <label for="beds_number">Numero dei letti</label>
                    <input type="number" class="form-control form_create" id="beds_number" name="beds_number" value="{{old('beds_number')}}" required min="1" max="255" placeholder="Es. 4">
                </div>
            
                <div class="form-group">
                    <label for="square_meters">Superficie (in metri quadrati)</label>
                    <input type="number" class="form-control form_create" id="square_meters" name="square_meters" value="{{old('square_meters')}}" required min="1" max="32766" placeholder="Es. 500">
                </div>
            

                <div class="form-group">
                    <label for="city">Città</label>
                    <input type="text" class="form-control form_create" id="city" name="city" value="{{old('city')}}" required min="2" max="50" autocomplete="noooooooooooooooooooooooo" placeholder="Es. Bologna">
                    <ul id="cityList" class="autocomplete"></ul>
                </div>
            

                <div class="form-group">
                    <label for="address">Indirizzo</label>
                    <input type="text" class="form-control form_create" id="address" name="address" value="{{old('address')}}" required min="2" max="50" autocomplete="noooooooooooooooooooooooo" placeholder="Es. Via Enrico Mattei"> 
                    <ul id="addressList" class="autocomplete"></ul>
                </div>


                <div class="form-group">
                    <label for="zip_code">CAP</label>
                    <input type="text" class="form-control form_create" id="zip_code" name="zip_code" value="{{old('zip_code')}}" required min="3" max="15" autocomplete="noooooooooooooooooooooooo" placeholder="Es. 04023">
                </div>


                <div class="form-floating">
                    <label for="description">Descrizione</label>
                    <textarea class="form-control form_create description_create" placeholder="Inserisci una descrizione per il tuo Appartamento" id="description" style="height: 100px" name="description" required min="10">{{old('description')}}</textarea>
                </div>
                

                <div class="mt-3">
                    <input type="checkbox" class="" id="visibility" name="visibility" value="1" {{old('visibility')? 'checked': ''}}>
                    <label class="" for="visibility">Visibilità</label>
                </div>

                <div class="form-group">
                    <label for="image">Inserisci immagini</label>
                    <div class="sfoglia_create">
                        <img src="http://127.0.0.1:8000/storage/elements/prova_3.svg" alt="Sfoglia :3" class="sfoglia_svg_create">
                        <input type="file" class="form-control form_img ffc2" id="image" name="image">
                    </div>
                </div>

                {{-- Facilities --}}
                @foreach ($facilities as $facility)
                    
                    <div class="create_edit_check">
                        <input type="checkbox" name="facilities[]" class="" id="facility_{{$facility->id}}" value="{{$facility->id}}" {{in_array( $facility->id, old('facilities', []))? 'checked' : ''}}>
                        <label class="label_check" for="facility_{{$facility->id}}">{{$facility->name}}</label>
                    </div>

                @endforeach
            
                <button type="submit" class="button">Invia</button>
            
            </form>

        </div>
    </div>
</div>
@endsection

<!-- collegamento con file js - figlio -->
@section('script')
{{-- collegato file css --}}
<link href="{{ asset('css/autocomplete.css') }}" rel="stylesheet">
<!-- Scripts -->
{{-- <script src="{{assets('js/scripts/autocomplete.js')}}" defer></script> --}}
<script type="text/javascript" src="{{ URL::asset ('js/autocomplete.js')}}" defer></script>
@endsection 


