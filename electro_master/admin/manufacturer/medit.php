<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';

use App\db;

$conn = db::connect();
$id = $_GET['id'];
if (isset($_POST['addBtn'])) {


    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $loca = $_POST['loca'];
    $propiter = $_POST['propiter'];
    $sql = "UPDATE `manufacturers` SET `name`='$name',`mobile`='$mobile',`location`='$loca',`propiter`='$propiter' WHERE `id`=$id";
    $result = $conn->query($sql);

    if ($conn->affected_rows) {
        header("location:" . settings()['homepage'] . "admin/manufacturer/mdisplay.php");
    } else {
        echo "code error";
    }
}
?>
<?php require __DIR__ . '/../components/header.php'; ?>
</head>

<body  class="sb-nav-fixed">
   
    <?php require __DIR__ . '/../components/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php require __DIR__ . '/../components/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <!-------------------------- display content start--------------------------- -->
            <?php
                            $sql = "select * from `manufacturers` where id=$id";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            ?>
                              
            <div class="container">
                <h1 class="text-primary text-center mt-4 mb-4">Manufacturer Edit</h1>
                <form action="" method="post">
                    <input type="text" value="<?= $id?>" name="" id="" hidden>
                    <div class="">
                        <label class="" for="name">Company Name:</label>
                        <input class="form-control" type="text" value="<?= $row['name']; ?>" name="name" >
                    </div>
                    <div class="mt-2">
                        <label class="" for="mobile">Mobile:</label>
                        <input class="form-control" value="<?= $row['mobile']; ?>" type="text" name="mobile" >
                    </div>
                    <div class="mt-2">
                        <label class="" for="loca">Address:</label>
                        <input class="form-control" value="<?= $row['location']; ?>" type="text" name="loca" >
                    </div>
                    <div class="mt-2">
                        <label class="" for="propiter">Propiter Name:</label>
                        <input class="form-control" value="<?= $row['propiter']; ?>" type="text" name="propiter" >
                    </div>
                    <div class="mt-2 mx-auto text-center w-25">
                       <input class="btn btn-outline-info" type="submit" value="Update" name="addBtn">
                    </div>
                </form>
               

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