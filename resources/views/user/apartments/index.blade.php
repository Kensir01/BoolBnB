@extends('user.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

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
                            <th scope="col">Azioni</th>
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
                                <td><img src="{{ asset(Storage::url($apartment->image))}}" alt="{{$apartment->title}}"></td>
                                <td>{{$apartment->visibility}}</td>
                                <td>{{$apartment->city}}</td>
                                <td>{{$apartment->address}}</td>
                                <td>{{$apartment->zip_code}}</td>
                                <td class="d-flex">
                                    <a href="{{route('user.apartments.show', $apartment->id)}}" class="btn btn-primary">Mostra</a>
                                    <a href="{{route('user.apartments.edit', $apartment->id)}}" class="btn btn-secondary">Modifica</a>

                                    <form method="POST" action="{{route('user.apartments.destroy', $apartment->id)}}">

                                        @csrf
                                        @method('DELETE')
              
                                        <button type="sumbit" class="btn btn-danger">Elimina</button>
              
                                      </form>

                                </td>
                            </tr>
            
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
  
@endsection