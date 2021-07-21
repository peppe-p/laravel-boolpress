@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">CONTENUTO</th>
                    <th scope="col">AUTORE</th>
                    <th scope="col">URL IMG</th>
                    <th scope="col">NOTE</th>
                    <th scope="col">AZIONI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->body }}</td>
                        <td>{{ $post->author }}</td>
                        <td><img class="img_pre" src="{{ $post->img }}" alt="Post of blog"></td>
                        <td>{{ $post->note }}</td>
                        <td>
                            <div class="btn-group-vertical">
                                <button onclick="window.location.href='{{ route('posts.show', $post->id) }}'"
                                    class="btn btn-light">Visualizza</button>
                                <button onclick="window.location.href='{{ route('posts.edit', $post->id) }}'"
                                    class="btn btn-light">Modifica</button>
                                <button onclick="window.location.href='{{ route('posts.destroy', $post->id) }}'"
                                    class="btn btn-danger">Elimina</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
