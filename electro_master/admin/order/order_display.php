<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';

use App\db;

$conn = db::connect();
if (isset($_POST['addBtn'])) {


    $uid = $_POST['uid'];
    $total = $_POST['total'];
    $dis = $_POST['dis'];
    $com = $_POST['com'];
    $pay = $_POST['pay'];
    $trx = $_POST['trx'];
    $status = $_POST['status'];
    $b_address = $_POST['b_address'];
    $s_address = $_POST['s_address'];


    $sql = "INSERT INTO `order`( `user_id`, `total`, `discount`, `comment`, `payment`, `trxid`, `status`, `b_address`, `s_address`) VALUES ('$uid','$total','$dis','$com','$pay','$trx','$status','$b_address','$s_address')";

    $result = $conn->query($sql);
    if ($conn->affected_rows) {
        header("location:order_display.php");
    } else {
        echo "Error";
    }
}
?>
<?php require __DIR__ . '/../components/header.php'; ?>
</head>

<body onload="run()" class="sb-nav-fixed">
    <?php require __DIR__ . '/../components/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php require __DIR__ . '/../components/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <!-------------------------- display content start--------------------------- -->
            <div class="container">
                <h1 class="text-primary text-center mt-4 mb-4">Order Management</h1>
                <div class="d-flex justify-content-between">
                    <div>
                        <?php if (isset($_GET['search'])) { ?>
                            <span>Search result for <?= $_GET['search'] ?></span>
                        <?php } ?>
                    </div>
                    <form action="" class="d-flex mb-2">
                        <input type="search" class="form-control" name="search" id="search">
                        <input type="submit" class="ms-1 btn btn-outline-primary" value="Search">
                    </form>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <?php
                            $pd = "select * from `order` where `status` = 'Delivered'";
                            $resd = $conn->query($pd);
                            $qud = $resd->num_rows;

                            ?>
                            <div class="card-body">Product Delivered <?= $qud ?></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" v="<?=settings()['adminpage']?>order/delivered" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <?php
                            $ps = "select * from `order` where `status` = 'Shipping'";
                            $ress = $conn->query($ps);
                            $qus = $ress->num_rows;

                            ?>
                            <div class="card-body">Shipping <?=$qus ?></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" v="<?=settings()['adminpage']?>order/shipping" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                        <?php
                                    $pr= "select * from `order` where `status` = 'Recived'";
                                    $resr= $conn->query($pr);
                                    $qur= $resr->num_rows;
                                    
                                ?>
                            <div class="card-body">Recived Order <?=$qur?></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" v="<?=settings()['adminpage']?>order/recived" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                        <?php
                                    $pp1= "select * from `order` where `status` = 'Pending'";
                                    $resp= $conn->query($pp1);
                                    $qup= $resp->num_rows;
                                    
                                ?>
                            <div class="card-body">Pending Orders <?=$qup?></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" v="<?=settings()['adminpage']?>order/pending" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>


                <table class="table table-primary mt-4">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Total</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Payment</th>
                            <th scope="col">TrxID</th>
                            <th scope="col">Status</th>
                            <th scope="col">Billing Address</th>
                            <th scope="col">Shipping Address</th>
                            <th colspan="3" scope="col">Opration</th>
                        </tr>
                    </thead>
                    <tbody id="content">
                        <?php
                        $sql = "select o.id,u.first_name u_name,o.total,o.discount,o.comment,o.payment,o.trxid,o.status,o.b_address,o.s_address from `order` o,`users` u where o.user_id=u.id ORDER BY id DESC";
                        $result = $conn->query($sql);
                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['u_name']; ?></td>
                                    <td><?= $row['total']; ?></td>
                                    <td><?= $row['discount']; ?></td>
                                    <td><?= $row['comment']; ?></td>
                                    <td><?= $row['payment']; ?></td>
                                    <td><?= $row['trxid']; ?></td>
                                    <td><?= $row['status']; ?></td>
                                    <td><?= $row['b_address']; ?></td>
                                    <td><?= $row['s_address']; ?></td>
                                    <td>
                                        <a class="btn btn-outline-primary" href="recivedorder.php?id=<?= $row['id']; ?>">Accept</a>
                                        <a class="btn btn-outline-primary" href="manageorder.php?id=<?= $row['id']; ?>">Details</a>
                                        <a class="btn btn-outline-danger" href="order_delete.php?id=<?= $row['id']; ?>">Cancel</a>
                                    </td>

                                </tr>
            <?php
                            }
                        }
            ?>
                    </tbody>
                </table>

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

    <script>
        function run() {
            document.getElementById("formContainer").style.display = "none";
        }

        function toggleForm() {
            if (document.getElementById("formContainer").style.display == "none") {
                document.getElementById("formContainer").style.display = "block";
            } else {
                document.getElementById("formContainer").style.display = "none";
            }
        }

        function closeForm() {
            document.getElementById("formContainer").style.display = "none";
        }
    </script>
    <script src="../assets/js/jquery-3.6.3.min.js"></script>
    <script>
        $(document).ready(function(){
            $('a').on("click",  function () {
				// e.preventDefault();
				// alert($(this).attr("v"));
                // alert("Click")
				var loadfile = $(this).attr("v") + ".php";
				
				$('#content').fadeOut(100, function () {
					$('#content').load(loadfile).fadeIn(600);
				});

				//
			});
           
        })
    </script>
</body>
    $("a").click(function(){
                // alert($(this).data("page"))
                $("#content").load($(this).data("page"));
            })
</html>