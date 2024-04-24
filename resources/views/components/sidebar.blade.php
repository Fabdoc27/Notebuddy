<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column text-dark">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-chart-line me-1"></i>
                    Dashboard
                </a>
                <a class="nav-link" aria-current="page" href="{{ route('notes.index') }}">
                    <i class="fa-regular fa-note-sticky me-1"></i>
                    All Notes
                </a>
                <a class="nav-link" aria-current="page" href="{{ route('notes.create') }}">
                    <i class="fa-regular fa-pen-to-square me-1"></i>
                    Create Note
                </a>
            </li>
        </ul>
    </div>
</nav>
