@extends('frontend.layout')
@section('title', 'Product List')
@section('content')

<form id="search-form" class="form-inline mb-4">
    <input type="text" name="query" id="search-query" class="form-control mr-2" placeholder="Search by products..." required>
    <button type="submit" class="btn btn-primary">Search</button>
</form>

<div id="no-products-message" class="alert alert-warning" style="display: none;">
    No products found.
</div>

<div id="product-list" class="row"></div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const token = sessionStorage.getItem('api_token');
    if (!token) {
        window.location.href = '/login';
        return;
    }

   
    function fetchAllProducts() {
        fetch('/api/products', {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + token
            }
        })
        .then(response => response.json())
        .then(data => {
            displayProducts(data);
        })
        .catch(error => {
            console.error('Error fetching products:', error);
            alert('Error fetching products.');
        });
    }
    function fetchSearchedProducts(query) {
    fetch('/api/products/search', {
        method: 'POST',
        headers: {
            'Authorization': 'Bearer ' + token,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ query: query })  
    })
    .then(response => response.json())
    .then(data => {
        displayProducts(data);
    })
    .catch(error => {
       
        alert('Error fetching search results.');
    });
}


    
    function displayProducts(data) {
        const productList = document.getElementById('product-list');
        productList.innerHTML = '';

        if (data.length === 0) {
            document.getElementById('no-products-message').style.display = 'block';
        } else {
            document.getElementById('no-products-message').style.display = 'none';
            data.forEach(product => {
                const productCard = `
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">${product.name}</h5>
                                <p class="card-text">${product.description}</p>
                                <p class="card-text">Price: $${product.price}</p>
                                <a href="/products/${product.id}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                `;
                productList.innerHTML += productCard;
            });
        }
    }

    fetchAllProducts();

    document.getElementById('search-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const query = document.getElementById('search-query').value.trim();

        if (query) {
            fetchSearchedProducts(query);  
        } else {
            fetchAllProducts();  
        }
    });
});
</script>

@endsection
