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

        .nav-buttons {
            display: flex;
            align-items: center;
            margin-top: 1em;
            margin-right: 7em;
            gap: 20px;
        }

        .btn-login {
            background-color: #EEF3FA;
            color: #6069EA;
            border: none;
            padding: 0.4rem 15%;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .btn-login:hover {
            background-color: #6069EA;
            color: #EEF3FA;
            border: none;
            padding: 0.4rem 15%;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
        }

        .btn-register {
            background-color: #6069EA;
            color: #EEF3FA;
            border: none;
            padding: 0.4rem 15%;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .btn-register:hover {
            background-color: #EEF3FA;
            color: #6069EA;
            border: none;
            padding: 0.4rem 15%;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
        }

        .get-started-btn {
            background-color: #6069EA;
            color: #EEF3FA;
            border: none;
            padding: 0.4rem 10%;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .get-started-btn:hover {
            background-color: #EEF3FA;
            color: #6069EA;
            border: none;
            padding: 0.4rem 10%;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
        }

        .diagonal-div {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 50%;
            height: 100%;
            background: linear-gradient(135deg, rgba(82, 96, 255, 0.1) 0%, rgba(82, 96, 255, 0.4) 100%);
            clip-path: polygon(100% 5%, 0% 100%, 100% 100%);
            z-index: -1;
        }

        .overlay {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 55%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0, 8, 101, 0.1) 0%, rgba(92, 39, 253, 0.4) 100%);
            clip-path: polygon(100% 5%, 0% 100%, 100% 100%);
            z-index: -1;
        }

        .logo {
            max-width: 150px;
            padding: 20px;
        }

        .main-heading {
            font-size: 3.5rem;
            background: linear-gradient(45deg, #1a237e, #42a5f5);
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-top: 15vh;
        }

        .nav-buttons .btn {
            margin-left: 10px;
            padding: 8px 24px;
        }

        .get-started-btn {
            margin-top: 2rem;
            padding: 12px 36px !important;
            font-size: 1.2rem;
        }
    </style>
    <div class="container-fluid position-relative min-vh-100">
        <div class="diagonal-div"></div>
        <div class="overlay"></div>

        <nav class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <img src="" alt="">
            </div>
            <div class="nav-buttons">
                <a href="{{ route('showLogin') }}" class="btn-login text-decoration-none">LOGIN</a>
                <a href="{{ route('register') }}" class="btn-register text-decoration-none">REGISTER</a>
            </div>
        </nav>

        <div class="row justify-content-center text-center mt-5">
            <div class="col-md-8">
                <h1 class="main-heading fw-bold">EXPLORE OUR PRODUCT</h1>
                <button class="get-started-btn">GET STARTED</button>
            </div>
        </div>
    </div>
@endsection
