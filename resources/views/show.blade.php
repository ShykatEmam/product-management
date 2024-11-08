<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-container {
            max-width: 1200px;
            margin: auto;
            padding-top: 20px;
            position: relative;
        }
        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 10;
        }
        .product-image img {
            width: 100%;
            max-width: 400px;
        }
        .price-section {
            font-size: 1.5em;
            color: #B12704;
        }
        .buy-section {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container product-container mt-5">

    <a href="/products" class="btn btn-secondary back-button">Back to Products List</a>

    <div class="row mt-5">

        <div class="col-md-5 product-image text-center">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded shadow">
        </div>


        <div class="col-md-7">
            <h2>{{ $product->name }}</h2>
            <p><strong>Product ID:</strong> {{ $product->product_id }}</p>
            <p><strong>Description:</strong> {{ $product->description }}</p>


            <div class="price-section">
                <strong>Price:</strong> ${{ number_format($product->price, 2) }}
            </div>

            <p class="text-muted"><strong>Stock:</strong> {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}</p>


            <div class="buy-section d-flex gap-3">
                <a href="#" class="btn btn-warning btn-lg flex-fill">Add to Cart</a>
                <a href="#" class="btn btn-danger btn-lg flex-fill">Buy Now</a>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
