@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><span class="board_title">Control Panel</span></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h5>Benvenuto nel pannello di amministrazione.</h5>
                        <div class="btn-group-vertical">
                            <a href="{{ route('posts.index') }}" class="btn btn-primary" role="button"
                                aria-pressed="true">Archivio Post</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
