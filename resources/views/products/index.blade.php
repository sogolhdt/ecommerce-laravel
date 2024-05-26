<a href="{{ route('products.create') }}">Create Product</a>
<h1>Products List</h1>
<ul>
    @foreach ($products as $product)
        <li>{{ $product->name }} - {{ $product->product_code }} - {{ $product->stock }} - {{ $product->description }} -
            ${{ $product->price }}
        </li>
    @endforeach
</ul>
