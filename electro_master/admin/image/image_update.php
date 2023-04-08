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

$sql1 = "select * from `images` where id=$id";
$result1 = $conn->query($sql1);
$row = $result1->fetch_assoc();
$pid1 = $row['p_id'];
$title1 = $row['title'];
$image1 = $row['name'];

if (isset($_POST['submit'])) {
    $image = $_FILES['image'];
    $imagenm = $image['name'];
    $imgnm = $_POST['imgnm'];
    $extn = pathinfo($imagenm[0], PATHINFO_EXTENSION);
    $newnm = $imgnm."." .$extn;
    $sql = "UPDATE `images` SET `name`='$newnm',`title`='$title' WHERE `id`='$id'";
    // echo $sql;
    // exit;
    $result = $conn->query($sql);
    if ($result) {
        move_uploaded_file($image['tmp_name'],"../../productimg/" . $newnm);
        $comm= "Image data Updated successfully";
    } else {
        $comm= "Data Not Updated ";
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
                    <h2>Edit Image</h2>
                    <h4 class="text-center text-info"><?php echo $comm ?? "" ?></h4>
                    <form class="my-5" method="post" enctype="multipart/form-data">
                        <input type="number" name="" hidden placeholder="<?= $id ?>" id="">
                        <input class="form-control" type="number" name="p_id" id="p_id" placeholder="<?=$pid1 ?? "" ?>" hidden>
                        <div class="mb-3">
                            <label for="imgnm" class="form-label">Image Name:</label>
                            <input class="form-control" type="text" name="imgnm" id="imgnm" placeholder="<?=$image1 ?? "" ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" name="image" id="image" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" height="2" name="title" id="title" placeholder="<?=$title1 ?? "" ?>" class="form-control">
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