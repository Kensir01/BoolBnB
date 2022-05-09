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

            <form method="POST" action="{{route('user.apartments.store')}}" enctype="multipart/form-data">
            
                @csrf
            
               

               

                <h5 class="my-2">Tutti i campi sono obbligatori</h5>

                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" required min="2" max="30">
                </div>
            
                <div class="form-group">
                    <label for="rooms_number">Numero delle stanze</label>
                    <input type="number" class="form-control" id="rooms_number" name="rooms_number" value="{{old('rooms_number')}}" required min="1" max="255">
                </div>
            
                <div class="form-group">
                    <label for="bathrooms_number">Numero dei bagni</label>
                    <input type="number" class="form-control" id="bathrooms_number" name="bathrooms_number" value="{{old('bathrooms_number')}}" required min="1" max="255">
                </div>
            
                <div class="form-group">
                    <label for="beds_number">Numero dei letti</label>
                    <input type="number" class="form-control" id="beds_number" name="beds_number" value="{{old('beds_number')}}" required min="1" max="255">
                </div>
            
                <div class="form-group">
                    <label for="square_meters">Superficie (in metri quadrati)</label>
                    <input type="number" class="form-control" id="square_meters" name="square_meters" value="{{old('square_meters')}}" required min="1" max="32766">
                </div>
            
                <div class="form-group">
                    <label for="city">Città</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{old('city')}}" required min="2" max="50">
                </div>
            
                <div class="form-group">
                    <label for="address">Indirizzo</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}" required min="2" max="50">
                </div>
            
                <div class="form-group">
                    <label for="zip_code">CAP</label>
                    <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{old('zip_code')}}" required min="3" max="15">
                </div>
            
                <div class="form-floating">
                    <label for="description">Descrizione</label>
                    <textarea class="form-control" placeholder="Inserisci una descrizione" id="description" style="height: 100px" name="description" required min="10">{{old('description')}}</textarea>
                </div>

                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="visibility" name="visibility" value="1" {{old('visibility')? 'checked': ''}}>
                    <label class="custom-control-label" for="visibility">Visibilità</label>
                </div>

                <div class="form-group">
                    <label for="image">Inserisci immagini</label>
                    <input type="file" class="form-control" id="image" name="image" required min="1">
                </div>

                {{-- Facilities --}}
                @foreach ($facilities as $facility)
                    
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="facilities[]" class="custom-control-input" id="facility_{{$facility->id}}" value="{{$facility->id}}" {{in_array( $facility->id, old('facilities', []))? 'checked' : ''}}>
                        <label class="custom-control-label" for="facility_{{$facility->id}}">{{$facility->name}}</label>
                    </div>

                @endforeach
            
                <button type="submit" class="btn btn-primary">Invia</button>
            
            </form>

        </div>
    </div>
</div>



@endsection