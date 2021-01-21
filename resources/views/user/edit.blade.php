@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Fragen') }}</div>

                    <div class="card-body">
                        <form action="/user/{{$user->id}}" method="post">
                            @method('PATCH')
                            <div class="form-group">
                                <h1>{{$user->name}}</h1>
                            </div>
                            <div class="form-group">

                                <label for="admin">User als Admin setzen</label>
                                    <input type="hidden" name="admin" value="0" >

                                    @if($user->admin)
                                        <input type="checkbox"  name="admin" value= "1" checked><br><br>
                                    @else
                                        <input type="checkbox"  name="admin" value= "1" ><br><br>
                                    @endif

                                <label for="active">User activ setzen</label>
                                <input type="hidden" name="active" value="0" >

                                @if($user->admin)
                                    <input type="checkbox"  name="active" value= "1" checked><br><br>
                                @else
                                    <input type="checkbox"  name="active" value= "1" ><br><br>
                                @endif

                            </div>


                            </div>
                            @csrf
                            <button type="submit" class="btn btn-dark">Speichern</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
