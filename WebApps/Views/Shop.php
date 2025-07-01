<?php
if (session_status() ==PHP_SESSION_NONE) {
    session_start();
}

require_once '../Config/DBconnect.php';
require_once '../Models/Products.php';
require_once '../common.php';

// Create product model instance
$productModel = new Products ($connection);
// Get regular books
$regularBooks = $productModel->getRegularBooks();

$showMessage = false;
if (isset($_SESSION['added_to_cart']))
    if ($_SESSION['added_to_cart'] === true ) {
        $showMessage = true;
        unset($_SESSION['added_to_cart']);
    }
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PaperTrail - Store</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="/Views/CSS/Style.css" rel="stylesheet">
</head>
<body>
<?php include 'Layouts/Header.php'; ?>

<div class="container my-5">
     <h1 class="mb-4 text-center">Shop our collection!</h1>

    <!--success message -->
    <?php if($showMessage): ?>
    <div class="alert alert-success mb-4">
         Item added to cart.
    </div>
    <?php endif; ?>


<div class="row">
    <?php foreach ($regularBooks as $book): ?>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
        <img src="<?php echo escape($book['image_path']); ?>" class="card-img-top mx-auto d-block mt-3" alt="<?php echo escape($book['title']); ?>" style="width: 150px; height: 200px">
<div class="card-body">
    <h5 class="card-title"> <?php echo escape($book['title']); ?></h5>
    <p class="card-subtitle mb-2 text-muted"><?php echo escape($book['author']); ?></p>
    <p class="card-text small"><?php echo  escape($book['description']);?></p>
    <p class="card-text fw-bold">€<?php echo escape($book['price']);?></p>
</div>
        <div class="card-footer bg-white border-top-0">
            <form action="/Controllers/CartController.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo escape($book['id']);?>">
                <input type="hidden" name="title" value="<?php echo escape($book['title']);?>">
                <input type="hidden" name="price" value="<?php echo escape($book['price']);?>">
            <button type="submit" name="add_to_cart" class="btn btn-dark w-100">Add to cart</button>
            </form>
        </div>
    </div>
</div>
    <?php endforeach; ?>
</div>

<?php include 'Layouts/Footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>