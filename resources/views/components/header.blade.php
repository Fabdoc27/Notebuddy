<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap py-2 shadow" style="height: 10dvh">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{ route('dashboard') }}">Note Buddy</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-nav">
        <div class="nav-item text-nowrap d-flex justify-content-center align-items-center gap-2 px-3">
            @auth
                <a class="nav-link fst-italic fw-medium text-white-50"
                    href="{{ route('users.edit', auth()->user()) }}">{{ ucwords(auth()->user()->name) }}
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn fw-medium fst-italic text-white-50">Sign out</button>
                </form>
            @endauth
        </div>
    </div>
</header>
