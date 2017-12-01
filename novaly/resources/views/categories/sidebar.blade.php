<div id="categories-sidebar" class="col-sm-3">

    <ul>
        @if (request('categories') !== null)

        <a href="{{ route('products', array_except(request()->query(), 'categories')) }}">
            <li class="clear-filter"><span>Clear Categories</span></li>
        </a>

        @endif

        @each('categories.sidebar-link', $categories, 'category')
    </ul>

</div>
