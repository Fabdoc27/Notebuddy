@extends('layout.app')

@section('title', $note->title)

@section('content')
    <div class="container" style="height: 75dvh">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8">
                <div class="card p-3">
                    <div class="card-header">
                        <h5 class="card-title">{{ $note->title }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="time text-muted mb-2">Last Updated:
                            {{ $note->updated_at->format('d M Y, h:i A') }}
                        </p>
                        <p class="card-text">{{ $note->content }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('notes.edit', $note) }}" class="btn btn-primary">Edit Note</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
