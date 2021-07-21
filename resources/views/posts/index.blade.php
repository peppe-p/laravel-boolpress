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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
