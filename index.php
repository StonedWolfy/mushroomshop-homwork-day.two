<?php
require_once 'parts/header.php';
if (isset($_GET['cat'])) {
  $currentCat = $_GET['cat'];
  $catswhere = "WHERE cat = '$currentCat'";
}
$products = $connect->query("SELECT * FROM products $catswhere");
$products = $products->fetchAll(PDO::FETCH_ASSOC);
if (count($products) > 0) :
?>
<div class="main">
  <?php foreach ($products as $product) : ?>
    <div class="card">
      <a href="product.php?product=<?php echo $product['title']; ?>">
        <img class="img-index" src="img/<?php echo $product['img']; ?>" alt="<?php echo $product['rus_name']; ?>">
      </a>
      <div class="label"><?php echo $product['rus_name']; ?> (<?php echo $product['price']; ?> рублей)</div>
      <form action="action/add.php" method="post">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <button type="submit">Добавить в корзину</button>
      </form>
    </div>
  <?php endforeach; ?>
</div>
<?php else : ?>
  <h1 class="errobtn-text">Ты зашёл не сюда</h1>
  <a class="errobtn" href="index.php">Вернутся назад</a>
<?php
endif;
require_once 'parts/footer.php';