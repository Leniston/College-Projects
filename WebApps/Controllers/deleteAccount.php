<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true ) 
{
    header("Location: /Views/Auth/sign_in.php");
    exit();
}

require_once '../Config/DBconnect.php';

//process the account deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    try {
        $user_id = $_SESSION['user_id'];
        $sql = "DELETE FROM users WHERE id = :user_id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();


        $_SESSION = array ();
        session_destroy();

        //send user back to home with message 
        session_start();
        $_SESSION['account_deleted'] = true;
        header ("location: /Views/Index.php");
        exit();
    } catch (PDOException $e) {
        $_SESSION['delete_error'] = "Error deleting user account:" .$e->getMessage();
        header("Location: /Views/accountManagement.php");
        exit();
    }
    } else {
        header("Location: /Views/accountManagement.php");
        exit();
    
}