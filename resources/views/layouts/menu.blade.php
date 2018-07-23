<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'CodePress') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <div class="top-left links">
                    <a href="{{ url('/home') }}">Home</a>
                    @can('access_categories')
                        <a href="{{ route('admin.categories.index') }}">Categories</a>
                    @endcan
                    @can('access_tags')
                        <a href="{{ route('admin.tags.index') }}">Tags</a>
                    @endcan  
                    @can('access_posts')
                        <a href="{{ route('admin.posts.index') }}">Posts</a>
                    @endcan    
                    @can('access_users')
                    <div class="dropdown links">
                        <a href="#">Admin</a>
                        <div class="dropdown-content links">
                            <a href="{{ route('admin.users.index') }}">Users</a>
                            <a href="{{ route('admin.comments.index') }}">Comments</a>
                            <a href="{{ route('admin.roles.index') }}">Roles</a>
                            <a href="{{ route('admin.permissions.index') }}">Permissions</a>
                            <a href="{{ route('admin.layouts.index') }}">Layouts</a>
                        </div>
                    </div>
                    @endcan 
                </div>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>