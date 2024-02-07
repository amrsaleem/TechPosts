<header class="header">
    <h1 class="header__title"><a href="/posts">TechPosts</a></h1>

    <nav class="header__nav">
        <ul class="header__menu">
            <li class="header__menu-item"><a href="/posts" class="header__menu-link">Home</a></li>
            <li class="header__menu-item"><a href="/posts" class="header__menu-link">Posts</a></li>
            <li class="header__menu-item"><a href="/about" class="header__menu-link">About</a></li>
            <li class="header__menu-item"><a href="/posts/create" class="header__menu-link">Write</a></li>
        </ul>
    </nav>

    <div class="header__auth">
        @guest
            <a href="{{ route('login') }}" class="header__auth-link">Login</a>
            <a href="{{ route('register') }}" class="header__auth-link">Register</a>
        @else
            <div class="header__user-dropdown">
                <button class="header__user-button">{{ Auth::user()->name }}</button>
                <div class="header__user-dropdown-content">
                    <a href="#" class="header__user-dropdown-link">Profile</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="header__user-dropdown-link">Sign out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        @endguest
    </div>
</header>
