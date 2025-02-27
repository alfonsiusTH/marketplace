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

        <div class="input-group">
            <input type="text" id="username" required placeholder="">
            <label for="username">Username</label>
        </div>

        <div class="input-group">
            <input type="password" id="password" required placeholder="">
            <label for="password">Password</label>
        </div>

        <button class="login-btn">LOGIN</button>
    </div>
</body>

</html>
