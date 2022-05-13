@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center pt-5">

    <div class="login-form d-flex justify-content-center mt-2">
         
        <div class="yellow-box left-box"></div>
        <div class="yellow-box right-box"></div>

        <div class="col">
            <h1>Accedi</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf


                <label for="email" class="label mt-4">email *</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    
                <label for="password" class="label  mt-3">password *</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="info mt-3">I campi contrassegnati con * sono obbligatori</div>

                <div class="my-2">
                    <input class="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="" for="remember">ricordami</label>
                </div>
    
                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="button">{{ __('Login') }}</button>
                    </div>
                    <div class="col-8 text-right">
                        @if (Route::has('password.request'))
                            <a class="forgot" href="{{ route('password.request') }}">Dimenticato la password?</a>
                        @endif
                    </div>
            </form>
        </div>
    </div>
               
</div>
@endsection
