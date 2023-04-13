<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';
use App\db;
$conn = db::connect();
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql4="UPDATE `order` SET `status`='Recived' WHERE `id`='$id' limit 1";
    // $sql1 = "delete from order where id='{$id}' limit 1";
    $conn->query($sql4);
    $sql1 = "SELECT * FROM `order_details` where `order_id`='{$id}' limit 1";
    $res1=$conn->query($sql1);
    $row1=$res1->fetch_assoc();
    $pid=$row1['product_id'];
    $pqua=$row1['quan'];
    $sql2="SELECT * FROM `products` WHERE `id`='$pid' limit 1";
    $res2=$conn->query($sql2);
    $row2=$res2->fetch_assoc();
    $qan=$row2['quantity'];
    $hot=$row2['hot'];
    $qanr=$qan-$pqua;
    $hot1=$hot+1;
    $sql3="UPDATE `products` SET `quantity`='$qanr',`hot`='$hot1' WHERE `id`='$pid' limit 1";
    $qer=$conn->query($sql3);
    if($conn->affected_rows){
        header("location: order_display.php");
    }
    else{
        die("Error!! Error!!! Error!!!");
        exit;
    }
}
?>