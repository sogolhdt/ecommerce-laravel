<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart</title>
</head>

<body>
    <h1>Shopping Cart</h1>
    <ul>
        @forelse($userCart as $item)
            <li>
                <strong>{{ $item->product->name }}</strong><br>
                Price: ${{ $item->product->price }}<br>
                Description: {{ $item->product->description }}<br>
                <form action="{{ route('cart.remove', $item->product->id) }}" method="POST">
                    @csrf
                    <button type="submit">Remove</button>
                </form>
            </li>
        @empty
            @forelse($sessionCart as $id => $item)
                <li>
                    <strong>{{ $item['name'] }}</strong><br>
                    Price: ${{ $item['price'] }}<br>
                    Description: {{ $item['description'] }}<br>
                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        <button type="submit">Remove</button>
                    </form>
                </li>
            @empty
                <li>Your cart is empty.</li>
            @endforelse

        @endforelse
    </ul>
    <a href="{{ route('products.index') }}">Continue Shopping</a>
</body>

</html>
