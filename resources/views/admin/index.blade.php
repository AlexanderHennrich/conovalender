@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Home') }}</div>

                    <div class="card-body">

                        <a href="/home" class="btn btn-dark">Zurück</a>
                        <a href="/question" class="btn btn-dark">Zu den Fragen</a>
                        <a href="/user" class="btn btn-dark">Zu den Usern</a>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
