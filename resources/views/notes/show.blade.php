@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $note->title }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $note->content }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('notes.edit', $note) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
@endsection
