<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../vendor/autoload.php';
$page = "Profile";

use App\db;

$conn = db::connect();
$uid = $_SESSION['userid'];
?>
<h1 class="text-center py-3">Order Information of <?= $_SESSION['username'] ?> </h1>
                    <hr>
                    <?php
                $sql = "SELECT * FROM `order` WHERE `user_id`='$uid'";
                    $result = $conn->query($sql);

                    if ($result->num_rows) {
                        while ($row = $result->fetch_assoc()) {

                    ?>
                 
                    <div class="text-center ps-5 pb-2">
                        <div class="">
                            Order No. 
                        </div>
                        <div class="">
                             <?= $row['id'] ?>
                        </div>
                    </div>
                    <div class="row ps-5 pb-2">
                        <div class="col-3">
                            Ammount 
                        </div>
                        <div class="col-8">
                           : <?= $row['total'] ?>
                        </div>
                    </div>
                    <div class="row ps-5 pb-2">
                        <div class="col-3">
                            Payment Methode 
                        </div>
                        <div class="col-8">
                           : <?= $row['payment'] ?>
                           
                        </div>
                    </div>
                    <div class="row ps-5 pb-2">
                        <div class="col-3">
                           Order Status 
                        </div>
                        <div class="col-8">
                           : <?= $row['status'] ?>
                          
                        </div>
                    </div>
                    <div class="row ps-5 pb-2">
                        <div class="col-3">
                            Shipping Address 
                        </div>
                        <div class="col-8">
                           : <?= $row['s_address'] ?>
                          
                        </div>
                    </div>
                    <hr>
                    <?php
                    };
                };
                    ?>