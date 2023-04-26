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
$old = "select * from users where id = '$id'";
$oldResult = $conn->query($old)->fetch_assoc();

if (isset($_POST['update'])) {
    $uid = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];

    $sql = "UPDATE `users` SET `name`='$name',`email`='$email',`password`='$pass',`role`='$role' WHERE id = '$uid'";
    $result = $conn->query($sql);
    if ($conn->affected_rows) {
        header("location:udisplay.php");
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
                    <h2 class="text-center text-primary">Edit Brands From Here</h2>

                    <form class="login-form  " action="" method="post">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div>
                            <label class="form-label" for="">Name</label>
                            <input class="form-control" type="text" name="name" value="<?=$oldResult['name']?>" placeholder="User name" required>
                        </div>
                        <div>
                            <label class="form-label mt-3" for="">Email</label>
                            <input class="form-control" type="email" name="email" value="<?=$oldResult['email']?>" placeholder="Email">
                        </div>
                        <div>
                            <label class="form-label mt-3" for="">Password</label>
                            <input class="form-control" type="password" name="pass" value="<?=$oldResult['password']?>" placeholder="Password">
                        </div>
                        <div>
                            <label class="form-label mt-3" for="">Role</label>
                            <input class="form-control" type="text" name="text" value="<?=$oldResult['role']?>" placeholder="Role">
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