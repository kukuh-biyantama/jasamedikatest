<nav class="navbar navbar-expand-xl bg-ghost-white" style="width: 100%;">
    <div class="container-xxl justify-content-md-start">
        <a class="navbar-brand" href="#">
            <img src="./assets/jasamedika.jpg" alt="" />
        </a>
        <!-- /.navbar-brand -->

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <img src="./assets/icons/bars.svg" class="svg-inject svg-icon" alt="" />
        </button>
        <!-- /.navbar-toggler-mobile -->

        <div class="d-none d-md-flex d-xl-none ms-auto">
            <a class="btn btn-alice-blue text-dark fw-semiBold py-12 px-34 me-12 rounded-pill" href="/applicationform.html" role="button">Log In</a>
            <a class="btn btn-primary fw-semiBold py-12 px-43 rounded-pill" href="/applicationform.html" role="button">Sign Up</a>
        </div>
        <!-- /.btn-login and btn-signup mobile -->

        <div class="collapse navbar-collapse" id="navbarContent" style="margin-left: -50%;">
            <div class=" d-grid d-xl-flex align-items-xl-center pb-15 pb-xl-0 w-100 gap-20 gap-xl-0">
                <ul class="navbar-nav mx-xl-auto order-2 order-xl-1">
                    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                        <a class="nav-link" aria-current=" page" href="/">Home</a>
                    </li>
                    <li class="nav-item {{ request()->is('index_datakelurahan') ? 'active' : '' }}" s>
                        <a class="nav-link" href="{{url('index_datakelurahan')}}">Input Data kelurahan</a>
                    </li>
                    <li class="nav-item {{ request()->is('index_datapasien') ? 'active' : '' }}">
                        <a class="nav-link" href="{{url('index_datapasien')}}">Register Pasien</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>