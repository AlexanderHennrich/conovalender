@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @foreach($questions as $question)

                    <div class="card">
                        <div class="card-header">{{ __('Aktuelle Frage') }}</div>
                        <div class="card-body">
                            <h1>{{$question->name}}</h1>
                            <h3>{{$question->Punkte}} Pkt.</h3>
                            <p>{{$question->text}}</p>

                            @if($question->media_url)
                             <div class="container">
                               <video width="100%" src="{{asset(Storage::url($question->media_url))}}" class="video-fluid z-depth-1"
                                        controls  > </video>
                        </div>
                            @endif
                            @if($question->media_answer)
                                <form action="/answer" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <input type="hidden" name="question_id" value="{{$question->id}}"></input>
                                        <input type="hidden" name="question_name" value="{{$question->name}}"></input>
                                        <input type="file" name="media" id="media">
                                        <button type="submit" class="btn btn-dark">Abschicken</button>
                                    </div>
                                    @csrf
                                </form>

                            @else
                                <form action="/answer" method="post">
                                    <div class="form-group">
                                        <label for="answer"><strong>Antwort:</strong></label>
                                        <textarea name="answer" id="" class="form-control"></textarea>
                                        <input type="hidden" name="question_id" value="{{$question->id}}"></input>
                                        <input type="hidden" name="question_name" value="{{$question->name}}"></input>

                                    </div>

                                    <button type="submit" class="btn btn-dark">Abschicken</button>
                                    @csrf
                                </form>
                            @endif
                            <a href="/" class="btn btn-dark">Zurück</a>
                        </div>

                    </div>
                    <div class="mb-5"></div>


                @endforeach

                @if($questions->isEmpty())
                    <div class="card">
                        <div class="card-header">{{ __('Keine Aufgabe') }}</div>
                        <div class="card-body">
                            <h5>Es gibt aktuelle keine Aufgabe für Sie.</h5>


                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>

@endsection
