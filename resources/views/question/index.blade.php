@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Fragen') }}</div>

                    <div class="card-body">
                        <a href="/admin" class="btn btn-dark">Zurück</a>
                        <a href="/question/create" class="btn btn-dark">Neue Frage</a>
                        @foreach($questions as $question)

                            <li><a href="/question/{{$question->id}}">{{$question->name}} {{$question->showDate}}</a></li>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
