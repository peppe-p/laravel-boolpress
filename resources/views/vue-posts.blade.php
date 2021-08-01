@extends('layouts.structure')

@section('content')
    <main id="app">
        <div class="container">
            <h1>Vue Page Test</h1>

            <div class="cards">
                <div class="card" v-for='post in posts'>
                    <h3>@{{ post . title }}</h3>
                    <p>@{{ post . body }}</p>
                </div>
            </div>
        </div>
    </main>
@endsection
