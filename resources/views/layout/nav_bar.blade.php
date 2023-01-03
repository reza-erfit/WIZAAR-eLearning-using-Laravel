<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><img class="mb-3" src="img/wizaar-2.png" alt="" width="50" height="75"></i>WIZAAR</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            

            <a href="index" class="nav-item nav-link {{ Request::is('index') ? 'active':''}}">Home</a>
            <a href="about" class="nav-item nav-link {{ Request::is('about') ? 'active':''}}">About</a>
            <a href="courses" class="nav-item nav-link {{ Request::is('courses') ? 'active':''}}">Courses</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu fade-down m-0">
                    <a href="team" class="dropdown-item">Our Team</a>
                    <a href="testimonial" class="dropdown-item">Testimonial</a>
                    <a href="404" class="dropdown-item">404 Page</a>
                </div>
            </div>
            <a href="contact" class="nav-item nav-link {{ Request::is('contact') ? 'active':''}}">Contact</a>
        </div>
        @auth
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle btn btn-primary py-4 px-lg-5 d-none d-lg-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome Back, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/dashboard/pelajarans"></i>     My Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>   Logout</button>
                </form>
                </li>
            </ul>
          </li>
        @else
        <a href="login" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block active">Join Now / Login<i class="fa fa-arrow-right ms-3"></i></a>
        @endauth
    </div>
</nav>