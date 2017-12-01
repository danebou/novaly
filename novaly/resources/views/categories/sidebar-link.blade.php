<a href="{{ route('products', array_merge(request()->query(), ['categories' => $category->id])) }}">
    <li><span>{{ $category->name }}</span>

        @if ($category->childCategories->count())

        <ul class="child">
            @each('categories.sidebar-link', $category->childCategories, 'category')
        </ul>

        @endif

    </li>
    <span ></span>
</a>
