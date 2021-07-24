@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">TITOLO</th>
                    <th scope="col">CONTENUTO</th>
                    <th scope="col">AUTORE</th>
                    <th scope="col">IMG</th>
                    <th scope="col">NOTE</th>
                    <th scope="col">AZIONI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->body }}</td>
                        <td>{{ $post->author }}</td>
                        <td><img class="img_pre" src="{{ $post->img }}" alt="Post of blog"></td>
                        <td>{{ $post->note }}</td>
                        <td>
                            <div class="btn-group-vertical">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-light" role="button"
                                    aria-pressed="true">Visualizza</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-light" role="button"
                                    aria-pressed="true">Modifica</a>
                                <a href="" class="btn btn-danger" role="button" aria-pressed="true" data-toggle="modal"
                                    data-target="#deleteModal">Elimina</a>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                    aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Eliminazione - Post N.{{ $post->id }}</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <strong>ID:</strong> {{ $post->id }}
                                                    <br>
                                                    <strong>TITOLO:</strong> {{ $post->title }}
                                                    <br>
                                                    <br>
                                                    Sei sicuro di voler eliminare questo post?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Annulla</button>
                                                <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger"
                                                    role="button" aria-pressed="true" data-toggle="modal"
                                                    data-target="#deleteModal">Elimina</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
