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
                <button class="btn btn-primary my-5">
                    <a href="product_add.php" class="text-decoration-none text-light"> Add Product</a>
                </button>
                <a href="<?= settings()['adminpage'] ?>/image/image_add.php" class="btn btn-primary"> Add img</a>
                <a href="<?= settings()['adminpage'] ?>/product/topsell.php" class="btn btn-primary">Top Selling</a>
                <a href="<?= settings()['adminpage'] ?>/product/lowstock.php" class="btn btn-primary">Low Stock</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product ID</th>
                            <th scope="col">Catagory</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Title</th>
                            <th scope="col">Purchase Price</th>
                            <th scope="col">Sell Price</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Seeling Quantity</th>
                            <th scope="col">Image</th>
                            <th colspan="3" scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT products.id, products.cat_id, products.brand_id, products.title,products.pprice, products.sprice, products.images,products.discount,products.quantity,products.hot,categories.name as cat_name, brands.name as brand_name  FROM products JOIN categories ON products.cat_id = categories.id JOIN brands ON products.brand_id=brands.id";
                        // $result = $con->query($sql);
                        $result = $conn->query($sql);
                        if ($result) {


                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $cat = $row['cat_name'];
                                $brand = $row['brand_name'];
                                $title = $row['title'];
                                $price = $row['sprice'];
                                $image = $row['images'];

                                echo '<tr>
                                        <th scope="row">' . $id . '</th>
                                        <td>' . $cat . '</td>
                                        <td>' . $brand . '</td>
                                        <td>' . $title . '</td>
                                        <td>' . $row['pprice'] . '</td>
                                        <td>' . $price . '</td>
                                        <td>' . $row['discount'] . '%</td>
                                        <td>' . $row['quantity'] . '</td>
                                        <td>' . $row['hot'] . '</td>
                                        
                                        <td><img width="80px" src="'.settings()['homepage'].'productimg/'. $image .'" alt=""><a class="text-decoration-none" href="pimgedit.php?updateid=' . $id . '"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                        <td>
                                            <a class="btn btn-outline-primary text-decoration-none" href="product_update.php?updateid=' . $id . '">Edit</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-danger  text-decoration-none" href="product_delete.php?deleteid=' . $id . '">Delete</a>
                                        
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-primary  text-decoration-none" href="'.settings()['homepage'].'product_details.php?id=' . $id . '">Details</a>
                                        
                                        </td>
                                    </tr>';
                            }
                        }

                        ?>

                    </tbody>
                </table>

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