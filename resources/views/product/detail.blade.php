@extends('layouts.app')
@section('content')
    <style>
        .navbar {
            margin-top: 10px;
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: white;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .navbar-brand {
            position: absolute;
            left: 20px;
            top: 40px;
            transform: translateY(-50%);
        }

        .search-section {
            margin-left: 20%;
            margin-right: auto;
            width: 60%;
        }
    </style>
    <!-- Custom Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid position-relative">
            <!-- Logo (without <a> tag) -->
            <div class="navbar-brand">
                <img src="{{ asset('assets/image/image 5.png') }}" alt="Logo" style="height: 150px; width: auto;">
            </div>

            <!-- Search Section (Center) -->
            <div class="search-section">
                <input class="form-control" type="search" placeholder="Cari Produk..." aria-label="Search">
            </div>

            <!-- Right Icons Section -->
            <div class="d-flex align-items-center gap-3">
                <!-- Shopping Cart Icon -->
                <button class="btn" style="border: none">
                    <i class="fas fa-shopping-cart"></i>
                </button>

                <!-- Store Icon and Name -->
                <div class="d-flex align-items-center">
                    <i class="fas fa-store"></i>
                    <span class="ms-2">Toko</span>
                </div>

                <!-- User Icon and Name -->
                <div class="d-flex align-items-center">
                    <i class="fas fa-user"></i>
                    <span class="ms-2">User</span>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <!-- Product Images -->
            <div class="col-md-6 mb-4">
                <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxfHxoZWFkcGhvbmV8ZW58MHwwfHx8MTcyMTMwMzY5MHww&ixlib=rb-4.0.3&q=80&w=1080"
                    alt="Product" class="img-fluid rounded mb-3 product-image" id="mainImage">
                <div class="d-flex justify-content-between">
                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxfHxoZWFkcGhvbmV8ZW58MHwwfHx8MTcyMTMwMzY5MHww&ixlib=rb-4.0.3&q=80&w=1080"
                        alt="Thumbnail 1" class="thumbnail rounded active" onclick="changeImage(event, this.src)">
                    <img src="https://images.unsplash.com/photo-1528148343865-51218c4a13e6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwzfHxoZWFkcGhvbmV8ZW58MHwwfHx8MTcyMTMwMzY5MHww&ixlib=rb-4.0.3&q=80&w=1080"
                        alt="Thumbnail 2" class="thumbnail rounded" onclick="changeImage(event, this.src)">
                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxfHxoZWFkcGhvbmV8ZW58MHwwfHx8MTcyMTMwMzY5MHww&ixlib=rb-4.0.3&q=80&w=1080"
                        alt="Thumbnail 3" class="thumbnail rounded" onclick="changeImage(event, this.src)">
                    <img src="https://images.unsplash.com/photo-1528148343865-51218c4a13e6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwzfHxoZWFkcGhvbmV8ZW58MHwwfHx8MTcyMTMwMzY5MHww&ixlib=rb-4.0.3&q=80&w=1080"
                        alt="Thumbnail 4" class="thumbnail rounded" onclick="changeImage(event, this.src)">
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
                <h2 class="mb-3">Premium Wireless Headphones</h2>
                <p class="text-muted mb-4">SKU: WH1000XM4</p>
                <div class="mb-3">
                    <span class="h4 me-2">$349.99</span>
                    <span class="text-muted"><s>$399.99</s></span>
                </div>
                <div class="mb-3">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-half text-warning"></i>
                    <span class="ms-2">4.5 (120 reviews)</span>
                </div>
                <p class="mb-4">Experience premium sound quality and industry-leading noise cancellation with these
                    wireless
                    headphones. Perfect for music lovers and frequent travelers.</p>
                <div class="mb-4">
                    <h5>Color:</h5>
                    <div class="btn-group" role="group" aria-label="Color selection">
                        <input type="radio" class="btn-check" name="color" id="black" autocomplete="off" checked>
                        <label class="btn btn-outline-dark" for="black">Black</label>
                        <input type="radio" class="btn-check" name="color" id="silver" autocomplete="off">
                        <label class="btn btn-outline-secondary" for="silver">Silver</label>
                        <input type="radio" class="btn-check" name="color" id="blue" autocomplete="off">
                        <label class="btn btn-outline-primary" for="blue">Blue</label>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" value="1" min="1"
                        style="width: 80px;">
                </div>
                <button class="btn btn-primary btn-lg mb-3 me-2">
                    <i class="bi bi-cart-plus"></i> Add to Cart
                </button>
                <button class="btn btn-outline-secondary btn-lg mb-3">
                    <i class="bi bi-heart"></i> Add to Wishlist
                </button>
                {{-- <div class="mt-4">
                    <h5>Key Features:</h5>
                    <ul>
                        <li>Industry-leading noise cancellation</li>
                        <li>30-hour battery life</li>
                        <li>Touch sensor controls</li>
                        <li>Speak-to-chat technology</li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
