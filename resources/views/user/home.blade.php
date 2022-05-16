@extends('user.layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header dash_utente_top">{{ __('Dashboard') }}</div>

                <div class="card-body dash_utente_bot">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Ciao {{$user->name}} {{$user->surname}} # {{$user->id}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
