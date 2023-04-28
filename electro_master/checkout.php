<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){

}
else{
    echo "You are not logged in";
    exit;
}
if(isset($_POST['action']) && $_POST['action']=="checkout"){
    // t: total,
    //       d:discount,
    //       p:payment,
    //       trx:trxid,
    //       c:comment,
    $conn = new mysqli("localhost","root","","electro_master");

    $total  = $_POST['t'];
    $dis  = $_POST['d'];
    $payment  = $_POST['p'];
    $trx  = $_POST['trx'];
    $comment  = $_POST['c'];
    $b_address = $_POST['b'];
    $s_address = $_POST['s'];
    $items  = $_POST['items'];
    $user = $_SESSION['userid'];
    // var_dump($items);
    // exit;
    $tst = "INSERT INTO `order`(`user_id`, `total`, `discount`, `comment`, `payment`, `trxid`, `status`,`b_address`,`s_address`) VALUES ('$user','$total','$dis','$comment','$payment','$trx','Pending','$b_address','$s_address')";
    file_put_contents("test.txt","$tst");

    $insertq = "INSERT INTO `order`(`user_id`, `total`, `discount`, `comment`, `payment`, `trxid`, `status`,`b_address`,`s_address`) VALUES ('$user','$total','$dis','$comment','$payment','$trx','Pending','$b_address','$s_address')";
    $conn->query($insertq);

    if($conn->affected_rows){
        $invoiceid = $conn->insert_id;//invoice id
        foreach ($items as $item) {
            $p_id = $item['id'];
            $p_price = $item['pprice'];
            $qun = $item['quantity'];
            $q = "INSERT INTO `order_details`(`order_id`, `product_id`, `price`, `quan`, `op`) VALUES ('$invoiceid','$p_id','$p_price','$qun','op')";
            $conn->query($q);
        }
        echo json_encode(['success' => true, 'invoiceid'=>$invoiceid]);
    }
    else{
        echo json_encode(['success' => false, 'invoiceid'=>null]); 
    }
        

}
?>

