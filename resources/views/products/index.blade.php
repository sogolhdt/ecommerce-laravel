<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
</head>

<body>
    <a href="{{ route('products.create.view') }}">Create New Product</a>
    <br>



    <h1>Products</h1>
    @if (session('success'))
        <div style="color: green">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div style="color: red">{{ session('error') }}</div>
    @endif
    <a href="{{ route('cart.index') }}" style="color: brown; font-weight: bold;">View Cart -
        {{ $cartCount }} items</a>
    <ul>


        @foreach ($products as $product)
            <li>
                <strong>{{ $product->name }}</strong><br>
                Price: ${{ $product->price }}<br>
                Description: {{ $product->description }}<br>
                Stock: {{ $product->stock }}<br>
                @if ($product->stock != 0)
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit">Add to Cart</button>
                    </form>
                @else
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" disabled>Add to Cart</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>

</body>

</html>
