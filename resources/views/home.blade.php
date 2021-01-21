@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('Home') }}</div>

                    <div class="card-body" align="center">

                        <a href="/aktuell" class="btn btn-dark">Aktuelle Frage</a>
                        <a href="/user" class="btn btn-dark">Punkte Übersicht</a>

                    </div>
                </div>
                <div class="mb-4"></div>
                <!--- Comments -->
                <div class="card" style="height: 20rem">
                    <div class="card-header">{{ __('Kommentare') }}</div>
                    <div class="card-body overflow-auto">
                        <div class="container ">

                            @foreach($comments as $comment)

                                @if($comment->user()->first()->id == auth()->user()->id )
                                    <p style=" background-color: #95c5ed">{{$comment->user()->first()->name}}: {{$comment->comment}}</p>

                                @else
                                    <p style=" background-color: #a0aec0">{{$comment->user()->first()->name}}
                                        : {{$comment->comment}}</p>
                                @endif
                            @endforeach


                            <div class="mb-4"></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="/comments" method="post">
                            <input size=30 type="text" name="comment">
                            <button type="submit" class="btn-dark">send</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>

        </div>
            <div class="mb-4"></div>
            <div class="text-center">--- Bisher abgegebene Antworten ----</div>
            <div class="mb-4"></div>

            @foreach($answers as $answer)
                <div class="card">
                    <div class="card-header">{{ __($answer->user_name) }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h6><b>{{$answer->question_name}}</b></h6>
                                <br>
                                @if($answer->media_url)
                                    <video width="100%" src="{{asset(Storage::url($answer->media_url))}}"
                                           class="video-fluid z-depth-1"
                                           controls></video>
                                @else
                                    <p>Antwort: {{$answer->answer}}</p>
                                @endif
                            </div>
                            <div class="col text-center text-dark my-auto">

                                <b style="font-size: 24px">{{$answer->Punkte}} Pkt.</b>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4"></div>
            @endforeach

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


        </div>
    </div>
    </div>
@endsection
