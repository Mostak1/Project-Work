<?php session_start();
require __DIR__ . '/vendor/autoload.php';
$page = "Previous order";
?>
<?php

use App\db;

$conn = db::connect();
?>

<?php require __DIR__ . '/components/header.php'; ?>
<?php require __DIR__ . '/components/bodyheader.php'; ?>

<div style="min-height: 500px;" class="container">


  <table class="table">
    <thead>
      <tr>
        <th scope="col">Order Time</th>
        <th scope="col">Billing Address</th>
        <th scope="col">Shipping Address</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $s_id = $_SESSION['userid'];
      // echo $s_id;

      $q = "SELECT * FROM `order`where user_id  = $s_id";
      $result = $conn->query($q);
      while ($row = $result->fetch_assoc()) {

      ?>
        <tr>
          <th scope="row"><?= $row['order_date'] ?></th>
          <td><?= $row['b_address'] ?></td>
          <td><?= $row['s_address'] ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

</div>

<?php
require __DIR__ . '/components/footer.php';
$conn->close();
?>