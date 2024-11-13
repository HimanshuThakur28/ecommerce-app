@extends('frontend.layout')
@section('title', 'Shopping Cart')
@section('content')

<h2 class="text-center my-4">Shopping Cart</h2>

<div class="container">
    <div class="row">
        @foreach($cart as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item['name'] }}</h5>
                        <p class="card-text">{{ $item['description'] }}</p>
                        <p class="text-muted">Price: ${{ number_format($item['price'], 2) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Cart Summary</h4>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Total Items: {{ count($cart) }}
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Total Price: ${{ number_format(array_sum(array_column($cart, 'price')), 2) }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
