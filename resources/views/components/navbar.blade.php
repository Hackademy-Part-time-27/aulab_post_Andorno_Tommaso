<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('homepage') }}">Aulab Post</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link activate" aria-current="page" href="{{route('article.index')}}">Tutti gli articoli</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('careers')}}">Lavora con noi</a>
          </li>
          @auth
          @if (Auth::user()->is_admin)
              <li><a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard Admin</a></li>
          </li>
          @endif
          @if (Auth::user()->is_revisor)
              <li><a class="dropdown-item" href="{{route('revisor.dashboard')}}">Dashboard del revisore</a></li>
          </li>
          @endif
          <li class="nav-item">
              <a class="nav-link" href="{{route('article.create')}}">Inserisci un articolo</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Benvenuto {{ Auth::user()->name}}
            </a>
            <ul class="dropdown-menu">
              <li class="nav-item">
                <form action="{{ route('logout') }}" id="logout-form" method="POST">
                  @csrf
                  <button type="submit" class="btn nav-link">Logout</button>
                </form>
              </li>
            </ul>
            
          @endauth 
          @guest
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Benvenuto Ospite
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
              <li><a class="dropdown-item" href="{{ route('login') }}">Accedi</a></li>
            </ul>
          </li>
          @endguest       
        </ul>
      </div>
    </div>
  </nav>