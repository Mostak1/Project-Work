<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';

use App\db;

$conn = db::connect();
if (isset($_POST['addBtn'])) {


    $id = $_POST['id'];
    $rank = $_POST['rank'];

    $sql = "INSERT INTO `roles`(`id`, `rank`) VALUES ('$id','$rank')";
    $result = $conn->query($sql);

    if ($conn->affected_rows) {
        header("location:" . settings()['homepage'] . "admin/role/roledisplay.php");
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Catagory</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="login-form" action="" method="post">
                        <div>
                            <label class="form-label" for="">ID</label>
                            <input class="form-control" type="text" name="id" placeholder="Name">
                        </div>
                        <div>
                            <label class="form-label" for="">Rank</label>
                            <input class="form-control" type="text" name="rank" placeholder="Description">
                        </div>

                        <div class="mt-4">
                            <input class="btn btn-outline-primary" type="submit" value="Add" name="addBtn">
                            <input class="btn btn-outline-warning" type="reset" value="Clear" name="clearBtn">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
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
                <h1 class="text-primary text-center mt-4 mb-4">Category Management</h1>
                <div class="d-flex justify-content-between">
                    <div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add
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
                                <th scope="col">ID</th>
                                <th scope="col">Rank</th>
                                <th colspan="3" scope="col">Opration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "select * from `roles` ";
                            $result = $conn->query($sql);
                            if ($result) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['rank']; ?></td>
                                        <td>
                                            <a class="btn btn-outline-primary" href="roleedit.php?id=<?= $row['id']; ?>">Edit</a>
                                            <a class="btn btn-outline-danger" href="roledelete.php?id=<?= $row['id']; ?>">Delete</a>
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
</body>

</html>