@extends('layout.app')

@section('title')
    <title>Note Buddy | Edit Note</title>
@endsection

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Note</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('notes.update', $note) }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="mb-2" for="title">Title</label>
                                <input id="title" type="text" class="form-control" name="title"
                                    value="{{ $note->title }}">
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2" for="content">Content</label>
                                <textarea id="content" class="form-control" name="content" rows="6">{{ $note->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Note</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
