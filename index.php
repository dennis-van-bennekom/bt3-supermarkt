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
  <title>Supermarkt</title>
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <span class="naam">Aardappelkroketjes</span>
        <span class="prijs">2.13</span>
      </form>

      <form draggable="true" class="product" action="add_product.php" method="post">
        <input type="hidden" name="product" value="Appelmoes">
        <input type="hidden" name="prijs" value="0.55">
        <button>
          <img src="images/appelmoes.jpg" alt="Appelmoes" />
        </button>
        <span class="naam">Appelmoes</span>
        <span class="prijs">0.55</span>
      </form>

      <form draggable="true" class="product" action="add_product.php" method="post">
        <input type="hidden" name="product" value="Bananen">
        <input type="hidden" name="prijs" value="1.29">
        <button>
          <img src="images/bananen.jpg" alt="Bananen" />
        </button>
        <span class="naam">Bananen</span>
        <span class="prijs">1.29</span>
      </form>

      <form draggable="true" class="product" action="add_product.php" method="post">
        <input type="hidden" name="product" value="Casino Wit">
        <input type="hidden" name="prijs" value="1.25">
        <button>
          <img src="images/casino.jpg" alt="Casino Wit" />
        </button>
        <span class="naam">Casino Wit</span>
        <span class="prijs">1.25</span>
      </form>

      <form draggable="true" class="product" action="add_product.php" method="post">
        <input type="hidden" name="product" value="Frikandellen">
        <input type="hidden" name="prijs" value="0.80">
        <button>
          <img src="images/frikandellen.jpg" alt="Frikandellen" />
        </button>
        <span class="naam">Frikandellen</span>
        <span class="prijs">0.80</span>
      </form>

      <form draggable="true" class="product" action="add_product.php" method="post">
        <input type="hidden" name="product" value="Hagelslag">
        <input type="hidden" name="prijs" value="1.35">
        <button>
          <img src="images/hagelslag.jpg" alt="Hagelslag" />
        </button>
        <span class="naam">Hagelslag</span>
        <span class="prijs">1.35</span>
      </form>

      <form draggable="true" class="product" action="add_product.php" method="post">
        <input type="hidden" name="product" value="La Chouffe">
        <input type="hidden" name="prijs" value="4.85">
        <button>
          <img src="images/lachouffe.jpg" alt="La Chouffe" />
        </button>
        <span class="naam">La Chouffe</span>
        <span class="prijs">4.85</span>
      </form>

      <form draggable="true" class="product" action="add_product.php" method="post">
        <input type="hidden" name="product" value="Pindakaas">
        <input type="hidden" name="prijs" value="1.30">
        <button>
          <img src="images/pindakaas.jpg" alt="Pindakaas" />
        </button>
        <span class="naam">Pindakaas</span>
        <span class="prijs">1.30</span>
      </form>

      <form draggable="true" class="product" action="add_product.php" method="post">
        <input type="hidden" name="product" value="Jam">
        <input type="hidden" name="prijs" value="1.25">
        <button>
          <img src="images/jam.jpg" alt="Jam" />
        </button>
        <span class="naam">Jam</span>
        <span class="prijs">1.25</span>
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
