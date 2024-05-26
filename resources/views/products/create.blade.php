<h1>Create Product</h1>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    <br>
    <label for="price">Price:</label>
    <input type="number" name="price" id="price" step="0.01" min="0" required>
    <br>

    <label for="product_code">product_code:</label>
    <input type="text" name="product_code" id="product_code" required>
    <br>

    <label for="description ">description :</label>
    <input type="text" name="description" id="description">
    <br>

    <label for="stock ">stock:</label>
    <input type="number" name="stock" id="stock" min="0" required>
    <br>
    <button type="submit">Create</button>
</form>
