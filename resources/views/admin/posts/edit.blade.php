@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="actions_bar">
            <a href="{{ route('posts.index') }}" class="btn btn-primary" role="button" aria-pressed="true"><i
                    class="fa fa-chevron-left" aria-hidden="true"></i> Indietro</a>
        </div>
        <form action="{{ route('posts.update', $id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('error')

            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Inserisci il titolo"
                    aria-describedby="titleHelp" maxlength="255" required value="{{ $title }}">
                <small id="titleHelp" class="text-muted">Lunghezza massima: 255 caratteri</small>
            </div>

            <div class="form-group">
                <label for="body">Contenuto</label>
                <textarea class="form-control" name="body" id="body" rows="5" maxlength="500"
                    required>{{ $body }}</textarea>
                <small id="titleHelp" class="text-muted">Lunghezza massima: 500 caratteri</small>
            </div>

            <div class="form-group">
                <label for="img">Immagine di copertina attuale</label>
                <img src="{{ asset('storage/' . $img) }}" alt="Cover del post {{ $title }}">
                <input type="file" class="form-control-file" name="img" id="img" placeholder="Carica la copertina del post"
                    aria-describedby="CoverHelp">
                <small id="CoverHelp" class="form-text text-muted">Max. 1 MB</small>
            </div>

            <div class="form-group">
                <label for="note">Note</label>
                <textarea class="form-control" name="note" id="note" rows="2" placeholder="Inserisci note aggiuntive"
                    maxlength="255">{{ $note }}</textarea>
                <small id="NoteHelp" class="form-text text-muted">Lunghezza massima: 255 caratteri</small>
            </div>

            <div class="form-group">
                <label for="author">Autore</label>
                <input type="text" class="form-control" name="author" id="author" aria-describedby="AuthorHelp"
                    maxlength="255" required value="{{ $author }}">
                <small id="AuthorHelp" class="form-text text-muted">Inserisci la firma del post</small>
            </div>

            <button type="submit" class="btn btn-block btn-primary">Conferma modifiche</button>

        </form>
    </div>
@endsection
