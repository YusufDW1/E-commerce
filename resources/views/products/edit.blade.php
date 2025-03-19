<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 600px;
            margin: 2rem auto;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html">Kembali ke Dashboard</a>
        </div>
    </nav>

    <div class="container">
        <div class="form-container">
            <h2 class="my-4">Edit Produk</h2>
            <form id="editForm">
                <input type="hidden" id="productId">
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="productName" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" class="form-control" id="productPrice" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="productDescription" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">URL Gambar</label>
                    <input type="url" class="form-control" id="productImage" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>

    <script>

        const urlParams = new URLSearchParams(window.location.search);
        const productId = urlParams.get('id');
        
        const products = JSON.parse(localStorage.getItem('products')) || [];
        const product = products.find(p => p.id === productId);

        if(product) {
            document.getElementById('productId').value = product.id;
            document.getElementById('productName').value = product.name;
            document.getElementById('productPrice').value = product.price;
            document.getElementById('productDescription').value = product.description;
            document.getElementById('productImage').value = product.image;
        }

        document.getElementById('editForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const index = products.findIndex(p => p.id === productId);
            
            products[index] = {
                ...products[index],
                name: this.elements.productName.value,
                price: parseFloat(this.elements.productPrice.value),
                description: this.elements.productDescription.value,
                image: this.elements.productImage.value
            };
            
            localStorage.setItem('products', JSON.stringify(products));
            window.location.href = 'index.html';
        });
    </script>
</body>
</html>