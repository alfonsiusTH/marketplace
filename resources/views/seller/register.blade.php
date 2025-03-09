@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/auth.css') }}">
@endpush
@section('content')
    <div class="login-container">
        <h2>LOGIN</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Field tambahan jika memang diperlukan -->
            <div class="input-group">
                <input type="text" name="shop_name" id="shop_name" placeholder="">
                <label for="shop_name">Nama Toko</label>
            </div>

            <div class="input-group">
                <input type="text" name="description" id="description" placeholder="">
                <label for="description">Deskripsi Toko</label>
            </div>

            <div class="input-group">
                <input type="text" name="telephone" id="telephone" placeholder="">
                <label for="telephone">No Telp</label>
            </div>

            <button type="submit" class="login-btn">LOGIN</button>
        </form>
    </div>
@endsection
