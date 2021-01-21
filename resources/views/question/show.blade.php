@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Details') }}</div>

                    <div class="card-body">

                        <h1>{{$question->name}}</h1>
                        @if($question->media_url)


                            <div class="container">
                                <video width="100%" src="{{asset(Storage::url($question->media_url))}}" class="video-fluid z-depth-1"
                                       controls  > </video>
                            </div>
                        @endif
                        <p>{{$question->text}}</p>
                        <p>Anzeige Datum: {{$question->showDate}}</p>

                        <div class="row">
                            <a href="/question" class="btn btn-dark">Zurück</a>
                            <a href="/question/{{$question->id}}/edit" class="btn btn-dark">Bearbeiten</a>
                            <form action="/question/{{$question->id}}" method="post">
                                @method('DELETE')
                                <button class="btn btn-dark">Löschen</button>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
