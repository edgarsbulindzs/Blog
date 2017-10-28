<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ route('home') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{route('home')}}">Home</a></li>
                &nbsp;<li><a href="{{route('blog')}}">Blog</a></li>
                <li><a href="{{route('gallery')}}">Gallery</a></li>
               <li><a href="{{route('production')}}">Production</a></li>
                <li><a href="{{route('aboutus')}}">Aboutus</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->

                <li><a href="{{route('login')}}">Login</a></li>
                <li><a href="{{route('registration')}}">Register</a></li>
            </ul>
        </div>
    </div>
</nav>