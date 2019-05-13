<nav class="main_nav">

    <ul>
        @foreach($categories as $category)
            <li><a href="{{ route('category.index', ['activeCategory' => $category->link_name]) }}">{{$category->category_name}}</a></li>
        @endforeach
    </ul>

</nav>