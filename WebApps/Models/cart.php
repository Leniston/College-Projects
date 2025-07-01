<?php
class Cart
{
    public static function addToCart($product_id, $title, $price, $quantity = 1)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        // if product already in cart increase quant
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        } else {
            // Add new product to cart
            $_SESSION['cart'][$product_id] = array(
                'title' => $title,
                'price' => $price,
                'quantity' => $quantity
            );
        }
    }

    //update cart item qunantity
    public static function updateCartItem($product_id, $quantity)
    {
        if (isset($_SESSION['cart'][$product_id])) {
            //if quantity is 0 or less then remove item from cart
            if ($quantity <= 0) {
                self::removeCartItem($product_id);
            } else {
                $_SESSION['cart'][$product_id]['quantity'] = $quantity;
            }
            return true;
        }
        return false;
    }

//remove item from cart
    public static function removeCartItem($product_id)
    {
        if (isset($_SESSION['cart'][$product_id])) {
            unset($_SESSION['cart'][$product_id]);
            return true;
        }
        return false;
    }

//get cart contents
    public static function getCartContents()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        return $_SESSION['cart'];
    }

    public static function getCartTotal()
    {
        $total = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        }
        return $total;
    }
}
?>
