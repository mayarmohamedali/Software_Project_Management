<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["signup"])) {
        $fullname = htmlspecialchars($_POST["fullname"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);
        echo "<script>alert('Signup successful for $fullname');</script>";
        header("Location: home.php");
exit;
    } elseif (isset($_POST["login"])) {
        $email = htmlspecialchars($_POST["login_email"]);
        $password = htmlspecialchars($_POST["login_password"]);
        echo "<script>alert('Login attempt for $email');</script>";
        header("Location: home.php");
exit;   
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
</head>
<body>

    
    
    <section class="wrapper">
        <div class="form signup">
            <header>Signup</header>
            <form method="POST" action="">
                <input type="text" name="fullname" placeholder="Email address" required>
                <input type="text" name="email" placeholder="Password" required>
                <input type="password" name="password" placeholder="Confirm Password" required>
                <!-- <div class="checkbox">
                    <input type="checkbox" id="signupCheck" required>
                    <label for="signupCheck">I accept all terms & conditions</label>
                </div> -->
                <input type="submit" name="signup" value="Signup">
            </form>
        </div>

        <div class="form login">
            <header>Login</header>
            <form method="POST" action="">
                <input type="text" name="login_email" placeholder="Email address" required>
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
      Return to <a href="index.php"> Landing page</a>
          </div>
</body>
</html>
