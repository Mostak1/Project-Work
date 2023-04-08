<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';

use App\db;

$conn = db::connect();
if (isset($_POST['addBtn'])) {


    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $loca = $_POST['loca'];
    $propiter = $_POST['propiter'];
    $sql = "INSERT INTO `manufacturers` ( `name`, `mobile`, `location`, `propiter`) VALUES ('$name','$mobile','$loca','$propiter')";
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

<body class="sb-nav-fixed">
    <!-- ---------------m---o----d----a-----l-------------------->


    <!-- Modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Manufacturer Add</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="" method="post">
                    <div class="">
                        <label class="" for="name">Company Name:</label>
                        <input class="form-control" type="text" name="name" >
                    </div>
                    <div class="mt-2">
                        <label class="" for="mobile">Mobile:</label>
                        <input class="form-control" type="text" name="mobile" >
                    </div>
                    <div class="mt-2">
                        <label class="" for="loca">Address:</label>
                        <input class="form-control" type="text" name="loca" >
                    </div>
                    <div class="mt-2">
                        <label class="" for="propiter">Propiter Name:</label>
                        <input class="form-control" type="text" name="propiter" >
                    </div>
                    <div class="mt-2 mx-auto">
                       <input class="btn btn-outline-info" type="submit" value="Add" name="addBtn">
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ---------------m---o----d----a-----l-------------------->
    <?php require __DIR__ . '/../components/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php require __DIR__ . '/../components/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <!-------------------------- display content start--------------------------- -->
            <div class="container">
                <h1 class="text-primary text-center mt-4 mb-4">Manufacturers Management</h1>
                <div class="d-flex justify-content-between">
                    <div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Manufacturer
                        </button>
                        <?php if (isset($_GET['search'])) { ?>
                            <span>Search result for <?= $_GET['search'] ?></span>
                        <?php } ?>
                    </div>
                    <form action="" style="width: 300px;" class="p-2 input-group">
                        <input type="search" class="form-control" name="search" id="search">
                        <input type="submit" class="btn btn-primary" value="Search">
                    </form>
                </div>
                <div class="row">
                    <table class="table table-primary mt-4">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Address</th>
                                <th scope="col">Propiter</th>
                                <th colspan="3" scope="col">Opration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "select * from `manufacturers` where 1";
                            $result = $conn->query($sql);
                            if ($result) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['name']; ?></td>
                                        <td><?= $row['mobile']; ?></td>
                                        <td><?= $row['location']; ?></td>
                                        <td><?= $row['propiter']; ?></td>
                                        <td>
                                            <a class="btn btn-outline-primary" href="medit.php?id=<?= $row['id']; ?>">Edit</a>
                                            <a class="btn btn-outline-danger" href="mdelete.php?id=<?= $row['id']; ?>">Delete</a>
                                        </td>

                                    </tr>
                        </tbody>
                <?php
                                }
                            }
                ?>
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
</body>

</html>