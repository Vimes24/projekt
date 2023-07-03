<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="#">Portal pracy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('seeker.profile')}}">Profil</a>
                    </li>
                    @endif
                    @if(!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Logowanie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('create.seeker')}}">Pracownik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('create.employer')}}">Pracodawca</a>
                    </li>
                    @endif
                    @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" id="logout" href="#">Wyloguj się</a>
                    </li>
                    @endif
                    <form id="form-logout" action="{{route('logout')}}" method="post">@csrf</form>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

    <script>
        let logout = document.getElementById('logout');
        let form = document.getElementById('form-logout');
        logout.addEventListener('click', function() {
            form.submit();
        })
    </script>

  </body>
</html>