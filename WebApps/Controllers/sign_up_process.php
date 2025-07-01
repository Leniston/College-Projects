<?php
require_once '../Config/DBconnect.php';

// set up the variables
$success = false;
$email_error = false;
$username ="";

if (isset($_POST['firstName'])) {
    //check if email address already exists
    $check_email = "SELECT * FROM users WHERE email = :email";
    $email_stmt = $connection->prepare($check_email);
    $email_stmt->execute(['email' => $_POST['email']]);

    if ($email_stmt->rowCount() > 0) {
        //email exists
        $email_error = true;
    } else {
        //if the email address doesnt exist then we continue with registration
        try {
            $new_user = array(
                "username" => ($_POST['firstName'] . $_POST['lastName']),
                "email" => $_POST['email'],
                "password" => $_POST['password'],
                "first_name" => $_POST['firstName'],
                "last_name" => $_POST['lastName'],
                "address" => $_POST['address'],
                "contact_number" => $_POST['contactNumber']
            );

            $sql = "INSERT INTO users (username, email, password, first_name, last_name, address, contact_number)
        VALUES (:username, :email, :password, :first_name, :last_name, :address, :contact_number)";

            $statement = $connection->prepare($sql);
            $statement->execute($new_user);

            //store username in variable to print it back to the user later on
            $success = true;
            $username = $new_user['username'];
        } catch (PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
}

//return feedback to user if email exists
//if email doesnt exist then user is given success message
//return feedback to user upon successful sign up
include '../Views/Layouts/Header.php';?>
<div class="container my-5">
<div class="row justify-content-center">
    <div class="col-md-6">
        <?php if ($email_error): ?>
<div class="alert alert-danger">
    <h4>Registration unsuccessful.</h4>
    <p>The email address you have used is already registered.</p>
    <p>Please try again with a different email address</p>
    <hr>
    <p><a href="../Views/auth/sign_up.php" class="btn btn-primary">Try again</a></p>
        </div>
        <?php endif; ?>


    <?php if ($success): ?>
        <div class="alert alert-success">
        <h4>Registration has been successful!</h4>
        <p>Your username is: <strong><?php echo ($username); ?></strong></p>
            <hr>
        <p><a href="../Views/auth/sign_in.php" class="btn btn-primary ">Sign In Now!</a></p>
            </div>
                <?php endif; ?>
        </div>
    </div>
</div>
<?php include '../Views/Layouts/Footer.php'; ?>