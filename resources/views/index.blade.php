<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .search-input {
            width: 250px;
            margin-bottom: 20px;
        }
        .search-container {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .search-btn {
            height: 100%;
        }
        .wrap-text {
            max-height: 30px;
            word-wrap: break-word;
            word-break: break-all;
            white-space: normal;
            max-width: 150px;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h1 class="text-center mb-4">Products</h1>


    <div class="d-flex justify-content-between align-items-center mb-3 gap-3">

        <div class="search-container d-flex align-items-center gap-2">
            <input type="text" id="searchInput" class="form-control" placeholder="Search Products" style="width: 250px;">
            <button class="btn btn-primary" onclick="searchProducts()">Search</button>
        </div>

        <a href="/products/create" class="btn btn-success">Create New Product</a>

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Sort Products
            </button>
            <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                <li><a class="dropdown-item" href="#" onclick="sortTable('name', 'asc')">Name: A to Z</a></li>
                <li><a class="dropdown-item" href="#" onclick="sortTable('name', 'desc')">Name: Z to A</a></li>
                <li><a class="dropdown-item" href="#" onclick="sortTable('price', 'asc')">Price: Low to High</a></li>
                <li><a class="dropdown-item" href="#" onclick="sortTable('price', 'desc')">Price: High to Low</a></li>
            </ul>
        </div>
    </div>


    <table class="table table-striped table-bordered" id="productsTable">
        <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Product ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Image</th>
            <th style="width: 175px">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    {{ implode(' ', array_slice(explode(' ', $product->product_id), 0, 5)) }}
                    @if(count(explode(' ', $product->product_id)) > 5)
                        ...
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>
                    {{ implode(' ', array_slice(explode(' ', $product->description), 0, 7)) }}
                    @if(count(explode(' ', $product->description)) > 7)
                        ...
                    @endif
                </td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <img src="{{ asset('storage/' . $product->image) }}" width="75px", height="100px">
                </td>
                <td>
                    <a href="/products/{{ $product->id }}" class="btn btn-info btn-sm">View</a>
                    <a href="/products/{{ $product->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <form action="/products/{{ $product->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script>

    function searchProducts() {
        let input = document.getElementById('searchInput').value.toLowerCase();
        let table = document.getElementById('productsTable');
        let rows = table.getElementsByTagName('tr');

        for (let i = 1; i < rows.length; i++) {
            let cells = rows[i].getElementsByTagName('td');
            let productName = cells[2].innerText.toLowerCase();

            if (productName.indexOf(input) > -1) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    }

    function sortTable(column, order) {
        let table = document.getElementById('productsTable');
        let rows = Array.from(table.getElementsByTagName('tr')).slice(1);

        let columnIndex = column === 'name' ? 2 : 4;

        rows.sort((rowA, rowB) => {
            let cellA = rowA.getElementsByTagName('td')[columnIndex].innerText;
            let cellB = rowB.getElementsByTagName('td')[columnIndex].innerText;

            if (column === 'price') {
                cellA = parseFloat(cellA.replace('$', ''));
                cellB = parseFloat(cellB.replace('$', ''));
            }

            if (order === 'asc') {
                return cellA > cellB ? 1 : -1;
            } else {
                return cellA < cellB ? 1 : -1;
            }
        });


        rows.forEach(row => table.appendChild(row));
    }
</script>

</body>
</html>
