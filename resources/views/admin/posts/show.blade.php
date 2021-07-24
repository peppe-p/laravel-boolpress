@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="post_view">
            <h1>{{ $title }}</h1>
            <h6>Post N.{{ $id }}</h6>
            <hr>
            <h5>Scritto da {{ $author }}</h5>
            <img src="{{ asset('storage/' . $img) }}" alt="" class="view_img_post">
            <p>{{ $body }}</p>
            <hr>
            <p>Note aggiuntive:
                <br>
                {{ $note }}
            </p>
            <hr>
            <a href="{{ route('posts.index') }}" class="btn btn-light" role="button" aria-pressed="true">Indietro</a>
            <a href="{{ route('posts.edit', $id) }}" class="btn btn-light" role="button" aria-pressed="true">Modifica</a>
            <a href="" class="btn btn-danger" role="button" aria-pressed="true" data-toggle="modal"
                data-target="#deleteModal">Elimina</a>
            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminazione - Post N.{{ $id }}</h5>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <strong>ID:</strong> {{ $id }}
                                <br>
                                <strong>TITOLO:</strong> {{ $title }}
                                <br>
                                <br>
                                Sei sicuro di voler eliminare questo post?
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                            <a href="{{ route('posts.destroy', $id) }}" class="btn btn-danger" role="button"
                                aria-pressed="true" data-toggle="modal" data-target="#deleteModal">Elimina</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
