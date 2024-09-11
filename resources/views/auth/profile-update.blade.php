@extends('layout.app')

@section('title', 'Update Profile')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center align-content-center" style="height: 75dvh">
            <div class="col-lg-10 card shadow mt-5 p-5">

                <form action="{{ route('profiles.update', auth()->user()) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h2 class="text-center">Update Profile</h2>

                    <div class="row">
                        <div class="col-lg-6">
                            {{-- name --}}
                            <div class="mb-3">
                                <label for="email_address" class="form-label">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control
                                            @error('name')
                                            border border-danger
                                            @enderror"
                                    value="{{ old('name', auth()->user()->name) }}">
                                @error('name')
                                    <p class="text-danger fw-semibold mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- email --}}
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" value="{{ old('email', auth()->user()->email) }}"
                                    readonly disabled>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            {{-- current password --}}
                            <div class="mb-3 position-relative w-100">
                                <label for="password" class="form-label">Current Password</label>
                                <input type="password" name="current_password"
                                    class="form-control
                                            @error('current_password')
                                            border border-danger
                                            @enderror"
                                    id="current_password">
                                <span class="position-absolute translate-middle"
                                    onclick="togglePassword('current_password', 'current-password-icon')"
                                    style="top: 75%; right: 10px;" title="Show/Hide Password">
                                    <i id="current-password-icon" class="bi-eye-fill"></i>
                                </span>
                            </div>
                            @error('current_password')
                                <p class="text-danger fw-semibold mt-2">{{ $message }}</p>
                            @enderror

                            {{-- new password --}}
                            <div class="mb-3 position-relative w-100">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" name="password"
                                    class="form-control
                                            @error('password')
                                            border border-danger
                                            @enderror"
                                    id="password">
                                <span class="position-absolute translate-middle"
                                    onclick="togglePassword('password', 'password-icon')" style="top: 75%; right: 10px;"
                                    title="Show/Hide Password">
                                    <i id="password-icon" class="bi-eye-fill"></i>
                                </span>
                            </div>
                            @error('password')
                                <p class="text-danger fw-semibold mt-2">{{ $message }}</p>
                            @enderror

                            {{-- confirm new password --}}
                            <div class="mb-3 position-relative w-100">
                                <label for="password" class="form-label">Confirm New Password</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control
                                            @error('password_confirmation')
                                            border border-danger
                                            @enderror"
                                    id="confirm_password">
                                <span class="position-absolute translate-middle"
                                    onclick="togglePassword('confirm_password', 'confirm-password-icon')"
                                    style="top: 75%; right: 10px;" title="Show/Hide Password">
                                    <i id="confirm-password-icon" class="bi-eye-fill"></i>
                                </span>
                            </div>
                            @error('password_confirmation')
                                <p class="text-danger fw-semibold mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 mt-3">
                        <button type="submit" class="btn w-25 mx-auto btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script>
            function togglePassword(inputId, iconId) {
                const passwordInput = document.getElementById(inputId);
                const passwordIcon = document.getElementById(iconId);
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    passwordIcon.classList.remove('bi-eye-fill');
                    passwordIcon.classList.add('bi-eye-slash-fill');
                } else {
                    passwordInput.type = 'password';
                    passwordIcon.classList.remove('bi-eye-slash-fill');
                    passwordIcon.classList.add('bi-eye-fill');
                }
            }
        </script>
    @endpush
