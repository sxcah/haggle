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
        </nav>

        <div class="main-container">
            <div class="user-profile-container">
                <div class="title-group">
                    <div class="title">
                        <h2>Your Profile</h2>
                    </div>
                </div>
                <div class="information-group">
                    <div class="info-group">
                        <div class="label">Username:</div>
                        <p><?php echo htmlspecialchars($username)?></p>
                    </div>
                    <div class="info-group">
                        <div class="label">Email:</div>
                        <p><?php echo htmlspecialchars($email)?></p>
                    </div>
                    <div class="info-group">
                        <div class="label">Address:</div>
                        <p><?php echo htmlspecialchars($address)?></p>
                    </div>
                    <div class="info-group">
                        <div class="label">Contact Number:</div>  
                        <p><?php echo htmlspecialchars($contact_number)?></p>
                    </div>
                    <div class="link-group">
                        <?php if (isset($_SESSION['username'])): ?>
                            <p><a href="api/logout_user.php">LOGOUT</a></p>
                        <?php else: ?>
                        <div class="link-group">
                            <a href="forms/login.php">LOGIN</a>
                            <div class="divider"></div>
                            <a href="forms/register.php">SIGN-UP</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>