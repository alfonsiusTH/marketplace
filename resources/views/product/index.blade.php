@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">
@endpush

@section('content')
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

    <!-- Carousel Section -->
    <section class="carousel">
        <button class="prev"><i class="fas fa-chevron-left"></i></button>
        <div class="carousel-image-wrapper">
            <img src="{{ asset('assets/image/image 6.png') }}" alt="Home Icon">
        </div>
        <button class="next"><i class="fas fa-chevron-right"></i></button>
    </section>

    <!-- Produk Section -->
    <section class="products my-5">
        <h2 class="section-title mb-4 text-start">PRODUK</h2>
        <div class="row row-cols-2 row-cols-md-4 g-2">
            @forelse ($products as $product)
                <div class="col">
                    <a href="{{ route('product.detail', $product->id) }}" class="card-link">
                        <div class="card h-100 small-card">
                            <!-- Gambar Produk -->
                            @if ($product->product_image)
                                <img src="{{ asset('storage/product/' . $product->product_image) }}" class="card-img-top"
                                    alt="{{ $product->product_name }}">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top"
                                    alt="No Image">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">{{ $product->product_name }}</h5>
                                <p class="card-text">{{ Str::limit($product->product_description, 50) }}</p>
                            </div>

                            <div class="card-footer">
                                <small class="text-muted">Harga:
                                    Rp{{ number_format($product->product_price, 0, ',', '.') }}</small><br>
                                <small class="text-muted">Seller: {{ $product->seller->shop_name ?? '-' }}</small>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <p class="text-center">Tidak ada produk tersedia.</p>
            @endforelse
        </div>
    </section>
@endsection
