<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
    <link rel="stylesheet" href="{{ asset('assets/auth.css') }}">
</head>

<body>
    <div class="login-container">
        <h2>Register</h2>
        <form action="#" method="POST">
            <div class="input-group">
                <input type="text" id="name" name="name" required placeholder=" ">
                <label for="name">Enter Your Username</label>
            </div>
            <div class="input-group">
                <input type="email" id="email" name="email" required placeholder=" ">
                <label for="email">Enter Your Email</label>
            </div>
            <div class="input-group">
                <input type="tel" id="phone" name="phone" required placeholder=" ">
                <label for="phone">Enter Your Phone Number</label>
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" required placeholder=" ">
                <label for="password">Enter Your Password</label>
            </div>
            <div class="input-group">
                <input type="password" id="confirm-password" name="confirm-password" required placeholder=" ">
                <label for="confirm-password">Confirm Password</label>
            </div>
            <button type="submit" class="login-btn">Register</button>
        </form>
        <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
    </div>
</body>

</html>
