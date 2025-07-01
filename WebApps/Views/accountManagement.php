<?php
if (session_status() == PHP_SESSION_NONE)
 {
    session_start();
    }

// checks if user is logged in and redirect to login if not
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: /Views/auth/sign_in.php");
    exit();
}

//db connection
require_once '../Config/DBconnect.php';
require_once '../common.php';

//pulls user data from database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = :user_id";
$stmt = $connection->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

//Success message 
$updateSuccess = false;
if (isset($_SESSION['account_updated']) && $_SESSION['account_updated'] === true) {
    $updateSuccess = true;
    unset($_SESSION['account_updated']);
}

?>

<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Management</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Views/CSS/Style.css" rel="stylesheet">
</head>
<body>
<?php include 'Layouts/Header.php'; ?>
<div class="container my-5">
<div class="row">
<div class="col-12">
    <h1 class="mb-4"> Account Management</h1>

<?php if($updateSuccess):?>
    <div class="alert alert-success mb-4">
        Your account information was successfully updated</div>

</div> 
<?php endif; ?>

<div class="card shadow mb-4">
    <div class="card-header bg-dark text-white">

    <h3 class="mb-0">Account Information</h3>
</div>

<div class="card-body p-4">
    <form action="/Controllers/updateAccount.php" method="post">
        <!-- first name-->
         <div class="mb-3">
         <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo escape($user['first_name']); ?>" required>
</div>

<!-- Last Name -->
<div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo escape($user['last_name']); ?>" required>
                        </div>
                        
                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required><?php echo escape($user['address']); ?></textarea>
                        </div>
                        
                        <!-- Email Address (readonly as it's used for login) -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo escape($user['email']); ?>" required>
                        </div>
                        
                        <!-- Contact Number -->
                        <div class="mb-3">
                            <label for="contactNumber" class="form-label">Contact Number</label>
                            <input type="tel" class="form-control" id="contactNumber" name="contactNumber" value="<?php echo escape($user['contact_number']); ?>" required>
                        </div>
                        
                        <!-- Username (readonly as it's used for login) -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo escape($user['username']); ?>" readonly>
                            <small class="text-muted">Username cannot be changed</small>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Update Account</button>
                        </div>
                    </form>
                </div>
            </div>


            <!-- delete account section -->
<div class="card shadow">
    <div class="card-header bg-danger text-white">
        <h3 class="mb-0">Delete Account</h3>
</div>
<div class="card-body">
    <p class="text-danger"> Warning: This cannot be undone. You will need to create a new account and all your data will be permanently deleted.</p>
    <form action="/Controllers/deleteAccount.php" method="post">
    <div class="d-grid">
        <button type="submit" class="btn btn-danger">Delete My Account</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

<?php include 'Layouts/Footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>