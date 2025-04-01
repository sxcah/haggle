<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="left-container">
                <div class="text-box">
                    <div class="title-group">
                        <h2 class="title"><a href="../index.html">HAGGLE</a></h2>
                        <div class="header-subheader">
                            <p class="header">Sign-Up</p>
                            <p class="sub-header">Create an account</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <div class="right-container">
                <form action="../api/form_verification.php" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="text-field" name="username" placeholder="Username">
                        </div>
                        <div class="input-group">
                            <input type="text" class="text-field" name="email"  placeholder="Email">
                        </div>
                        <div class="input-group">
                            <input type="text" class="text-field" name="address"  placeholder="Address">
                        </div>
                        <div class="input-group">
                            <input type="number" class="text-field" name="contact-number"  placeholder="Contact Number">
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" class="text-field" name="password"  placeholder="Password">
                        </div>
                        <div class="input-group">
                            <input type="password" class="text-field" name="confirm-password"  placeholder="Confirm-Password">
                        </div>
                    </div>

                    <?php
                        session_start();
                        if (isset($_SESSION["error_message"])): ?> 
                            <div class="form-group">
                                <div class="error-group">
                                    <?php 
                                        if (isset($_SESSION["error_message"])) {
                                            echo htmlspecialchars($_SESSION["error_message"]);
                                            unset($_SESSION["error_message"]);
                                        }
                                    ?>
                                </div>
                            </div>
                    <?php endif; ?>
                        
                    <div class="links">
                        <p>Already have an account? <a href="login.php">Sign-in</a></p>
                    </div>

                    <input type="submit" value="Create Account" class="btn">
                </form>
            </div>
        </div>
    </div>
</body>
</html>