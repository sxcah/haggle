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

        <div class="main-container">
            <div class="content">
                <div class="divider"></div>
                <div class="text-box">
                    <h2>Welcome to the website</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid corrupti aliquam adipisci consectetur molestiae facilis soluta sunt quod maxime aspernatur id possimus quia labore laborum, magni magnam rerum iusto eum.</p>
                </div>

                <div class="divider"></div>

                <div class="text-box">
                    <h2>Sorry for the inconvinience</h2>
                    <p>This site had come under some maintainance and will be unavailble for quite sometime, issue will be resolve at the end of the semester.</p>
                </div>

                <div class="divider"></div>
            </div>
        </div>
    </div>

</body>
</html>