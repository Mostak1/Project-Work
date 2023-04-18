<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';

use App\db;

$conn = db::connect();
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `users` WHERE `id` = '$id'";
    $result = $conn->query($sql);
    if ($conn->affected_rows) {
        header("location:user_ddisplay.php");
    }
}

?>
