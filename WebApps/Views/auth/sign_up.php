<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include '..\Layouts\Header.php' ; ?>

<form action="/Controllers/sign_up_process.php" method="post">
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h3 class="mb-0">Create an Account</h3>
                </div>
                <div class="card-body p-4">
                    <!-- 1st -->
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" required></div>
                    <!-- 2nd name -->
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                    </div>
                    <!-- address -->
                    <div class="mb-3">

                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea></div>
                    <!-- email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>

                    </div>
                    <!-- contact no -->
                    <div class="mb-3">
                        <label for="contactNumber" class="form-label">Contact Number</label>
                        <input type="tel" class="form-control" id="contactNumber" name="contactNumber" required>
                    </div>
                    <!-- pw -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <!-- confirm pw -->
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    </div>
                    <!-- submit  -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Create Account</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



<?php include '..\Layouts\Footer.php' ; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>