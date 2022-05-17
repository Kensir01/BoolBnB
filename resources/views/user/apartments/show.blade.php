@extends('user.layouts.base')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h1>Visualizza appartamento</h1>

            <div class="row my-5">

                <div class="col-5">
                    <div class="debug1">
                        <img class="dimensione" src="{{ asset(Storage::url($apartment->image))}}" alt="{{$apartment->title}}">
                    </div>
                </div>

                <div class="col-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="col_dex_1 row ">
                                <div class="col-6">
                                    <div class="prove_margin"><strong>Titolo: </strong>{{$apartment->title}}</div>
                                    <div class="prove_margin"><strong>Numero Stanze: </strong>{{$apartment->rooms_number}}</div>
                                    <div class="prove_margin"><strong>Numero Bagni: </strong>{{$apartment->bathrooms_number}}</div>
                                    <div class="prove_margin"><strong>Numero Letti: </strong>{{$apartment->beds_number}}</div>
                                    <div class="prove_margin"><strong>Metri Quadri: </strong>{{$apartment->square_meters}}</div>
                                    <div class="prove_margin"><strong>Visibilità: </strong>{{$apartment->visibility? 'Visibile': 'Nascosto'}}</div>
                                    <div class="prove_margin"><strong>Città: </strong>{{$apartment->city}}</div>
                                    <div class="prove_margin prove_address"><strong>Via: </strong>{{$apartment->address}}</div>
                                    <div class="prove_margin"><strong>CAP: </strong>{{$apartment->zip_code}}</div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        @foreach ($apartment->facilities as $facility)
                                            <span class="badge badge-primary">{{$facility->name}}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-12">
                            <div class="col_dex_2">
                                <div><strong>Descrizione: </strong>{{$apartment->description}}</div>
                            </div>
                        </div>                
                    </div>
                </div>

            </div>

            {{-- <div><strong>Latitudine: </strong>{{$apartment->latitude}}</div>
            <div><strong>Longitudine: </strong>{{$apartment->longitude}}</div>
            <div><strong>Slug: </strong>{{$apartment->slug}}</div> --}}
            <div class="row">
                <div class="col-5"></div>
                <div class="col-2 align-self-center">
                    <a href="{{url()->previous()}}" class="button button_show_blade">Torna indietro</a>
                </div>
                <div class="col-4"></div>
            </div>

        </div>
    </div>
</div>

@endsection
        