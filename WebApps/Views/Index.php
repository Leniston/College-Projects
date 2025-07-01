<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PaperTrail Book Store</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
<?php include 'Layouts\Header.php' ; ?>

<!-- main content -->
<div class="container my-5">

    <?php if(isset($accountDeleted) && $accountDeleted === true): ?>
        <div class="alert alert-success mb-4">
        <i class="bi bi-check-circle-fill me-2"></i>
        Your account has been deleted successfully.
    </div>
    <?php endif; ?>

    <!-- intro Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="p-4 bg-light rounded">
                <h2>Welcome to PaperTrail book store!</h2>
                <p>Your one-stop destination for quality books at great prices.</p>
            </div>
        </div>
    </div>

    <!-- inventory -->
    <div class="row mb-4">
        <div class="col-12">
            <h3>This month's specials!</h3>
            <div class="row">
                <!-- Book 1 -->
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="/Views/Images/dracula.jpg" class="card-img-top mx-auto d-block mt-3" alt="Book Cover" style="width: 150px; height: 200px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Dracula</h5>
                            <p class="card-text">€13.99</p>
                            <a href="Shop.php">
                            <button class="btn btn-primary btn-sm">View Details</button>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Book 2 -->
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="/Views/Images/frank.jpg" class="card-img-top mx-auto d-block mt-3" alt="Book Cover" style="width: 150px; height: 200px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Frankenstein</h5>
                            <p class="card-text">€14.99</p>
                            <a href="Shop.php">
                                <button class="btn btn-primary btn-sm">View Details</button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Book 3 -->
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="/Views/Images/lovecraft.jpg" class="card-img-top mx-auto d-block mt-3" alt="Book Cover" style="width: 150px; height: 200px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">H.P Lovecraft Anthology</h5>
                            <p class="card-text">€29.99</p>
                            <a href="Shop.php">
                                <button class="btn btn-primary btn-sm">View Details</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- member info -->
    <div class="row my-5">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h3 class="mb-0">Member Benefits</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <p class="lead">Join our membership program to unlock exclusive benefits:</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Access to exclusive limited-edition books
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Members-only discounts on new releases
                                </li>
                            </ul>
                            <p class="mt-3">Create an account to unlock these special collections.</p>
                        </div>
                        <div class="col-md-5 d-flex align-items-center justify-content-center">
                            <div class="text-center">
                                <img src="/Views/Images/membership.png" alt="Membership" class="img-fluid rounded mb-3" style="max-width: 200px;">
                                <div>
                                    <a href="../Views/auth/sign_up.php" class="btn btn-dark">Create Account</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include 'Layouts\Footer.php' ; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>