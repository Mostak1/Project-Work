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
    $sql = "delete from categories where id='{$id}' limit 1";
    $conn->query($sql);
    if($conn->affected_rows){
        header("location: cdisplay.php");
    }
    else{
        die("Error!! Error!!! Error!!!");
        exit;
    }
}
?>