<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }

    if (isset($_SESSION['account_deleted']) && $_SESSION['account_deleted'] === true)
    {
        $accountDeleted = true;
        unset($_SESSION['account_deleted']);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- Css linking -->
        <link href="/Views/CSS/Style.css" rel="stylesheet">
</head>

<body>
<nav class="Navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
    <!-- Logo section -->
    <a class="navbar-brand" href="/Views/Index.php">
        <img src="/Views/Images/Logo.png" alt="Book store Logo" width="200" height="200">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNAV">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNAV">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/Views/Index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Views/Shop.php">Shop</a>
            </li>
                <li class="nav-item">
                    <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true): ?>
                        <a class="nav-link" href="/Views/membersBooks.php">Members Books</a>
                    <?php else: ?>
                        <a class="nav-link" href="/Views/auth/sign_in.php">Members Books</a>
                    <?php endif; ?>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="/Views/viewCart.php">Cart</a>
                </li>
                
                <?php if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/Views/auth/sign_in.php">Sign in</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" style="background-color: #ffeeee; font-weight: bold;" href="/Controllers/sign_out_process.php">Sign out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Views/accountManagement.php">Account Management</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>