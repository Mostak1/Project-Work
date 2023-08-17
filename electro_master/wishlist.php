<?php session_start();
require __DIR__ . '/vendor/autoload.php';
?>
<?php
use App\db;
$conn = db::connect();
?>
<?php

$user = $_SESSION['userid'];
echo $user;
$product_id = $_POST['productId'];
echo "success";
echo $product_id;

$sql = "INSERT INTO `wishlist`(`user_id`, `product_id`) VALUES ('$user','$product_id')";
// file_put_contents('text.txt',$sql);
$result = $conn->query($sql);


$count = "SELECT COUNT(id) FROM wishlist";
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
