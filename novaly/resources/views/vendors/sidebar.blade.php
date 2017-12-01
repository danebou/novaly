<div id="vendors-sidebar" class="col-sm-3">

    <ul>
        @if (request('vendor') !== null)

        <a href="{{ route('products', array_except(request()->query(), 'vendor')) }}">
            <li><span>Clear Vendor</span></li>
        </a>

        @endif

        @foreach ($vendors ?? [] as $vendor)

        <a href="{{ route('products', array_merge(request()->query(), ['vendor' => $vendor->id])) }}">
            <li><span>{{ $vendor->name }}</span></li>
        </a>

        @endforeach
    </ul>

</div>
