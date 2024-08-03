<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace with your database connection code
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password are correct
    if ($username == "abc" && $password == "123") {
        // Redirect to the desired page
        header("Location: index2.php");
        exit();
    } else {
        echo "Invalid username or password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Financial Portfolio</title>
    <style>
        body {
            background-color: #1a1a1a;
            font-family: Arial, sans-serif;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #333333;
            border-radius: 8px;
            padding: 40px;
            width: 400px;
            position: relative;
        }

        .login-form {
            display: flex;
            flex-direction: column;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 4px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: #ffffff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Customization for images */
        .logo {
            width: 100px;
            height: auto;
            margin: 0 auto;
            display: block;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="/img/admin.png" alt="Fina" class="logo">
        <form class="login-form" method="post">
            <h1>Login</h1>
            <input type="text" placeholder="Username" name="username" required>
            <input type="password" placeholder="Password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
