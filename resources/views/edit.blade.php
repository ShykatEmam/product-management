<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="mx-auto" style="max-width: 600px;">
    @csrf
    @method('PUT')

        <div class="mb-3">
            <label for="product_id" class="form-label">Product ID</label>
            <input type="text" class="form-control form-control-sm" id="product_id" name="product_id" value="{{ $product->product_id }}" readonly>
        </div>


        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{ $product->name }}" required>
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control form-control-sm" id="description" name="description" rows="3">{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control form-control-sm" id="price" name="price" value="{{ $product->price }}" required>
        </div>


        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control form-control-sm" id="stock" name="stock" value="{{ $product->stock }}">
        </div>


        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" class="form-control form-control-sm" id="image" name="image">
        </div>


        <button type="submit" class="btn btn-primary btn-sm">Update Product</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
