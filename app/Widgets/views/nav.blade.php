<ul>
    <li class="active">
        <a href="/">Home</a>
    </li>
    <li class="hassubs">
        <a href="{{ route('category.index', ['activeCategory' => 'all']) }}">Categories</a>
        <ul>
            @foreach($categories as $category)
                <li><a href="{{ route('category.index', ['activeCategory' => $category->link_name]) }}">{{$category->category_name}}</a></li>
            @endforeach
        </ul>
    </li>
    <li><a href="{{ route('contact.index') }}">Contact</a></li>
    @guest
        <li>
            <a href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li>
                <a href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li>
            <a href="{{ route('home') }}">{{ __('Cabinet') }}</a>
        </li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
</ul>