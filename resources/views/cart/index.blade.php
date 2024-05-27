<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart</title>
</head>

<body>
    <h1>Shopping Cart</h1>
    <ul>
        @forelse($cart as $id => $item)
            <li>
                <strong>{{ $item->product->name }}</strong><br>
                Price: ${{ $item->product->price }}<br>
                Description: {{ $item->product->description }}<br>
                <form action="{{ route('cart.remove', $item->pid) }}" method="POST">
                    @csrf
                    <button type="submit">Remove</button>
                </form>
            </li>
        @empty
            <li>Your cart is empty.</li>
        @endforelse
    </ul>


    <ul>
        @forelse($userCart as $item)
            <li>{{ $item->product->name }} - {{ $item->quantity }} - ${{ $item->product->price }}</li>
        @empty
            @forelse($sessionCart as $id => $item)
                <li>{{ $item['name'] }} - {{ $item['quantity'] }} - ${{ $item['price'] }}</li>
            @empty
                <li>Your cart is empty.</li>
            @endforelse
        @endforelse
    </ul>
    <a href="{{ route('products.index') }}">Continue Shopping</a>
</body>

</html>
