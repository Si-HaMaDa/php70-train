<?php
require 'config.php';

if (isset($_SESSION['is_login']) && $_SESSION['is_login']) {
    header('location: /admin');
}

$error = $email = $password = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);

    if (empty($email)) {
        $error .= "Email is required<br>";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= "Email is invalid<br>";
        }
    }

    if (empty($password)) {
        $error .= 'password is required<br>';
    } elseif (strlen($password) < 6 || strlen($password) > 10) {
        $error .= "Password must be between 6 and 10 letters<br>";
    } else {
        $password = sha1($password);
    }

    if (empty($error)) {
        try {
            $stmt = $conn->prepare("SELECT * FROM users WHERE email='$email' AND password='$password'");
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$user) {
                $error .= "User not exist, check email and password!<br>";
            } else {
                $_SESSION['is_login'] = true;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['login_time'] = date('Y-m-d');
                header('location: /admin/');
                die();
            }
        } catch (PDOException $e) {
            $error .= "<h4>Query Error: " . $e->getMessage() . "</h4>";
        }
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Sign IN Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <p class="text-danger">
            <?= $error ?>
        </p>
        <form method="post">
            <img class="mb-4" src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign IN</h1>

            <div class="form-floating m-2">
                <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" placeholder="name@example.com">
                <label for="email">Email address</label>
            </div>

            <div class="form-floating m-2">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign IN</button>
            <p class="mt-4 mb-3 text-muted">&copy; 2017–2022</p>
            <p class="m-1 mb-3 text-muted">
                Doesn't Have an account?! <a href="register.php">Register Now!</a>
            </p>
        </form>
    </main>



</body>

</html>