<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
</head>

<body>
    <a href="{{ route('products.create') }}">Create Product</a>
    <h1>Products</h1>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div>{{ session('error') }}</div>
    @endif
    <ul>
        {{-- <?php $cart = session()->get('cart', []);
        unset($cart); ?> --}}

        @foreach ($products as $product)
            <li>
                <strong>{{ $product->name }}</strong><br>
                Price: ${{ $product->price }}<br>
                Description: {{ $product->description }}<br>
                Stock: {{ $product->stock }}<br>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit">Add to Cart</button>
                </form>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('cart.index') }}">View Cart</a>
</body>

</html>
