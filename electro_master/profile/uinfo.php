<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../vendor/autoload.php';
$page = "Profile";

use App\db;

$conn = db::connect();
$uid = $_SESSION['userid'];

                    $sql = "SELECT * FROM `users` WHERE `id`='$uid'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();

                    ?>
                    <h1 class="text-center py-3">Information of <?= $row['first_name'] ?> <?= $row['last_name'] ?> </h1>
                    <hr>
                    <div class="row ps-5 pb-2">
                        <div class="col-3">
                            Name 
                        </div>
                        <div class="col-8">
                            : <?= $row['first_name'] ?> <?= $row['last_name'] ?>
                        </div>
                    </div>
                    <div class="row ps-5 pb-2">
                        <div class="col-3">
                            Email 
                        </div>
                        <div class="col-8">
                           : <?= $row['email'] ?>
                        </div>
                    </div>
                    <div class="row ps-5 pb-2">
                        <div class="col-3">
                            Address 
                        </div>
                        <div class="col-8">
                           : <?= $row['home'] ?>
                           , <?= $row['city'] ?>
                           , <?= $row['state'] ?>
                        </div>
                    </div>
                    <div class="row ps-5 pb-2">
                        <div class="col-3">
                            Postal Code 
                        </div>
                        <div class="col-8">
                           : <?= $row['postal_code'] ?>
                          
                        </div>
                    </div>
                    <div class="row ps-5 pb-2">
                        <div class="col-3">
                            Mobile Number 
                        </div>
                        <div class="col-8">
                           : <?= $row['phone'] ?>
                          
                        </div>
                    </div>