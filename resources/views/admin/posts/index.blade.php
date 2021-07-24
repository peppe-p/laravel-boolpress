@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="actions_bar">
            <a href="{{ route('posts.create') }}" class="btn btn-primary" role="button" aria-pressed="true">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Nuovo Post</a>
        </div>
        {{-- ##### TABELLA ADMIN CON TUTTI I POST ##### --}}
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
                        <td><img class="img_pre" src="{{ asset('storage/' . $post->img) }}" alt="Post of blog"></td>
                        <td>{{ $post->note }}</td>
                        <td>
                            <div class="btn-group-vertical">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-light" role="button"
                                    aria-pressed="true">Visualizza</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-light" role="button"
                                    aria-pressed="true">Modifica</a>
                                <a role="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteModalID{{ $post->id }}">Elimina</a>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteModalID{{ $post->id }}" tabindex="-1" role="dialog"
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
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                                </form>
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
