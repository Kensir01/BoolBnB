@extends('layouts.app')

@section('content')
<div class="container">
    <div class= "row justify-content-center">
        <div class="col-md-6">
            <div class="card card_register">
                <div class="card-header_register align-self-center">{{ __('Registrati') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- nome --}}
                        <div class="form-group">
                            <label for="name" class=" col-form-label text-md-center container_register">{{ __('nome') }}</label>
                            
                            <div class="form_register_esterno">
                                <input id="name" type="text" class="form-control_register form_rubik" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Marco">

                                {{-- @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        {{-- cognome --}}
                        <div class="form-group">
                            <label for="surname" class="col-form-label text-md-center container_register">{{ __('cognome') }}</label>

                            <div class="form_register_esterno">
                                <input id="surname" type="text" class="form-control_register form_rubik " name="surname" value="{{ old('surname') }}" autocomplete="surname" autofocus placeholder="Rossi">

                                {{-- @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        {{-- data nascita --}}
                        <div class="form-group">
                            <label for="date_of_birth" class="col-form-label text-md-center container_register">{{ __('data di nascita') }}</label>

                            <div class="form_register_esterno">
                                <input id="date_of_birth" type="date" class="form-control_register form_rubik" name="date_of_birth" value="{{ old('date_of_birth') }}" autocomplete="date_of_birth" autofocus>

                                {{-- @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        {{-- email --}}
                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-center container_register">{{ __('indirizzo Email *') }}</label>

                            <div class="form_register_esterno">
                                <input id="email" type="email" class="form-control_register form_rubik @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="marcorossi@something.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- password --}}
                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-center container_register">{{ __('password *') }}</label>

                            <div class="form_register_esterno">
                                <input id="password" type="password" class="form-control_register form_rubik @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="*********">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- password confirm --}}
                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label text-md-center container_register">{{ __('conferma password *') }}</label>

                            <div class="form_register_esterno">
                                <input id="password-confirm" type="password" class="form-control_register form_rubik" name="password_confirmation" required autocomplete="new-password" placeholder="*********">
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


