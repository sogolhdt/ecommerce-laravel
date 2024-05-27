<!DOCTYPE html>
<html>

<head>
    <title>New Product Created</title>
</head>

<body>
    <h1>New Product Created</h1>
    <p>A new product has been created with the following details:</p>
    <ul>
        <li>Name: {{ $product->name }}</li>
        <li>Price: ${{ $product->price }}</li>
        <li>Description: {{ $product->description }}</li>
        <li>Stock: {{ $product->stock }}</li>
    </ul>
</body>

</html>
