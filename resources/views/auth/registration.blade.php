<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration | Note Buddy</title>

    {{-- bootstrap css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    {{-- bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="row justify-content-center align-content-center" style="height: 100dvh">
                <div class="col-lg-6 center-screen card shadow mt-5 p-5">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <h2 class="text-center">Registration</h2>

                        {{-- name --}}
                        <div class="mb-3">
                            <label for="user_name" class="form-label">Name</label>
                            <input type="text" name="name"
                                class="form-control
                                        @error('name')
                                        border border-danger
                                        @enderror"
                                id="user_name" value="{{ old('name') }}">
                            @error('name')
                                <p class="text-danger fw-semibold mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- email --}}
                        <div class="mb-3">
                            <label for="email_address" class="form-label">Email</label>
                            <input type="email" name="email"
                                class="form-control
                                        @error('email')
                                        border border-danger
                                        @enderror"
                                id="email_address" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-danger fw-semibold mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- password --}}
                        <div class="mb-3 position-relative w-100">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password"
                                class="form-control
                                        @error('password')
                                        border border-danger
                                        @enderror"
                                id="password">
                            <span class="position-absolute translate-middle" style="top: 75%; right: 10px;"
                                onclick="togglePassword('password', 'password-icon')" title="Show/Hide Password">
                                <i id="password-icon" class="bi-eye-fill"></i>
                            </span>
                        </div>
                        @error('password')
                            <p class="text-danger fw-semibold mt-2">{{ $message }}</p>
                        @enderror

                        {{-- confirm password --}}
                        <div class="mb-3 position-relative w-100">
                            <label for="confirm_password" class="form-label">Confirm
                                Password</label>
                            <input type="password" name="password_confirmation"
                                class="form-control
                                    @error('password_confirmation')
                                    border border-danger
                                    @enderror"
                                id="confirm_password">
                            <span class="position-absolute translate-middle" style="top: 75%; right: 10px;"
                                onclick="togglePassword('confirm_password', 'confirm-password-icon')"
                                title="Show/Hide Password">
                                <i id="confirm-password-icon" class="bi-eye-fill"></i>
                            </span>
                        </div>
                        @error('password_confirmation')
                            <p class="text-danger fw-semibold mt-2">{{ $message }}</p>
                        @enderror

                        <div class="mt-4 d-flex justify-content-center">
                            <button type="submit" class="btn w-50 btn-info">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

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
</body>

</html>
