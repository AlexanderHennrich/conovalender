@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">{{ __('Details') }}</div>

                    <div class="card-body">

                        <h1>{{$user->name}}</h1>
                        <p>{{$user->email}}
                            @if($user->admin)
                                <br> Dieser User ist eine Admin
                            @endif</p>

                        <p>Punkte: {{$user->points}}</p>

                        <h2>Alle Fragen</h2>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Fragen Name</th>
                                <th scope="col">Antwort</th>
                                <th scope="col">Max Punkte</th>
                                <th scope="col">Erreichte Punktzahl</th>
                                @if(auth()->check() && auth()->user()->isAdmin())
                                    <th scope="col">Punkte einstellen</th>
                                @endif
                            </tr>
                            </thead>
                            @foreach($user->answers()->get() as $answer)
                                <tr>
                                    <td>{{$answer->question_name}}</td>
                                    <td>{{$answer->answer}}
                                    @if($answer->media_url)
                                            <a href="{{asset(Storage::url($answer->media_url))}}">Video-Antwort</a>
                                    @endif
                                    </td>
                                    <td>{{$answer->question()->first()->Punkte}}</td>
                                    <td>{{$answer->Punkte}}</td>
                                    @if(auth()->check() && auth()->user()->isAdmin())
                                        <td>
                                            <form action="/answer/{{$answer->id}}" method="post">
                                                @method('PATCH')
                                                <input type="number" name='Punkte' size="2"
                                                       max="{{$answer->question()->first()->Punkte}}"
                                                       min="0"
                                                       value={{$answer->question()->first()->Punkte}} >
                                                <button type="submit" class="btn btn-dark">OK</button>
                                                @csrf
                                            </form>
                                        </td>
                                    @endif

                                </tr>

                            @endforeach


                        </table>
                        <div class="row">
                            <a href="/user" class="btn btn-dark">Zurück</a><br>
                            @if(auth()->check() && auth()->user()->isAdmin())
                                <a href="/user/{{$user->id}}/edit" class="btn btn-dark">User Bearbeiten</a><br>
                                <form action="/user/{{$user->id}}" method="post">
                                    @method('DELETE')
                                    <button class="btn btn-dark">User Löschen</button>
                                    @csrf
                                </form>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
