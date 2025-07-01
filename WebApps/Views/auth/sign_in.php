<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .signin-container{
            max-width: 500px;
            margin: 150px auto;
            padding: 30px;
            border: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        </style
</head>
<body>
<?php include '..\Layouts\Header.php' ; ?>

<!-- main content -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h3 class="mb-0">Sign In</h3>
                </div>
                <div class="card-body p-4">
                    <form action="/Controllers/sign_in_process.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark">Sign In</button>
                        </div>
                </div>

                <div class="card-footer bg-light text-center">
                    <p class="mb-0">Not a member yet? <a href="sign_up.php">Sign up here!</a></p>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>


    <?php include '..\Layouts\Footer.php' ; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>