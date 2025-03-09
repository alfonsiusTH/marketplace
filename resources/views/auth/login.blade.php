<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/auth.css') }}">
</head>

<body>
    <div class="login-container">
        <h2>LOGIN</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group">
                <input type="email" name="email" id="username" required placeholder="">
                <label for="username">Email</label>
            </div>

            <div class="input-group">
                <input type="password" name="password" id="password" required placeholder="">
                <label for="password">Password</label>
            </div>

            <button type="submit" class="login-btn">LOGIN</button>
        </form>
    </div>
</body>

</html>
