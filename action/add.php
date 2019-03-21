<?php
session_start();
require_once '../DB/db.php';

if (isset($_POST['id'])){
    $id = $_POST['id'];

    $product = $connect->query("SELECT * FROM products WHERE id='$id'");
    $product = $product->fetch(PDO::FETCH_ASSOC); 
    $_SESSION['TotalQuantity'] = $_SESSION['TotalQuantity'] ? $_SESSION['TotalQuantity'] += 1 : 1;
    $_SESSION['TotalPrice'] = $_SESSION['TotalPrice'] ? $_SESSION['TotalPrice'] += $product['price'] : $product['price'];

     if (isset($_SESSION['cart'][$id])) {
         $_SESSION['cart'][$id]['quantity'] += 1;;
     }
    else{
    $_SESSION['cart'][$id] = $product;
    $_SESSION['cart'][$id]['quantity'] = 1;
   }
}
header ("Location: ".$_SERVER['HTTP_REFERER']);