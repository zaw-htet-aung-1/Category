<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('post.index') }}">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if( request()->path() == 'posts') active @endif" href="{{ route('post.index') }}">Home</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link @if( request()->path() == 'posts/create') active @endif" href="/posts/create">Create a Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if( request()->path() == 'categories/create') active @endif" href="{{ route('category.create') }}">Create a category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if( request()->path() == 'my-posts') active @endif" href="/my-posts">My Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.create') }}">New Category</a>
                </li>
                @endauth
                @if(Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link fw-bold dropdown-toggle @if(request()->url() == route('profile')) active @endif" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if( auth()->user()->profile_image )
                        <img src="{{ Storage::url(auth()->user()->profile_image->path)}}" class="img-fluid rounded-circle ms-1" style="width:32px; height:32px; object-fit:cover;" alt="Profile Avater">
                    @else
                        <img src="/storage/images/profile_avater_small.png" class="img-fluid rounded-circle ms-1" style="width:32px; height:32px; object-fit:cover;" alt="Profile Avater">
                    @endif
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link @if(request()->url() == route('register.create')) active @endif" href="{{route('register.create')}}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->url() == route('login.create')) active @endif" href="{{route('login.create')}}">Login</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>