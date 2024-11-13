@extends('frontend.layout')
@section('title', 'Product Details')
@section('content')
<div class="card" id="product-detail-card">
    <div class="card-body">
        <h5 class="card-title" id="product-name"></h5>
        <p class="card-text" id="product-description"></p>
        <p class="card-text" id="product-price"></p>
        <button id="add-to-cart-btn" class="btn btn-success" data-product-id="{{ $product_id }}">Add to Cart</button>
        <div id="message" class="mt-3"></div>
    </div>
</div>

@endsection

<script>
document.addEventListener("DOMContentLoaded", function () {
    const productId = {{ $product_id }};
    const addToCartBtn = document.getElementById('add-to-cart-btn');
    const messageDiv = document.getElementById('message');
    var token = sessionStorage.getItem('api_token');
        if (!token) {
           
            window.location.href = '/login';
        }
    fetch(`/api/products/${productId}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token 
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data) {
            document.getElementById('product-name').innerText = data.name;
            document.getElementById('product-description').innerText = data.description;
            document.getElementById('product-price').innerText = `Price: $${data.price}`;
            addToCartBtn.setAttribute('data-product-name', data.name);
            addToCartBtn.setAttribute('data-product-description', data.description);
            addToCartBtn.setAttribute('data-product-price', data.price);
        } else {
            messageDiv.innerHTML = '<div class="alert alert-danger">Product not found.</div>';
        }
    })
    .catch(() => {
        messageDiv.innerHTML = '<div class="alert alert-danger">Error fetching product details.</div>';
    });

   
    addToCartBtn.addEventListener('click', () => {
        const productName = addToCartBtn.getAttribute('data-product-name');
        const productDescription = addToCartBtn.getAttribute('data-product-description');
        const productPrice = addToCartBtn.getAttribute('data-product-price');
        fetch('/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ 
                name: productName,
                description: productDescription,
                price: productPrice})
        })
        .then(response => response.json())
        .then(data => {
            messageDiv.innerHTML = data.success 
                ? '<div class="alert alert-success">Product added to cart!</div>' 
                : '<div class="alert alert-danger">Failed to add product to cart.</div>';
        })
        .catch(() => {
            messageDiv.innerHTML = '<div class="alert alert-danger">An error occurred. Please try again.</div>';
        });
    });
});
</script>
