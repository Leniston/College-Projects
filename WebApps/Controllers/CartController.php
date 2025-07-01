
<?php
// Start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../Models/cart.php';
require_once '../common.php';

// Process add to cart action
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $title = $_POST['title'];
    $price = $_POST['price'];

    Cart::addToCart($product_id, $title, $price);

    //set a flag for success message
    $_SESSION['added_to_cart'] = true;

    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/Views/Shop.php';
    header("Location: $redirect");
    exit();
}

// Process update cart action
if (isset($_POST['update_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    Cart::updateCartItem($product_id, $quantity);

    // Redirect back to cart page
    header("Location: /Views/viewCart.php");
    exit();
}

// Process remove from cart action
if (isset($_POST['remove_from_cart'])) {
    $product_id = $_POST['product_id'];

    Cart::removeCartItem ($product_id);

    // Redirect back to cart page
    header("Location: /Views/viewCart.php");
    exit();
}
