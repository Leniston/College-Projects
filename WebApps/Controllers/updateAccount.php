
<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true)
{
    header("Location: /Views/auth/sign_in.php");
    exit();
}

require_once '../Config/DBconnect.php';
require_once '../common.php';

//process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];

    //sanitise & Validate
    $first_name = trim($_POST['firstName']);
    $last_name = trim($_POST['lastName']);
    $address = trim($_POST['address']);
    $email = trim($_POST['email']);
    $contact_number = trim($_POST['contactNumber']);
   
    $errors = [];

    // verify the email is valid
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format"; 
    }
    //verify no fields are empty
    if (empty($first_name) || empty($last_name) || empty($address) || empty($email) || empty($contact_number)) {
        $errors[] = "All fields are required";
    }

    if (empty($errors)) {
        try{
            $sql = "UPDATE users SET
            first_name = :first_name,
            last_name = :last_name,
            address = :address,
            email = :email,
            contact_number = :contact_number
            WHERE id = :user_id";

            $stmt = $connection->prepare($sql);

            $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
            $stmt->bindParam(':address', $address, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':contact_number', $contact_number, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            
            $stmt->execute();

            $_SESSION['account_updated'] = true;

            header("Location: /Views/accountManagement.php");
            exit();
        } catch (PDOexception $e) {
            $errors[] = "Database error: ". $e->getMessage();
        }
    }

    if (!empty($errors)) {
        $_SESSION['update_errors'] = $errors;
        header("Location: /Views/accountManagement.php");
        exit();

    }
}
    