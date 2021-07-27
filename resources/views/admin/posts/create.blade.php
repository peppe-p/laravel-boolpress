@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="actions_bar">
            <a href="{{ route('posts.index') }}" class="btn btn-primary" role="button" aria-pressed="true"><i
                    class="fa fa-chevron-left" aria-hidden="true"></i> Indietro</a>
        </div>
        @include('partials.error')
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Inserisci il titolo"
                    aria-describedby="titleHelp" maxlength="255" required value="{{ old('title') }}">
                <small id="titleHelp" class="text-muted">Lunghezza massima: 255 caratteri</small>
            </div>

            <div class="form-group">
                <label for="body">Contenuto</label>
                <textarea class="form-control" name="body" id="body" rows="5" maxlength="500"
                    required>{{ old('title') }}</textarea>
                <small id="titleHelp" class="text-muted">Lunghezza massima: 500 caratteri</small>
            </div>

            <div class="form-group">
                <label for="img">Immagine di copertina</label>
                <input type="file" class="form-control-file" name="img" id="img" placeholder="Carica la copertina del post"
                    aria-describedby="CoverHelp" value="null">
                <small id="CoverHelp" class="form-text text-muted">Max. 1 MB</small>
            </div>

            <div class="form-group">
                <label for="note">Note</label>
                <textarea class="form-control" name="note" id="note" rows="2" placeholder="Inserisci note aggiuntive"
                    maxlength="255">{{ old('title') }}</textarea>
                <small id="NoteHelp" class="form-text text-muted">Lunghezza massima: 255 caratteri</small>
            </div>

            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option> - Seleziona una categoria - </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="author">Autore</label>
                <input type="text" class="form-control" name="author" id="author" aria-describedby="AuthorHelp"
                    maxlength="255" required value="{{ Auth::user()->name }}{{ old('title') }}">
                <small id="AuthorHelp" class="form-text text-muted">Inserisci la firma del post</small>
            </div>

            <button type="submit" class="btn btn-block btn-primary">Crea</button>

        </form>
    </div>
@endsection
