<?php
require_once "parts/header.php";
if (isset($_GET['product']));
 $CurrentProduct =  $_GET['product'];
 $product = $connect->query("SELECT * FROM products WHERE title='$CurrentProduct'");
 $product = $product->fetch(PDO::FETCH_ASSOC); 
 ?>
 <?php
if ($product) :
 ?>
<div class="product-card">
  <a href="index.php">Вернуться на главную</a>

  <h2><?php echo $product['title']; ?>(<?php echo $product['price']; ?> рублей)</h2>
    <img class="img-index" src="img/<?php echo $product['img']; ?>" alt="Фото">
  </div>
    <div class="product-card"><div class="descr"><?php echo $product['descr']; ?></div>
   <form action="action/add.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $product['id']?>">
        <input type="submit" value="Добавить в корзину">
   </form>
</div>
<?php else : ?>
  <h1 class="errobtn-text">Ты зашёл не сюда</h1>
  <a class="errobtn" href="index.php">Вернутся назад</a>
<?php
endif;
require_once 'parts/footer.php';