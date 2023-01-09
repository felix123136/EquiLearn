<nav class="navbar navbar-expand-lg navbar-light bg-light ps-5 pe-4 sticky-top">
  <a class="navbar-brand" href="/">Baktify</a>
  <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
  >
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/about-us">About Us</a>
          </li>
          <li class="nav-item">
            @if(auth()->check() && auth()->user()->isAdmin)
              <a class="nav-link" href="/products">Manage Products</a>
            @else
              <a class="nav-link" href="/products">Products</a>
            @endif
          </li>    
          <li class="nav-item">
            @if(auth()->check() && auth()->user()->isAdmin)
              <a class="nav-link" href="/categories/new">Add Category</a>
            @elseif(auth()->check())
              <a class="nav-link" href="/transactions">My Transactions</a>
            @endif
          </li>
      </ul>
      <ul class="navbar-nav">
          @auth
            @if(!auth()->user()->isAdmin)
              <li class="nav-item active me-3">
                <a class="nav-link" href="/cart">Cart</a>
              </li>
            @endif
            <div class="d-flex flex-column">
              <small class="text-muted">{{auth()->user()->isAdmin ? 'admin' : 'member'}}</small>
              <small><a class="text-decoration-none text-muted justify-content-center" href="/users/{{auth()->user()->id}}">View profile</a></small>
            </div>
          @else
            <li class="nav-item mx-1">
                <a class="btn btn-light" href="/login">Sign In</a>
            </li>
            <li class="nav-item mx-1">
                <a class="btn btn-primary" href="/register">Sign Up</a>
            </li>
          @endauth
      </ul>
  </div>
</nav>
