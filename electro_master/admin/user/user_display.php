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
                    <a href="uadd.php" class="text-decoration-none text-light"> Add User</a>

                </button>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rank</th>
                            <th colspan="3" scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $sql = "SELECT users.id, users.first_name, users.email, users.home, users.role, roles.rank FROM `users` JOIN `roles` ON users.role = roles.id";
                        // $result = $con->query($sql);
                        $result = $conn->query($sql);
                        if ($result) {


                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $name = $row['first_name'];
                                $email = $row['email'];
                                $role = $row['rank'];
                                echo '<tr>
                                        <th scope="row">' . $id . '</th>
                                        <td>' . $name . '</td>
                                        <td>' . $email . '</td>
                                        <td>' . $role . '</td>
                                        <td>
                                            <a class="btn btn-outline-primary text-decoration-none" href="user_update.php?updateid=' . $id . '">Edit</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-danger  text-decoration-none" href="user_delete.php?deleteid=' . $id . '">Delete</a>
                                        
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