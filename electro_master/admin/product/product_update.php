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
$sql1 = "select * from `products` where id=$id";
$result1 = $conn->query($sql1);
$row = $result1->fetch_assoc();
$cat1 = $row['cat_id'];
$bid1 = $row['brand_id'];
$mft1 = $row['manufacturer_id'];
$userid1 = $row['user_id'];
$title1 = $row['title'];
$desc1 = $row['description'];
$dim1 = $row['dimensions'];
$weight1 = $row['weight'];
$pprice1 = $row['pprice'];
$sprice1 = $row['sprice'];
$discount1 = $row['discount'];
$quantity1 = $row['quantity'];
$hot1 = $row['hot'];
$options1 = $row['options'];

if (isset($_POST['submit'])) {
    $cat = $_POST['category_id'];
    $bid = $_POST['brand_id'];
    $mft = $_POST['manufacturer'];
    $userid = $_POST['user_id'];
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $dim = $_POST['dimensions'];
    $weight = $_POST['weight'];
    $pprice = $_POST['pprice'];
    $sprice = $_POST['sprice'];
    $discount = $_POST['discount'];
    $quantity = $_POST['quantity'];
    $hot = $_POST['hot'];
    $options = $_POST['options'];

    $sql = "UPDATE `products` SET `cat_id`='$cat',`brand_id`='$bid',`manufacturer_id`='$mft',`user_id`='$userid',`title`='$title',`description`='$desc',`dimensions`='$dim',`weight`='$weight',`pprice`='$pprice',`sprice`='$sprice',`discount`='$discount',`quantity`='$quantity',`hot`='$hot',`options`='$options' WHERE `id`='$id'";
    // echo $sql;
    // exit;

    $result = $conn->query($sql);
    if ($result) {
        header("location:" . settings()['homepage'] . "admin/product/product_display.php");        
    } else {

        echo "data update invalid";
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
                    <h2>Edit Product From Here</h2>
                    <form class="my-5" method="post" enctype="multipart/form-data">
                        <input type="number" hidden  name="id" id="" value="<?=$id ?>">
                        
                        <div class="row">

                        <div class="mb-3 col-3">
                            <label for="category_id" class="form-label">Category :</label>
                            <select class="form-select mt-4 mb-4" name="category_id" id="">
                                    <?php
                                    $qc = "select * from categories where id= '$cat1'";
                                    $resultc = $conn->query($qc);
                                    $rowc = $resultc->fetch_assoc()
                                    ?>
                                        <option selected value="<?= $rowc['id'] ?>"><?= $rowc['name'] ?></option>
                                   
                                    <?php
                                    $qc1 = "select * from categories where 1";
                                    $resultc1 = $conn->query($qc1);
                                    while ($rowc1 = $resultc1->fetch_assoc()) {
                                    ?>
                                        <option value="<?= $rowc1['id'] ?>"><?= $rowc1['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                        </div>
                            <div class="col-3">
                                <label for="brand_id" class="form-label">Brand:</label>
                                <select class="form-select mt-4 mb-4" name="brand_id" id="brand_id">
                                    <?php
                                    $qb1 = "select * from brands where id='$bid1'";
                                    $resultb1 = $conn->query($qb1);
                                    $rowb1 = $resultb1->fetch_assoc();
                                    ?>
                                        <option value="<?= $rowb1['id'] ?>"><?= $rowb1['name'] ?></option>
                                    
                                    <?php
                                    $qb = "select * from brands where 1";
                                    $resultb = $conn->query($qb);
                                    while ($rowb = $resultb->fetch_assoc()) {
                                    ?>
                                        <option value="<?= $rowb['id'] ?>"><?= $rowb['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="manufacturer" class="form-label">Manufacturer:</label>
                                <select class="form-select mt-4 mb-4" name="manufacturer" id="manufacturer">
                                    <?php
                                    $qm1 = "select * from manufacturers where id='$mft1'";
                                    $resultm1 = $conn->query($qm1);
                                    while ($rowm1 = $resultm1->fetch_assoc()) {
                                    ?>
                                        <option value="<?= $rowm1['id'] ?>"><?= $rowm1['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    $qm = "select * from manufacturers where 1";
                                    $resultm = $conn->query($qm);
                                    while ($rowm = $resultm->fetch_assoc()) {
                                    ?>
                                        <option value="<?= $rowm['id'] ?>"><?= $rowm['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="user" class="form-label">User:</label>
                                <select class="form-select mt-4 mb-4" name="user_id" id="user">
                                    <option value="<?= $_SESSION['userid']?>" disabled selected><?= $_SESSION['username'] ?></option>
                                    <?php
                                    $qu = "select * from users where id='$userid1'";
                                    $resultu = $conn->query($qu);
                                    while ($rowu = $resultu->fetch_assoc()) {
                                    ?>
                                        <!-- <option value="<?= $rowu['id'] ?>"><?= $rowu['name'] ?></option> -->
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                       
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" name="title" value="<?=$title1 ?? ""?>" class="form-control" id="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea name="description" value="" class="form-control" id="description"><?=$desc1 ?? ""?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="dimensions" class="form-label">Dimensions:</label>
                            <input type="text" value="<?=$dim1 ?? ""?>" class="form-control" name="dimensions" id="dimensions" required>
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight:</label>
                            <input type="text" value="<?=$weight1 ?? ""?>" class="form-control" name="weight" id="weight" required>
                        </div>
                        <div class="mb-3">
                            <label for="pprice" class="form-label">Purchase Price:</label>
                            <input type="number" value="<?=$pprice1 ?? ""?>" class="form-control" name="pprice" id="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="sprice" class="form-label">Selling Price:</label>
                            <input type="number" value="<?=$sprice1 ?? ""?>" class="form-control" name="sprice" id="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="discount" class="form-label">Discount:</label>
                            <input type="number" value="<?=$discount1 ?? ""?>" class="form-control" name="discount" id="discount" required>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" value="<?=$quantity1 ?? ""?>" class="form-control" name="quantity" id="quantity" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="hot" class="form-label">Hot:</label>
                            <input type="number" value="<?=$hot1 ?? ""?>" height="2" name="hot" id="hot" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="options" class="form-label">Options:</label>
                            <input type="text" value="<?=$options1 ?? ""?>" name="options" id="options" class="form-control">
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