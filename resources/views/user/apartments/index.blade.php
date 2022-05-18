@extends('user.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="row justify-content-between p-4">
                    <div class="col-2">
                        <a onclick="document.getElementById('showMessage').style.display='block'" class="messageButton">
                            <img src="http://127.0.0.1:8000/storage/icons/normal/mex_white.svg" alt="mostra">
                        </a>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-2">
                        <a class="button" href="{{route('user.apartments.create')}}">Aggiungi appartamento</a>
                    </div>
                </div>
            
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="debug1 yellow">immagine</th>
                            <th scope="col" class="debug1 yellow">titolo</th>
                            <th scope="col" class="debug1 yellow">opzioni</th>                            
                            {{-- <th scope="col">Descrizione</th> --}}
                            {{-- <th scope="col">Numero stanze</th>
                            <th scope="col">Numero bagni</th>
                            <th scope="col">Numero letti</th>
                            <th scope="col">Metri quadrati</th>
                            <th scope="col">Latitudine</th>
                            <th scope="col">Longitudine</th> --}}
                            {{-- <th scope="col">Visibilità</th>
                            <th scope="col">Città</th>
                            <th scope="col">Indirizzo</th>
                            <th scope="col">CAP</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($apartments as $apartment)
            
                            <tr>
                                <td><img src="{{ asset(Storage::url($apartment->image))}}" alt="{{$apartment->title}}" class="dimensione"></td>
                                <td><span class="titolo_prova">{{$apartment->title}}</span>
                                    <hr> 
                                    <span class="descrizione_prova">{{$apartment->description}}</span>
                                </td>
                                {{-- <td>{{$apartment->rooms_number}}</td>
                                <td>{{$apartment->bathrooms_number}}</td>
                                <td>{{$apartment->beds_number}}</td>
                                <td>{{$apartment->square_meters}}</td>
                                <td>{{$apartment->latitude}}</td>
                                <td>{{$apartment->longitude}}</td> --}}
                                {{-- <td>{{$apartment->visibility}}</td>
                                <td>{{$apartment->city}}</td>
                                <td>{{$apartment->address}}</td>
                                <td>{{$apartment->zip_code}}</td> --}}
                                <td class="align-middle">
                                    <div class="d-flex justify-content-around align-items-center">
                                        <a href="{{route('user.apartments.show', $apartment->slug)}}"><img src="http://127.0.0.1:8000/storage/icons/normal/vedi.svg" alt="mostra" class="svg_dash"></a>
                                        <a href="{{route('user.apartments.edit', $apartment->slug)}}"><img src="http://127.0.0.1:8000/storage/icons/normal/modifica.svg" alt="mostra" class="svg_dash"></a>
    
                                        <form method="POST" action="{{route('user.apartments.destroy', $apartment->id)}}">
    
                                            @csrf
                                            @method('DELETE')
                  
                                            {{-- chiedere conferma della cancellazione, prima di eliminare l’elemento --}}
                                            {{-- <a type="submit" onclick="return confirm('Sei sicuro?')"><img src="http://127.0.0.1:8000/storage/icons/normal/cancella.svg" alt="mostra" class="svg_dash"></a> --}}
                                            <a type="submit" onclick="document.getElementById('btnDelete').style.display='block'"><img src="http://127.0.0.1:8000/storage/icons/normal/cancella.svg" alt="mostra" class="svg_dash"></a>

                                            
                                            {{-- <button onclick="document.getElementById('id01').style.display='block'"><img src="http://127.0.0.1:8000/storage/icons/normal/cancella.svg" alt="mostra" class="svg_dash"></button> --}}

                                            <div id="btnDelete" class="modal">
                                                <span onclick="document.getElementById('btnDelete').style.display='none'" class="close" title="Close Modal">×</span>
                                                <form class="modal-content">
                                                    <div class="containerDeletebtn">
                                                        <h1>Cancella Appartamento</h1>
                                                        <p>Sei sicuro di voler eliminare questo appartamento?</p>
                                                        
                                                            
                                                            <img src="http://127.0.0.1:8000/storage/elements/bust-53.svg" class="imageDelete" alt="omino">
                                                

                                                        <div class="clearfix centro">
                                                            <button type="button" onclick="document.getElementById('btnDelete').style.display='none'" class="annulla">Annulla</button>
                                                            <button type="submit" onclick="document.getElementById('btnDelete').style.display='none'" class="cancella" >Cancella</button>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </form>

                                        <div id="showMessage" class="modal messages">
                                            <span onclick="document.getElementById('showMessage').style.display='none'" class="exit" title="Close Modal">×</span>
                                            <div class="holes"></div>
                                            <div class="dashed"></div>

                                                <div class="messagesBox">
                                                    @foreach ($apartments as $apartment)
                                                        @if (count($apartment->messages) != 0)
                                                        
                                                            <div class="singleApartmentMessages">
                                                                <div class="text-left pl-2 mb-2">
                                                                    <h3 class="title"><a href="{{route('user.apartments.show', $apartment->slug)}}">{{$apartment->title}}</a></h3>
                                                                </div>
                                                                @foreach ($apartment->messages as $message)
                                                                    <div class="singleMessage">
                                                                        <div class="info pl-2">
                                                                            <div>{{$message->email}}</div>
                                                                            <div class="timeStamp">{{$message->created_at}}</div>
                                                                        </div>
                                                                        <div class="contentMessage">
                                                                            {{$message->content}}
                                                                        </div>
                                                                    </div>

                                                                @endforeach
                                                            </div>
                                                        @endif

                                                    @endforeach
                                                </div>

                                        </div>

                                    </div>
                                </td>
                            </tr>
            
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

    
    <script>
        // Get the modal
        var modal = document.getElementById('btnDelete');
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
    </script>

@endsection