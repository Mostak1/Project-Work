<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';
use App\db;
$conn = db::connect();
?>

<?php
$id = $_GET['id'];
$old = "select * from roles where id = '$id'";
$oldResult = $conn->query($old)->fetch_assoc();

if (isset($_POST['update'])) {
    $uid = $_POST['id'];
    $rank = $_POST['rank'];

    $sql = "UPDATE `roles` SET `id`='$uid',`rank`='$rank' WHERE id = '$uid'";
    $result = $conn->query($sql);
    if ($conn->affected_rows) {
        header("location:roledisplay.php");
    } else {
        echo "data update invalid";
    }
}
?>
<?php require __DIR__ . '/../components/header.php';


//get records value and show in form
?>
</head>

<body class="sb-nav-fixed">
    <?php require __DIR__ . '/../components/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php require __DIR__ . '/../components/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <!-------------------------- display content start--------------------------- -->
            <div class="container">
                <div class="row">
                    <h2 class="text-center text-primary">Edit Role From Here</h2>

                    <form class="login-form  " action="" method="post">
                        <div>
                            <label class="form-label" for="">Id</label>
                            <input class="form-control" type="text" name="id" value="<?=$oldResult['id']?>" placeholder="Id" required>
                        </div>
                        <div>
                            <label class="form-label mt-3" for="">Role</label>
                            <input class="form-control" type="text" name="rank" value="<?=$oldResult['rank']?>" placeholder="Rank">
                        </div>
                        <input class="btn btn-outline-primary mt-3" type="submit" name="update" value="Update">
                    </form>
                </div>
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