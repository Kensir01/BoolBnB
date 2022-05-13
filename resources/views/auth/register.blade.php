@extends('layouts.app')

@section('content')
<div class="container">
    <div class= justify-content-center">
        <div class="col-md-8">
            <div class="card card_dem">
                <div class="card-header align-self-center">{{ __('Registrati') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- nome --}}
                        <div class="form-group">
                            <label for="name" class=" col-form-label text-md-center culetto">{{ __('nome') }}</label>
                            
                            <div class="prove_form">
                                <input id="name" type="text" class="form-control form_rubik" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                {{-- @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        {{-- cognome --}}
                        <div class="form-group">
                            <label for="surname" class="col-form-label text-md-center culetto">{{ __('cognome') }}</label>

                            <div class="prove_form">
                                <input id="surname" type="text" class="form-control form_rubik " name="surname" value="{{ old('surname') }}" autocomplete="surname" autofocus>

                                {{-- @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        {{-- data nascita --}}
                        <div class="form-group">
                            <label for="date_of_birth" class="col-form-label text-md-center culetto">{{ __('data di nascita') }}</label>

                            <div class="prove_form">
                                <input id="date_of_birth" type="date" class="form-control form_rubik" name="date_of_birth" value="{{ old('date_of_birth') }}" autocomplete="date_of_birth" autofocus>

                                {{-- @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        {{-- email --}}
                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-center culetto">{{ __('indirizzo Email *') }}</label>

                            <div class="prove_form">
                                <input id="email" type="email" class="form-control form_rubik @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- password --}}
                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-center culetto">{{ __('password *') }}</label>

                            <div class="prove_form">
                                <input id="password" type="password" class="form-control form_rubik @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- password confirm --}}
                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label text-md-center culetto">{{ __('conferma password *') }}</label>

                            <div class="prove_form">
                                <input id="password-confirm" type="password" class="form-control form_rubik" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="text-center my-2">
                          
                                <h6>I campi con * sono campi obbligatori</h6>
                           
                        </div>
                       

                        <div class="form-group mb-0 row">
                            <div class="col-sm"></div>
                            <div class="col-sm-auto align-items-center">
                                <button type="submit" class="button">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                            <div class="col-sm"></div>
                        </div>
                        

                        <div class="rettangolo_piccolo_2"></div>
                        <div class="rettangolo_piccolo_1"></div>
                        <div class="rettangolo_piccolo_3"></div>    
                        <div class="bordo_piccolo_1"></div>
                        <div class="bordo_piccolo_2"></div>
                        <div class="bordo_piccolo_3"></div>

                        <div class="rettangolo_grande_1"></div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


