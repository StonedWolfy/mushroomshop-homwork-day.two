<?php
session_start();
require_once 'parts/header.php';
if(isset($_SESSION['cart'])) :
foreach ($_SESSION['cart'] as $product) :
?>
<div class="cart">
    <a href="product.php?product=<?php echo $product['title']; ?>"><img class="img-cart" src="img/<?php echo $product['img'] ?>" alt="Фото>"></a>
    <div class="cart-descr">
        <?php echo $product['rus_name'] ?> в количестве <?php echo $product['quantity']?> шт на сумму <?php echo $product['quantity']*$product['price']?> рублей
    </div>
    <button type="submit">Удалить</button>
</div>
<?php endforeach; ?>
<?php else : ?>
<div class="cart">
  <div class="cart-descr">
    Товаров в корзине нет
  </div>
</div>
<?php
endif;
require_once 'parts/footer.php';