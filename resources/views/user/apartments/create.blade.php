@extends('user.layouts.base')

@section('content')

<form method="POST" action="{{route('user.apartments.store')}}" enctype="multipart/form-data">

    @csrf

    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>

    <div class="form-group">
        <label for="rooms_number">Numero delle stanze</label>
        <input type="number" class="form-control" id="rooms_number" name="rooms_number">
    </div>

    <div class="form-group">
        <label for="bathrooms_number">Numero dei bagni</label>
        <input type="number" class="form-control" id="bathrooms_number" name="bathrooms_number">
    </div>

    <div class="form-group">
        <label for="beds_number">Numero dei letti</label>
        <input type="number" class="form-control" id="beds_number" name="beds_number">
    </div>

    <div class="form-group">
        <label for="square_meters">Superficie (in metri quadrati)</label>
        <input type="number" class="form-control" id="square_meters" name="square_meters">
    </div>

    <div class="form-group">
        <label for="city">Città</label>
        <input type="text" class="form-control" id="city" name="city">
    </div>

    <div class="form-group">
        <label for="address">Indirizzo</label>
        <input type="text" class="form-control" id="address" name="address">
    </div>

    <div class="form-group">
        <label for="zip_code">CAP</label>
        <input type="text" class="form-control" id="zip_code" name="zip_code">
    </div>

    <div class="form-group">
        <label for="cover">Inserisci immagini</label>
        <input type="file" class="form-control" id="cover" name="cover">
    </div>



    <button type="submit" class="btn btn-primary">Submit</button>

  </form>


@endsection