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
$old = "select * from user_details where id = '$id'";
$oldResult = $conn->query($old)->fetch_assoc();

if (isset($_POST['update'])) {
    $uid = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pcode = $_POST['pcode'];
    $phn = $_POST['phn'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $b_addresss = $_POST['b_addresss'];
    $s_addresss = $_POST['s_addresss'];

    $sql = "UPDATE `user_details` SET `first_name`='$fname',`last_name`='$lname',`city`='$city',`state`='$state',`postal_code`='$pcode',`phone`='$phn',`email`='$email',`password`='$pass',`billing_address`='$b_address',`shipping_address`='$s_address' WHERE id = '$uid'";
    $result = $conn->query($sql);
    if ($conn->affected_rows) {
        header("location:user_ddisplay.php");
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
                    <h2 class="text-center text-primary">Edit User Details From Here</h2>

                    <form class="login-form  " action="" method="post">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div>
                            <label class="form-label" for="">First Name</label>
                            <input class="form-control" type="text" name="fname" value="<?=$oldResult['first_name']?>" >
                        </div>
                        <div>
                            <label class="form-label" for="">Last Name</label>
                            <input class="form-control" type="text" name="lname" value="<?=$oldResult['last_name']?>" >
                        </div>
                        <div>
                            <label class="form-label" for="">City</label>
                            <input class="form-control" type="text" name="city" value="<?=$oldResult['city']?>" >
                        </div>
                        <div>
                            <label class="form-label" for="">State</label>
                            <input class="form-control" type="text" name="state" value="<?=$oldResult['state']?>">
                        </div>
                        <div>
                            <label class="form-label" for="">Postal Code</label>
                            <input class="form-control" type="text" name="pcode" value="<?=$oldResult['postal_code']?>">
                        </div>
                        <div>
                            <label class="form-label" for="">Phone</label>
                            <input class="form-control" type="text" name="phn" value="<?=$oldResult['phone']?>">
                        </div>
                        <div>
                            <label class="form-label" for="">Email</label>
                            <input class="form-control" type="email" name="email" value="<?=$oldResult['email']?>" >
                        </div>
                        <div>
                            <label class="form-label" for="">Password</label>
                            <input class="form-control" type="password" name="pass" value="<?=$oldResult['password']?>">
                        </div>
                        <div>
                            <label class="form-label" for="">Billing Address</label>
                            <input class="form-control" type="text" name="b_address" value="<?=$oldResult['billing_address']?>" >
                        </div>
                        <div>
                            <label class="form-label" for="">Shipping Address</label>
                            <input class="form-control" type="text" name="s_address" value="<?=$oldResult['shipping_address']?>" >
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