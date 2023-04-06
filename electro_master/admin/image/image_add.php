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


// $sql = "INSERT INTO `images`(`p_id`, `name`, `title`) VALUES ('[value-1]','[value-2]','[value-3]') ";
// // echo $sql;
// // exit;

// $result = $conn->query($sql);
// if ($result) {
//     move_uploaded_file($image['tmp_name'], settings()['homepage'] . "productimg/" . $image['name']);
//     $insert = "Product data inserted";
// } else {

//     echo "data inserted invalid";
// }

// header("Location:add-product.php");


?>
 <?php
          
            if (isset($_POST['submit'])) {
                $pid = $_POST['pid'];
                $name = $_FILES['image']['name'];
                $extn = pathinfo($name[0], PATHINFO_EXTENSION);
                //echo $extn .'<br>'; // outputs 'jpg'
                $cust = $_POST['nm'];
                $carr = explode(',', $cust);
                //                echo $carr[0] .'<br>'; name input from user
                

                $total = count($_FILES['image']['name']);
                for ($i = 0; $i < $total; $i++) {
                    $image = $_FILES['image'];
                    $imagenm = $image['name'][$i];
                    $tempnm = $image['tmp_name'][$i];
                    $newnm =  $pid . $i . "." . $extn;
                    // echo $newnm . ",";
                    $sql = "INSERT INTO `images`(`p_id`, `name`) VALUES ('$pid','$newnm')";
                    // $sql = "INSERT INTO `images`(`p_id`, `name`, `title`) VALUES ('$pid','$newnm',$title)";
                    // echo $sql;
                    // exit;
                    $result = $conn->query($sql);
                    $loca = "../../productimg/" . $newnm;
                    move_uploaded_file($tempnm, $loca);
                }
            }
            ?>
<?php require __DIR__ . '/../components/header.php'; ?>

</head>

<body class="sb-nav-fixed">
    <?php require  __DIR__ . '/../components/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php require __DIR__ . '/../components/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <!-------------------------- display content start--------------------------- -->
            <div class="container">
                <div class="row">
                    <h2>Add Product images From Here</h2>
                    <h3 class="text-danger">

                        <?= $insert ?? "" ?>
                    </h3>
                    <form class="my-5" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nm" class="form-label">Product Title:</label>
                            <input type="text" name="nm" id="nm" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Product ID:</label>
                            <input type="number" name="pid" id="pid" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" name="image[]" id="image" class="form-control" multiple>
                        </div>
                        <button type="submit" class="btn mx-auto btn-primary" name="submit">Submit</button>
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