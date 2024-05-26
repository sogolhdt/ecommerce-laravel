<h1>Create Product</h1>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    <br>
    <label for="price">Price:</label>
    <input type="number" name="price" id="price" min="0" required>
    <br>
    <button type="submit">Create</button>
</form>
