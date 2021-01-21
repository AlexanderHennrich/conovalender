@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Punktestand') }}</div>

                    <div class="card-body">


                        <table class="table table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Punkte</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                @if($user->active || auth()->check() && auth()->user()->isAdmin() )

                                    @if(auth()->check() && auth()->user()->isAdmin() || $user->id == auth()->user()->id )
                                        <th><a href="/user/{{$user->id}}">{{$user->name}}</a></th>
                                    @else
                                        <tr>
                                            <td scope="row">{{$user->name}}</td>
                                            @endif
                                            <td scope="row">{{$user->Punkte}}</td>

                                        </tr>
                                    @endif
                                    @endforeach

                            </tbody>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        </table>

                        <a href="/" class="btn btn-dark">Zurück</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
