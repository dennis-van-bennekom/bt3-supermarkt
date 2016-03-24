<?php
session_start();

if (!isset($_SESSION['winkelmand'])) {
  $_SESSION['winkelmand'] = [];
}

function total() {
  $total = 0;

  foreach($_SESSION['winkelmand'] as $product) {
    $total += $product['prijs'];
  }

  return $total;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Task List</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="wrapper">
    <section class="winkel">
      <form draggable="true" class="product" action="add_product.php" method="post">
        <input type="hidden" name="product" value="Aardappelkroketjes">
        <input type="hidden" name="prijs" value="2.13">
        <button>
          <img src="images/aardappelkroketjes.jpg" alt="Aardappelkroketjes" />
        </button>
        <span class="prijs">2.13</span>
      </form>

      <form draggable="true" class="product" action="add_product.php" method="post">
        <input type="hidden" name="product" value="Appelmoes">
        <input type="hidden" name="prijs" value="0.55">
        <button>
          <img src="images/appelmoes.jpg" alt="Appelmoes" />
        </button>
        <span class="prijs">0.55</span>
      </form>

      <form draggable="true" class="product" action="add_product.php" method="post">
        <input type="hidden" name="product" value="Bananen">
        <input type="hidden" name="prijs" value="1.29">
        <button>
          <img src="images/bananen.jpg" alt="Bananen" />
        </button>
        <span class="prijs">1.29</span>
      </form>
    </section>

    <section class="winkelmand">
      <h1>Winkelmand</h1>
      <div class="drop-area">
        <img src="images/winkelmand.svg" alt="Winkelmand" />
      </div>

      <div class="producten">
        <ul class="producten-lijst">
          <?php foreach ($_SESSION['winkelmand'] as $product) { ?>
            <li>
              <form action="remove_product.php" method="post">
                <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                <button>x</button>
                <?php echo $product['product'] ?> <small class="prijs"><?php echo $product['prijs'] ?></small>
              </form>
            </li>
          <?php } ?>
        </ul>
      </div>

      <hr>

      <span class="totaal">Totaal: <span class="prijs"><?php echo total() ?></span></span>
    </section>
  </div>

  <script src="js/main.js"></script>
</body>
</html>
