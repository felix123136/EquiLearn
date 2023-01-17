<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Equilibrium</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href={{asset('assets/home.css')}} />
  </head>
  <body class="d-flex text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container-fluid">
          <h3>EquiLearn</h3>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="/">Home</a>
                @if(auth()->check() && auth()->user()->isAdmin)
                  <a class="nav-link" href="/courses">Manage Courses</a>
                @else
                  <a class="nav-link" href="/courses">Courses</a>
                @endif  
                @auth
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="nav-link">Sign Out</button>
                    </form>
                @else
                    <a class="nav-link" href="/login">Sign In</a>
                    <a class="nav-link" href="/register">Sign Up</a>
                @endauth
            </div>
          </div>
        </div>
      </nav>
      <header class="mb-auto"></header>
      <main class="px-3">
        <h1>EquiLearn</h1>
        <p class="lead">
            Welcome to EquiLearn, the premier online course platform where education meets balance and stability. At EquiLearn, we believe that true success in learning comes from achieving equilibrium – a balance between knowledge and skills, between hard work and rest, and between challenge and support.
        </p>
        <p class="small">Welcome to EquiLearn!</p>
        <a
          href="/courses"
          class="btn btn-lg btn-secondary fw-semibold text-white bg-white home-btn"
          >View Courses</a
        >
      </main>
      <footer class="mt-auto text-white-50">
        <p>©Copyright 2023, All Rights Reserved</p>
      </footer>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
      integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
      integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
