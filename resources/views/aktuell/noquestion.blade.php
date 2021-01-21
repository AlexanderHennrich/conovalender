@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Aktuelle Frage') }}</div>

                    <div class="card-body">

                            Keine Frage aktuell!
                        <p><a href="/" class="btn btn-dark">Zurück</a></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
