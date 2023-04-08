<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';

use App\db;

$conn = db::connect();

$id = $_GET['id'];



// $q = "SELECT `o.id`, `u.first_name` u_name, `o.total`, `o.discount`, `o.comment`, `o.payment`, `o.trxid`, `o.status`, `o.b_address`, `o.s_address`, `o.created_at` FROM `order` o,`users` u WHERE o.id = '$id' && o.user_id=u.id";
$q = "select o.id,u.first_name u_name,o.total,o.discount,o.comment,o.payment,o.trxid,o.status,o.b_address,o.s_address,o.created_at from `order` o,`users` u where o.id='$id' && o.user_id=u.id ";
$result = $conn->query($q);
$row = $result->fetch_assoc();
$qq = "select * from `order` where id='$id'";
$resr=$conn->query($qq);
$row1=$resr->fetch_assoc();
if(isset($_POST['subm'])){
    $stat=$_POST['status'];
    $sql= "UPDATE `order` SET `status`='$stat' WHERE `id`='$id'";
    $results3= $conn->query($sql);
    if($stat="Recived"){
        header("location: order_display.php");
    }else{

    }
    
    // if($results3){
    //     header("location: order_display.php");
    // }
};
?>

<?php require __DIR__ . '/../components/header.php'; ?>
</head>
<style>
    hr {
        margin-top: 1rem;
        margin-left: 30px;
        margin-right: 30px;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, .1);
        box-sizing: content-box;
        height: 1;
        overflow: visible;
    }
</style>

<body>
    <?php require __DIR__ . '/../components/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php require __DIR__ . '/../components/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <div style="background-color:RGB(236,243,255)" class="container">
                <div style=" height: 100px; ">
                    <h2 class="mt-4 ms-4">Order Details</h2>
                </div>

                <div style="height:700px; background-color:white" class="body ms-4 me-4">
                    <div class="row">
                        <div style="margin-top: 60px;" class="col-6 text-start">
                            <h3 class="ms-4">Order ID:<?= $id ?></h3>

                        </div>
                        <div style="margin-top: 60px;" class="col-6 text-end">
                            <a style="text-decoration: none; color:black" href=""><span class="me-3"><i class="fa-solid fa-print text-primary"></i> Print</span></a>
                            <a style="text-decoration: none; color:black" href=""><span class=" me-4"><i class="fa-solid fa-file-pdf text-danger"></i> Download</span></a>

                        </div>
                    </div>
                    <div class="logo text-center">
                        <img width="12%" height="60px" src="../assets/img/logo.png" alt="">
                    </div>
                    <hr>
                    <div class="row d-flex justify-content-around">
                        <div class="col-4 ms-4">
                            <h5>From</h5>
                            <p>House:03,Road:10,Block:C <br>
                                Mirpur Dhaka <br> Mobile:01799217813 <br> electro@gmail.com</p>
                        </div>
                        <div class="col-4">
                            <h5>Customer</h5>
                            <p><?= $row['u_name'] ?></p>
                            <h5>Shipping Address</h5>
                            <p><?= $row['s_address'] ?></p>
                        </div>
                        <div class="col-auto">
                            <div><strong>Order ID:</strong><?= $id ?></div>
                            <div><strong>Order Date: <?= $row['created_at'] ?></strong></div>
                        </div>
                    </div>

                    <table class="table mx-1">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Products</th>
                                <th scope="col">Price</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Status</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Sub-total</th>
                            </tr>
                        </thead>
                        <tbody class="table-Secondary">

                            <?php
                            $q = "select * from order_details where order_id = '$id' ";
                            $result = $conn->query($q);
                            $total = 0;
                            while ($row = $result->fetch_assoc()) {

                            ?>
                                <tr>
                                    <th scope="row"><?= $row['order_id'] ?></th>
                                    <td><?= $row['product_id'] ?></td>
                                    <td><?= $row['price'] ?></td>
                                    <td><?= $row['quan'] ?></td>
                                    <td><?= $row1['status'] ?></td>
                                    <td>0.00</td>
                                    <td><?= $subtotal = $row['quan'] * $row['price'] ?> </td>
                                </tr>

                                <?php $total += $subtotal ?>
                            <?php  } ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td> <strong>Tax:</strong> <strong>5%</strong> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td> <strong>Total:</strong> <strong><?= $total+($total*.05) ?></strong> </td>
                            </tr>
                        </tbody>
                    </table>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="input-group w-50">
                            
                            <select name="status" id="status" class="form-control">
                                <option value="Pending"><?= $row1['status'] ?></option>
                                <option value="Pending">Pending</option>
                                <option value="Recived">Recived</option>
                                <option value="Shipping">Shipping</option>
                                <option value="Delivered">Delivered</option>
                            </select>
                            <input type="submit" class="btn btn-outline-danger" value="Change Status" name="subm">
                        </div>
                     
                    </form>
                </div>
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