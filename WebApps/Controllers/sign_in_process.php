<?php

require_once '../Config/DBconnect.php';
require_once '../common.php';

//kick off the session
session_start();

$login_error = false;
$login_success = false;

if (isset($_POST['username']) && isset($_POST['password'])) {
    //preps SQL statement to check the user details
    $sql = "SELECT * from users WHERE username = :username AND password = :password";

        //will sanitise inputs
        $username = $_POST['username'];
        $password = $_POST['password'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':username', $username, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
            $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($statement->rowCount() > 0 ) {


            //store user info for session

            $_SESSION['user_id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['is_logged_in'] = true;

            $login_success = true;
        } else {
            $login_error = true;

        }
    }
//include the header to show successful sign in message

include '../Views/Layouts/Header.php';
?>

<div class="container my-5"

     <div class="col-md-6">
         <?php if ($login_success): ?>
         <div class="alert alert-success">
             <h4> Your sign in was successful!</h4>
             <p>Hello, <?php echo htmlspecialchars($_SESSION['username']);?>!</p>
             <hr>
             <p><a href="../Views/membersBooks.php" class="btn btn-primary">Browse members books</a></p>
         </div>
         <?php endif; ?>

         <?php if ($login_error):?>

         <div class="alert alert-danger">
             <h4>Login unsuccessful.</h4>
             <p>Please try again or register if you don't already have an account</p>
             <hr>
             <p><a href="../Views/auth/sign_in.php" class="btn btn-primary">Try again</a></p>
             <hr>
             <p><a href="../Views/auth/sign_up.php" class="btn btn-primary">Create an account</a></p>
         </div>
         <?php endif; ?>
     </div>
