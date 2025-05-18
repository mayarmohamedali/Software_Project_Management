<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["signup"])) {
        // ... your existing signup code ...
    } elseif (isset($_POST["login"])) {
        $email = htmlspecialchars($_POST["login_email"]);
        $password = htmlspecialchars($_POST["login_password"]);
        
        // Add this admin check (use proper authentication in real projects)
        if (strtolower($email) === 'admin@admin.com') { // Change to your admin email
            header("Location: admin.php");
            exit;
        } else {
            header("Location: home.php");
            exit;
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


document.querySelector('.form.login form').addEventListener('submit', function(e) {
    const email = this.querySelector('input[name="login_email"]').value.trim().toLowerCase();
    
    // Optional: Client-side check (but server-side is mandatory)
    if (email === 'admin@admin.com') {
        e.preventDefault(); // Only prevent default for admin
        window.location.href = 'admin.php';
    }
    // For regular users, let the form submit normally
});

        </script>
    </section>
    <div class="home">
      Return to <a href="index.php"> Landing page</a>
          </div>
</body>
<video autoplay loop muted playsinline id="bg-video">
  <source src="vid4.mp4" type="video/mp4">
  <source src="your-video.webm" type="video/webm">
  <!-- Fallback image if video fails -->
  <img src="test2.avif" alt="Background">
</video>

</html>
