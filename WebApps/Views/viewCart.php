<?php
require_once '../Models/cart.php';
require_once '../common.php';

if (session_status() ==PHP_SESSION_NONE) {
    session_start();
}

$cart = Cart::getCartContents();
$total = Cart::getCartTotal();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PaperTrail - Your Cart</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Views/CSS/Style.css" rel="stylesheet">
</head>
<body>
<?php include 'Layouts/Header.php'; ?>

<div class="container my-5">
    <h1 class="mb-4 text-center">Your shopping cart</h1>

    <?php if(empty($cart)): ?>
    <div class="alert alert-info">
        Your cart is empty. <a href="/Views/Shop.php">Why not check out our selection?</a>
    </div>
    <?php else: ?>
    <div class="table-responsive">
         <table class="table table-hover">
             <thead>
             <tr>
                 <th>Title</th>
                 <th>Price</th>
                 <th>Quantity</th>
                 <th>Subtotal</th>
                 <th>Actions</th>
             </tr>
             </thead>
             <tbody>
             <?php foreach ($cart as $product_id => $item): ?>
             <tr>
                 <td><?php echo escape($item['title']); ?></td>
                 <td>€<?php echo escape($item['price']);?></td>
             <td>
             <form action="/Controllers/CartController.php" method="post" class="d-flex align-items-center">
                 <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                 <input type="number" name="quantity" value="<?php echo escape($item['quantity']); ?>" class="form-control" style="width: 100px;">
                 <button type="submit" name="update_cart" class="btn btn-sm btn-outline-secondary ms-2">Update</button>
             </form>
             </td>
                 <td>€<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
             <td>
             <form action="/Controllers/CartController.php" method="post">
                 <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
                 <button type="submit" name="remove_from_cart" class="btn btn-sm btn-danger">Remove</button>
                 </form>
                 </td>
                 </tr>
                 <?php endforeach; ?>
             </tbody>
             <tfoot>
             <tr>
                 <th colspan="3" class="text-end">Total:</th>
                 <th>€<?php echo number_format($total, 2);?></th>
             <th></th>
             </tr>
             </tfoot>
         </table>
</div>
<?php endif; ?>
    <?php include 'Layouts/Footer.php' ; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>