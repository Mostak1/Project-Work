<?php
require __DIR__ . '/vendor/autoload.php';
use App\db;
$conn = db::connect();
if(isset($_GET['deleteid'])){
$id=$_GET['deleteid'];

$sql = "delete from `wishlist` where id = '$id' limit 1";
$result = $conn->query($sql);
if($result){
    // echo "Deleted successfully";
header('location:'.settings()['homepage'].'/wishshow.php');
}else{
    die(mysqli_error($conn));
}
}

?>