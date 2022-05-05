@extends('user.layouts.base')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h1>Visualizza appartamento</h1>

            <img src="{{ asset(Storage::url($apartment->image))}}" alt="{{$apartment->title}}">
            <div><strong>Titolo: </strong>{{$apartment->title}}</div>
            <div><strong>Slug: </strong>{{$apartment->slug}}</div>
            <div><strong>Numero Stanze: </strong>{{$apartment->rooms_number}}</div>
            <div><strong>Numero Bagni: </strong>{{$apartment->bathrooms_number}}</div>
            <div><strong>Numero Letti: </strong>{{$apartment->beds_number}}</div>
            <div><strong>Metri Quadri: </strong>{{$apartment->square_meters}}</div>
            <div><strong>Latitudine: </strong>{{$apartment->latitude}}</div>
            <div><strong>Longitudine: </strong>{{$apartment->longitude}}</div>
            <div><strong>Visibilità: </strong>{{$apartment->visibility? 'Visibile': 'Nascosto'}}</div>
            <div><strong>Città: </strong>{{$apartment->city}}</div>
            <div><strong>Via: </strong>{{$apartment->address}}</div>
            <div><strong>CAP: </strong>{{$apartment->zip_code}}</div>
            <div><strong>Descrizione: </strong>{{$apartment->description}}</div>

            <a href="{{url()->previous()}}" class="btn btn-primary">Torna indietro</a>

        </div>
    </div>
</div>

@endsection
        