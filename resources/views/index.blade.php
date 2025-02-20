@extends('layouts.app')
@section('content')
    <style>
        body {
            background: #EEF3FA;
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .background-shape {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 60%;
            height: 50%;
            background: #3F4CA8;
            clip-path: polygon(40% 0%, 100% 0%, 100% 100%, 0% 100%);
        }

        .background-overlay {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 65%;
            height: 55%;
            background: #A1A9E6;
            clip-path: polygon(45% 0%, 100% 0%, 100% 100%, 0% 100%);
            opacity: 0.8;
        }
    </style>
    <div class="container-fluid position-relative min-vh-100">
        <div class="diagonal-div"></div>

        <nav class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <img src="" alt="">
            </div>
            <div class="nav-buttons">
                <button class="btn btn-outline-primary">LOGIN</button>
                <button class="btn btn-primary">REGISTER</button>
            </div>
        </nav>

        <div class="row justify-content-center text-center">
            <div class="col-md-8">
                <h1 class="main-heading fw-bold">EXPLORE OUR PRODUCT</h1>
                <button class="btn btn-primary btn-lg get-started-btn">GET STARTED</button>
            </div>
        </div>
    </div>
@endsection
