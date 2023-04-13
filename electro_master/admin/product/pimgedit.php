<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';

// use App\auth\Admin;

// if (!Admin::Check()) {
//     header('HTTP/1.1 503 Service Unavailable');
//     exit;
// }

use App\db;

$conn = db::connect();
$id = $_GET['updateid'];
if (isset($_POST['submit'])) {
   $img=$_FILES['image'];
   $imagenm = $img['name'];
    $sql = "UPDATE `products` SET `images`='$imagenm' WHERE `id`='$id'";
    // echo $sql;
    // exit;

    $result = $conn->query($sql);
    if ($result) {
        move_uploaded_file($img['tmp_name'], "../../productimg/".$imagenm);
        header("location:" . settings()['homepage'] . "admin/product/product_display.php");        
    } else {

        echo "Image update invalid";
    }
}
// header("Location:add-product.php");

?>
<?php require __DIR__ . '/../components/header.php'; ?>

</head>

<body class="sb-nav-fixed">
    <?php require __DIR__ . '/../components/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php require __DIR__ . '/../components/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <!-------------------------- display content start--------------------------- -->
            <div class="container">
                <div class="row">
                    <h2>Edit Product Image From Here</h2>
                    <form class="my-5" method="post" enctype="multipart/form-data">
                        <input type="number" hidden  name="id" id="" value="<?=$id ?>">
                        
                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" value="<?=$image1 ?? ""?>" name="image" id="image" class="form-control">
                        </div>



                        <button type="submit" class="btn mx-auto btn-primary" name="submit">Update</button>
                    </form>
                    <!---/ Product Adding Function php --->


                </div>

            </div>
            <!-------------------------- display content end--------------------------- -->


            <!-- footer -->
            <?php require __DIR__ . '/../components/footer.php'; ?>
        </div>
    </div>
    <script src="<?= settings()['adminpage'] ?>assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= settings()['adminpage'] ?>assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="<?= settings()['adminpage'] ?>assets/demo/chart-area-demo.js"></script>
    <script src="<?= settings()['adminpage'] ?>assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="<?= settings()['adminpage'] ?>assets/js/datatables-simple-demo.js"></script>
</body>

</html>