@extends('layout.app')

@section('title')
    <title>NoteBuddy | Dashboard</title>
@endsection

@section('content')
    <div class="container h-100">
        <div class="row justify-content-center my-5">
            <div class="col-lg-8">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p class="text-center m-0">{{ session('success') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (auth()->check())
                    <h3 class="my-4">
                        <span class="fst-italic"> Welcome, {{ ucwords(auth()->user()->name) }}</span>
                    </h3>
                @endif

                <div class="container mt-4">
                    <div class="row">
                        {{-- Total Notes --}}
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Total Notes</h5>
                                    <h3 class="card-text">{{ auth()->user()->notes()->count() }}</h3>
                                </div>
                            </div>
                        </div>

                        {{-- All Notes Page --}}
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">All Notes</h5>
                                    <a href="{{ route('notes.index') }}" class="btn btn-primary">
                                        View Notes <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- New Notes --}}
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Create New Note</h5>
                                    <a href="{{ route('notes.create') }}" class="btn btn-success">
                                        New Note <i class="fas fa-plus ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
