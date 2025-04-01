<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
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
                            <p class="header">Welcome</p>
                            <p class="sub-header">to the Website</p>
                        </div>
                    </div>
                    <p class="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Quaerat dolor ut obcaecati ex placeat. Earum eveniet, 
                        quidem distinctio non natus ea asperiores ullam magnam eligendi modi odit sequi, iure maiores.
                    </p>
                </div>
            </div>

            <div class="divider"></div>

            <div class="right-container">
                <form action="../api/login_verification.php" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="text-field" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" class="text-field" name="password" placeholder="Password">
                        </div>

                    <div class="links">
                        <a href="recover.php" style="margin-left: 0; width: fit-content">Forgot Password?</a>
                        <p style="display:flex; flex-direction: column;">
                            Don't have an account? <a href="register.php" style="margin-left: 0; width: fit-content">
                                Create an account</a></p>
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

                    <input type="submit" value="Log-In" class="btn">
                </form>
            </div>
        </div>
    </div>
</body>
</html>