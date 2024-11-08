<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Create New Product</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="mx-auto" style="max-width: 600px;">
    @csrf

        <div class="mb-3">
            <label for="product_id" class="form-label">Product ID</label>
            <input type="text" class="form-control form-control-sm" id="product_id" name="product_id" required>
        </div>


        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control form-control-sm" id="name" name="name" required>
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control form-control-sm" id="description" name="description" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control form-control-sm" id="price" name="price" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control form-control-sm" id="stock" name="stock">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" class="form-control form-control-sm" id="image" name="image">
        </div>


        <button type="submit" class="btn btn-primary btn-sm">Create Product</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
