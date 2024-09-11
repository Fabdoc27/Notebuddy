@extends('layout.app')

@section('title', 'Add Note')

@section('content')
    <div class="container" style="height: 75dvh">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8">
                <div class="card p-3">
                    <div class="card-header">
                        <h5>Create New Note</h5>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('notes.store') }}">
                            @csrf

                            {{-- Title --}}
                            <div class="form-group mb-3">
                                <label class="mb-2" for="title">Title</label>
                                <input id="title" type="text" class="form-control" name="title">
                            </div>

                            {{-- Content --}}
                            <div class="form-group mb-3">
                                <label class="mb-2" for="content">Content</label>
                                <textarea id="content" class="form-control" name="content" rows="6"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create Note</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
