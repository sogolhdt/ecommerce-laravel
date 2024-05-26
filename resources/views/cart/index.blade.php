<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart</title>
</head>

<body>
    <h1>Shopping Cart</h1>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div>{{ session('error') }}</div>
    @endif
    <ul>
        @forelse($cart as $id => $item)
            <li>
                <strong>{{ $item['name'] }}</strong><br>
                Quantity: {{ $item['quantity'] }}<br>
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
    </ul>
    <a href="{{ route('products.index') }}">Continue Shopping</a>
</body>

</html>
