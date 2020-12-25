<!-- Default Bootstrap Navbar -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Laravel Blog</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
        <li class="{{ Request::is('blogs') ? 'active' : ''}}"><a href="/blogs">Blogs</a></li>
        <li class="{{ Request::is('categories') ? 'active' : ''}}"><a href="{{ route('categories.index') }}">Categories</a></li>
        <li class="{{ Request::is('contact') ? 'active' : ''}}"><a href="/contact">Contact</a></li>
        <li class="{{ Request::is('about') ? 'active' : ''}}"><a href="/about">About</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">


        
        @if(Auth::user())
        <li class="{{ Request::is('dashboard') ? 'active' : ''}}"><a href="/dashboard">Dashboard</a></li>
        @endif


        @if (Auth::check())
        <li class="dropdown">
            <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello {{Auth::user()->name}} <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
            </li>
            </ul>
        </li>
        @else
        <ul class="nav navbar-nav">

        <li class="{{ Request::is('login') ? 'active' : ''}}"><a href="{{ route('login') }}">Login</a></li>
        <li class="{{ Request::is('register') ? 'active' : ''}}"><a href="{{ route('register') }}">Register</a></li>
        </ul>
        @endif

        </ul>
    </div>
    <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>