@extends('user.layouts.base')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <form method="POST" action="{{route('user.apartments.update', $apartment->id)}}" enctype="multipart/form-data">
            
                @csrf
                @method('PUT')
            
                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title'), $apartment->title}}">
                </div>
            
                <div class="form-group">
                    <label for="rooms_number">Numero delle stanze</label>
                    <input type="number" class="form-control" id="rooms_number" name="rooms_number" value="{{old('rooms_number'), $apartment->room_number}}">
                </div>
            
                <div class="form-group">
                    <label for="bathrooms_number">Numero dei bagni</label>
                    <input type="number" class="form-control" id="bathrooms_number" name="bathrooms_number" value="{{old('bathrooms_number'), $apartment->bathrooms_number}}">
                </div>
            
                <div class="form-group">
                    <label for="beds_number">Numero dei letti</label>
                    <input type="number" class="form-control" id="beds_number" name="beds_number" value="{{old('beds_number'), $apartment->beds_number}}">
                </div>
            
                <div class="form-group">
                    <label for="square_meters">Superficie (in metri quadrati)</label>
                    <input type="number" class="form-control" id="square_meters" name="square_meters" value="{{old('square_meters'), $apartment->square_meters}}">
                </div>
            
                <div class="form-group">
                    <label for="city">Città</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{old('city'), $apartment->city}}">
                </div>
            
                <div class="form-group">
                    <label for="address">Indirizzo</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{old('address'), $apartment->address}}">
                </div>
            
                <div class="form-group">
                    <label for="zip_code">CAP</label>
                    <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{old('zip_code'), $apartment->zip_code}}">
                </div>
            
                <div class="form-group">
                    <label for="image">Inserisci immagini</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>


                <button type="submit" class="btn btn-primary">Invia</button>
            
            </form>

        </div>
    </div>
</div>



@endsection