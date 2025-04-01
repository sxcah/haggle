<?php include "api/get_user.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main-style.css">
</head>
<body>
    <div class="container">
        <nav>
            <div class="title">
                <h2><a href="home.php">HAGGLE</a></h2>
            </div>
            <div class="user-group">
                <p class="user"><a href="user_profile.php">
                    <?php echo htmlspecialchars($username); ?></a></p>
                <?php if (isset($_SESSION['username'])): ?>
                    <div class="logout">
                        <p><a href="api/logout_user.php">LOGOUT</a></p>
                    </div>
                <?php else: ?>
                    <div class="link-group">
                        <a href="forms/login.php">LOGIN</a>
                        <div class="divider"></div>
                        <a href="forms/register.php">SIGN-UP</a>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </div>

</body>
</html>