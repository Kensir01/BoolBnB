@extends('user.layouts.base')

@section('content')

    <a class="btn btn-primary" href="{{route('user.apartments.create')}}">Aggiungi appartamento</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Numero stanze</th>
                <th scope="col">Numero bagni</th>
                <th scope="col">Numero letti</th>
                <th scope="col">Metri quadrati</th>
                <th scope="col">Latitudine</th>
                <th scope="col">Longitudine</th>
                <th scope="col">Immagine</th>
                <th scope="col">Visibilità</th>
                <th scope="col">Città</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">CAP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apartments as $apartment)

                <tr>
                    <td>{{$apartment->title}}</td>
                    <td>{{$apartment->rooms_number}}</td>
                    <td>{{$apartment->bathrooms_number}}</td>
                    <td>{{$apartment->beds_number}}</td>
                    <td>{{$apartment->square_meters}}</td>
                    <td>{{$apartment->latitude}}</td>
                    <td>{{$apartment->longitude}}</td>
                    <td><img src="{{ asset('storage/' . $apartment->image)}}" alt="{{$apartment->title}}"></td>
                    <td>{{$apartment->visibility}}</td>
                    <td>{{$apartment->city}}</td>
                    <td>{{$apartment->address}}</td>
                    <td>{{$apartment->zip_code}}</td>
                </tr>

            @endforeach
        </tbody>
    </table>
  
@endsection