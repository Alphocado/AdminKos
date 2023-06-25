<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src/css/style.css">
  <title>Pemesanan Kamar Kos</title>
</head>
<body>
  <input type="hidden" value="<?=$currentDateTime?>" name="datetime">
  <form class="container" method="post" action="src/server/save_order.php">
    <h1>Pemesanan Kamar Kos</h1>

    <div class="products">
      <div class="product satu">
        <h3>Kamar Satu</h3>
        <p>Harga: Rp200.000 / Hari</p>
        <p>Fasilitas: AC, WiFi, Kamar Mandi dalam</p>
        <input type="number" class="quantity-input" min="1" placeholder="Jumlah Hari" id="jumlah-hari">
        <button type="button" class="buy-btn" data-price="200000">Pesan</button>
      </div>

      <div class="product dua">
        <h3>Kamar Dua</h3>
        <p>Harga: Rp250.000 / Hari</p>
        <p>Fasilitas: AC, WiFi, Kamar Mandi dalam</p>
        <input type="number" class="quantity-input" min="1" placeholder="Jumlah Hari" id="jumlah-hari">
        <button type="button" class="buy-btn" data-price="250000">Pesan</button>
      </div>

      <div class="product tiga">
        <h3>Kamar Tiga</h3>
        <p>Harga: Rp300.000 / Hari</p>
        <p>Fasilitas: AC, WiFi, Kamar Mandi dalam, TV</p>
        <input type="number" class="quantity-input" min="1" placeholder="Jumlah Hari" id="jumlah-hari">
        <button type="button" class="buy-btn" data-price="300000">Pesan</button>
      </div>
    </div>

    <h2>Total Biaya Kamar / Hari</h2>

    <!-- disini -->
    <div class="cart-items">
    </div>

    <div class="total-price">
      <span>Total:</span>
      <span id="total-price">Rp0</span>
    </div>

    <div class="total-hari">
      <span>Jumlah Hari: </span>
      <span id="total-hari">0</span>
    </div>

    <div class="container-pemesanan">
      <h2>Input Name and Age</h2>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
      <label for="age">Age:</label>
      <input type="number" id="age" name="age" min="1" required>
    </div>


    <button id="checkout-btn" type="input">Checkout</button>

  </form>
  
  <?php
    if(isset($_GET["error"])){
      ?>
      <script>
        alert("<?=$_GET["error"]?>");
      </script>
      <?php
    }
  ?>
  <script src="src/Js/app.js">
  </script>
</body>
</html>
