<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog-Mi</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('website/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('website/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link rel="icon" href="{{ asset('website/img/laptop.png') }}" type="image/x-icon">
    <link href="{{ asset('website/css/clean-blog.min.css') }}" rel="stylesheet">

    <style>

        body {
        color: black;
        background-color: white;
        }

        .dark-theme {
        color: white;
        background-color: black;
        }

        .page-link {
            color: #00657b;
            text-align: center;
        }

        .page-item.active .page-link {
            background-color: #00657b;
            border-color: #00657b;
        }

        .category-list {
            padding: 0;
            margin: 0;
        }

        .category-list li {
            list-style: none;
        }

        .category-title {
            margin-top: 30px;
            margin-bottom: 10px;
        }

        .post-category a {
            text-decoration: none;
        }
    </style>
</head>

<body class="{{ $theme ?? '' . '-theme' }}">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Beranda</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @php($pages = getPages())
                @foreach($pages as $page)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('page/' . $page->slug) }}">{{ $page->title }}</a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.show') }}">Contact</a>
                </li>
                @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/home') }}">You</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                @if (Route::has('register'))
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li> --}}
                @endif
                @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<hr>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="https://twitter.com/Miii49611704">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/Blog-Mi-102013745049585">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://github.com/reimiii">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>

                </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Mii-F4 Website 2021</p>

            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('website/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('website/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Custom scripts for this template -->
<script src="{{ asset('website/js/clean-blog.min.js') }}"></script>
<script type="javascript">
var toggle_icon = document.getElementById('theme-toggle');
var body = document.getElementsByTagName('body')[0];
var sun_class = 'icon-sun';
var moon_class = 'icon-moon';
var dark_theme_class = 'dark-theme';

toggle_icon.addEventListener('click', function() {
    if (body.classList.contains(dark_theme_class)) {
        toggle_icon.classList.add(moon_class);
        toggle_icon.classList.remove(sun_class);

        body.classList.remove(dark_theme_class);

        setCookie('theme', 'light');
    }
    else {
        toggle_icon.classList.add(sun_class);
        toggle_icon.classList.remove(moon_class);

        body.classList.add(dark_theme_class);

        setCookie('theme', 'dark');
    }
});

function setCookie(name, value) {
    var d = new Date();
    d.setTime(d.getTime() + (365*24*60*60*1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

    </script>


</body>

</html>
