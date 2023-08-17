<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};

require __DIR__ . '/vendor/autoload.php';
?>
<?php
use App\db;
$conn = db::connect();
?>
<?php

$user = $_SESSION['userid'] ?? '';

$count = "SELECT COUNT(id) FROM wishlist where user_id = '$user'";
$result = $conn->query($count);
$count = $result->fetch_column();
echo ($count);
// echo ($a) ;

// $q = "select * from wishlist where user_id = '$user'";
// $res = $conn->query($q);

// while($row = $res->fetch_assoc()){

    // $data = array(
    //     array('user' => $row['user_id'], 'product' => $row['product_id'])
    // );
    // echo json_encode($data);

    // echo $row['user_id'];
    // echo $row['product_id'];
// }

?>
