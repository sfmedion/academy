<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand me-2" href="#">
            <i class="fas fa-code"></i>
        </a>

        <!-- Toggle button -->
        <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarButtonsExample"
            aria-controls="navbarButtonsExample"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarButtonsExample">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        @auth('admin')
                            {{ __('app.users') }}
                        @endauth

                        @auth('employee')
                            {{ __('app.requests') }}
                        @endauth
                    </a>
                </li>
            </ul>
            <!-- Left links -->

            <div class="d-flex align-items-center">
                <a href="{{ route('logout') }}">
                    <button type="button" class="btn btn-link px-3 me-2">
                        {{ __('app.logout') }}
                    </button>
                </a>
            </div>
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
