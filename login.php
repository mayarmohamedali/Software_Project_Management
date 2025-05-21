<?php
session_start();

$login_error = ''; // Initialize login error variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        $email = htmlspecialchars(trim($_POST["login_email"]));
        $password = htmlspecialchars($_POST["login_password"]);
        
        // VERY BASIC AUTHENTICATION - REPLACE WITH PROPER AUTH IN PRODUCTION
        if (strtolower($email) === 'admin@gmail.com' && $password === 'Adminnn@123') {
            $_SESSION['admin_email'] = $email;
            $_SESSION['admin_logged_in'] = true;
            header("Location: admin.php");
            exit();
        } else {
            $login_error = "Invalid email or password"; // Set error message
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
        
        .error-message {
            color: #dc3545;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 8px 15px;
            margin-bottom: 15px;
            border-radius: 4px;
            font-size: 14px;
            animation: shake 0.5s;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        
        .error-field {
            border-color: #dc3545 !important;
            background-color: #fff3f3 !important;
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
            <form method="POST" action="" name="signup_form">
                <input type="text" name="fullname" placeholder="Full name" required>
                <input type="email" name="email" placeholder="Email address" required>
                
                <div style="position: relative; display: inline-block; width: 100%;">
                    <input type="password" name="password" placeholder="Password" required id="password" style="padding-right: 30px;">
                    <span toggle="#password" class="toggle-password" style="
                        position: absolute;
                        right: 8px;
                        top: 50%;
                        transform: translateY(-50%);
                        cursor: pointer;
                        user-select: none;
                        font-size: 16px;
                        color: #888;
                    ">👁️</span>
                </div>

                <div style="position: relative; display: inline-block; width: 100%; margin-top: 10px;">
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required id="confirm_password" style="padding-right: 30px;">
                    <span toggle="#confirm_password" class="toggle-password" style="
                        position: absolute;
                        right: 8px;
                        top: 50%;
                        transform: translateY(-50%);
                        cursor: pointer;
                        user-select: none;
                        font-size: 16px;
                        color: #888;
                    ">👁️</span>
                </div>

                <input type="submit" name="signup" value="Signup" style="margin-top: 15px;">
            </form>
        </div>

        <div class="form login">
            <header>Login</header>
            <form method="POST" action="">
                <?php if (!empty($login_error)): ?>
                    <div class="error-message">
                        <?php echo htmlspecialchars($login_error); ?>
                    </div>
                <?php endif; ?>
                
                <input type="email" name="login_email" placeholder="Email address" required <?php if (!empty($login_error)) echo 'class="error-field"'; ?>>
                <input type="password" name="login_password" placeholder="Password" required <?php if (!empty($login_error)) echo 'class="error-field"'; ?>>
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

            // Password toggle visibility logic
            const togglePasswordIcons = document.querySelectorAll('.toggle-password');
            togglePasswordIcons.forEach(icon => {
                icon.addEventListener('click', () => {
                    const inputSelector = icon.getAttribute('toggle');
                    const input = document.querySelector(inputSelector);
                    if (input.type === "password") {
                        input.type = "text";
                        icon.textContent = '🙈';
                    } else {
                        input.type = "password";
                        icon.textContent = '👁️';
                    }
                });
            });

            // Password validation for signup form
            document.querySelector('form[name="signup_form"]').addEventListener('submit', (e) => {
                const emailInput = e.target.querySelector('input[name="email"]');
                const passwordInput = e.target.querySelector('input[name="password"]');
                const confirmPasswordInput = e.target.querySelector('input[name="confirm_password"]');

                // Email format: enforce lowercase and must be gmail.com
                const emailRegex = /^[a-z0-9._%+-]+@gmail\.com$/;
                if (!emailRegex.test(emailInput.value.trim())) {
                    alert("Please enter a valid Gmail address in lowercase (e.g., user@gmail.com).");
                    emailInput.focus();
                    e.preventDefault();
                    return false;
                }

                // Password format: at least 6 characters, one uppercase, one lowercase, one digit, one special char
                const password = passwordInput.value;
                const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
                if (!passwordRegex.test(password)) {
                    alert("Password must be at least 6 characters and include:\n- One uppercase letter\n- One lowercase letter\n- One number\n- One special character (@$!%*?&)");
                    passwordInput.focus();
                    e.preventDefault();
                    return false;
                }

                // Password match check
                if (password !== confirmPasswordInput.value) {
                    alert("Passwords do not match. Please check and try again.");
                    confirmPasswordInput.focus();
                    e.preventDefault();
                    return false;
                }
            });
        </script>
    </section>
    <div class="home">
        Return to <a href="index.php">Landing page</a>
    </div>
</body>
</html>