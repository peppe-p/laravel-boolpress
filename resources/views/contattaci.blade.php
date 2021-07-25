@extends('layouts.structure')

@section('content')
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.6/assets/brand/bootstrap-solid.svg"
                alt="" width="72" height="72">
            <h2>Contattaci</h2>
            <p class="lead">Compila il form qui sotto per contattarci per qualsiasi informazione.</p>
        </div>
        {{-- FORM DI CONTATTO --}}
        <form action="{{ route('contacts.send') }}" method="post">

            @include('partials.error')
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('message') }}</strong>
                </div>
            @endif

            @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Inserisci qui il tuo nome"
                    aria-describedby="nameHelp">
                <small id="nameHelp" class="text-muted">Inserisci il tuo nome completo</small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="inserisci@latuaemail.com"
                    aria-describedby="emailHelp">
                <small id="emailHelp" class="text-muted">Inserisci la tua email</small>
            </div>
            <div class="form-group">
                <label for="body">Messaggio</label>
                <textarea class="form-control" name="body" id="body" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-envelope-open fa-lg fa-fw"></i> Invia</button>
        </form>
    </div>
@endsection
