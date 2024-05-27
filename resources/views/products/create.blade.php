<!DOCTYPE html>
<html>

<head>
    <title>Create New Product</title>
</head>

<body>
    <h1>Create Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>
        <br>

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" value="{{ old('price') }}" min="0" required>
        @error('price')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>
        <br>

        <label for="product_code">Product Code:</label>
        <input type="text" name="product_code" id="product_code" value="{{ old('product_code') }}">
        @error('product_code')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>
        <br>

        <label for="description">Description:</label>
        <textarea name="description" id="description">{{ old('description') }}</textarea>
        @error('description')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>
        <br>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" value="{{ old('stock') }}" min="0" required>
        @error('stock')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>
        <br>

        <button type="submit">Create</button>
    </form>

</body>

</html>
