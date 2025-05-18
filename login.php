<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        $email = htmlspecialchars(trim($_POST["login_email"]));
        $password = htmlspecialchars($_POST["login_password"]);
        
        // VERY BASIC AUTHENTICATION - REPLACE WITH PROPER AUTH IN PRODUCTION
        if (strtolower($email) === 'admin@admin.com' && $password === 'admin123') {
            $_SESSION['admin_email'] = $email;
            $_SESSION['admin_logged_in'] = true;
            header("Location: admin.php");
            exit();
        } else {
            header("Location: home.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup Form PHP</title>
    <link rel="stylesheet" href="login.css">
    <script src="../custom-scripts.js" defer></script>
    <style>
        #bg-video {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
        }
    </style>
</head>
<body>
    <video autoplay loop muted playsinline id="bg-video">
        <source src="vid4.mp4" type="video/mp4">
        <source src="your-video.webm" type="video/webm">
        <!-- Fallback image if video fails -->
        <img src="test2.avif" alt="Background">
    </video>

    <section class="wrapper">
        <div class="form signup">
            <header>Signup</header>
            <form method="POST" action="">
                <input type="text" name="fullname" placeholder="Full name" required>
                <input type="email" name="email" placeholder="Email address" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <input type="submit" name="signup" value="Signup">
            </form>
        </div>

        <div class="form login">
            <header>Login</header>
            <form method="POST" action="">
                <input type="email" name="login_email" placeholder="Email address" required>
                <input type="password" name="login_password" placeholder="Password" required>
                <a href="#">Forgot password?</a>
                <input type="submit" name="login" value="Login">
            </form>
        </div>

        <script>
            const wrapper = document.querySelector(".wrapper"),
                signupHeader = document.querySelector(".signup header"),
                loginHeader = document.querySelector(".login header");

            loginHeader.addEventListener("click", () => {
                wrapper.classList.add("active");
            });
            signupHeader.addEventListener("click", () => {
                wrapper.classList.remove("active");
            });
        </script>
    </section>
    <div class="home">
        Return to <a href="index.php">Landing page</a>
    </div>
</body>
</html>