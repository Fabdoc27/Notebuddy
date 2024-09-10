<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sine In | Note Buddy</title>

    {{-- bootstrap css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    {{-- bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="row justify-content-center align-content-center" style="height: 100dvh"">
                <div class="col-lg-6 center-screen card shadow mt-5 p-3">

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <p class="text-center m-0">{{ session('error') }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <h2 class="text-center">Sign In</h2>
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <div class="mb-3">
                                    <label for="email_address" class="form-label">Email</label>
                                    <input type="email" name="email" id="email_address"
                                        class="form-control
                                        @error('email')
                                        border border-danger
                                        @enderror"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <p class="text-danger fw-semibold mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 position-relative w-100">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password"
                                        class="form-control
                                        @error('password')
                                        border border-danger
                                        @enderror"
                                        id="password">
                                    <span class="position-absolute translate-middle" onclick="togglePassword()"
                                        style="top: 75%; right: 10px;" title="Show/Hide Password">
                                        <i id="password-icon" class="bi-eye-fill"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <p class="text-danger fw-semibold mt-2">{{ $message }}</p>
                                @enderror
                                <div class="form-check">
                                    <input class="form-check-input" name="remember" type="checkbox" id="checkbox">
                                    <label class="form-check-label" for="checkbox">
                                        Remember Me
                                    </label>
                                </div>

                                <div class="mb-3 mt-3 d-flex justify-content-center">
                                    <button type="submit" class="btn w-50 mx-auto btn-info">Sign In</button>
                                </div>
                                <div class="d-flex justify-content-center gap-4 align-items-center mt-3">
                                    <p class="my-1">Not have an Account</p>
                                    <a class="btn btn-warning inline-block w-50" href="{{ route('register') }}">Register
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');
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
