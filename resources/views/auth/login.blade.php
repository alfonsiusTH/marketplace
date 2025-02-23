<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to top left, #ffffff 50%, #5c6bc0 50%);
        }

        .login-container {
            background: white;
            padding: 60px;
            width: 400px;
            border-radius: 10px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h2 {
            color: #5c6bc0;
            margin-bottom: 42px;
        }

        .input-group {
            position: relative;
            margin: 20px 0;
            text-align: center;
        }

        .input-group label {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #999;
            font-size: 14px;
            transition: 0.3s;
            pointer-events: none;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            outline: none;
        }

        /* Ketika input aktif atau ada teks, label naik ke atas */
        .input-group input:focus+label,
        .input-group input:not(:placeholder-shown)+label {
            top: 2px;
            left: 10px;
            font-size: 12px;
            color: #5c6bc0;
        }

        .login-btn {
            background: #5c6bc0;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            transition: 0.3s;
            margin-top: 18px;
        }

        .login-btn:hover {
            background: #3f51b5;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>LOGIN</h2>

        <div class="input-group">
            <input type="text" id="username" required placeholder=" ">
            <label for="username">Username</label>
        </div>

        <div class="input-group">
            <input type="password" id="password" required placeholder=" ">
            <label for="password">Password</label>
        </div>

        <button class="login-btn">LOGIN</button>
    </div>
</body>

</html>
