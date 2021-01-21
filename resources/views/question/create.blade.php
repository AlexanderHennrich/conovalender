@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Fragen') }}</div>

                    <div class="card-body">
                        <form action="/question" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Fragenname</label>
                                <input type="string" class="form-control" name="name" aria-describedby="emailHelp"
                                       placeholder="Fragen Name">
                                <small id="Fragenhelp" class="form-text text-muted">Name der neuen Frage
                                    eingeben.</small>
                            </div>
                            <div class="form-group">
                                <label for="text">Fragentext</label>
                                <textarea type="text" class="form-control" name="text" rows="5"
                                          placeholder="Die eigentliche Frage"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="showDate">Anzeige Datum</label>
                                <input type="date" class="form-control" name="showDate" aria-describedby="emailHelp"
                                       placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="endDate">EndDatum</label>
                                <input type="date" class="form-control" name="endDate" aria-describedby="emailHelp"
                                       placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="Punkte">Max. Punkte</label>
                                <input type="number" class="form-control" name="Punkte">
                            </div>
                            <div class="form-group">
                                <label for="media_answer">Video Antwort</label>
                                <input type="hidden" name="media_answer" value="0">
                                <input type="checkbox" class="form-control" name="media_answer" value = "1">
                            </div>
                            <div class="form-group">
                                <lable for="media">Video/IMG</lable>
                                <input type="file" name="media" id="media">

                            </div>
                            @csrf
                            <button type="submit" class="btn btn-primary">Anlege</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
