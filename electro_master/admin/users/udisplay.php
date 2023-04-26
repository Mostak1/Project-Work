<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';

use App\db;

$conn = db::connect();
if (isset($_POST['addBtn'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];


    $sql = "INSERT INTO `users`(`name`, `email`,`password`,`role`) VALUES ('$name','$email','$pass','$role')";
    $result = $conn->query($sql);

    if ($conn->affected_rows) {
        header("location:udisplay.php");
    } else {
        echo "code e vul";
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

                <h1 class="text-primary text-center mt-4 mb-4">User Management</h1>

                <div class="d-flex justify-content-between">
                    <div>
                        <a href="javascript:void(0)" onclick="toggleForm()" class="btn btn-lg btn-outline-primary">Add</a>
                        <?php if (isset($_GET['search'])) { ?>
                            <span>Search result for <?= $_GET['search'] ?></span>
                        <?php } ?>
                    </div>
                    <form action="" class="d-flex">
                        <input type="search" class="form-control" name="search" id="search">
                        <input type="submit" class="ms-1 btn btn-outline-primary" value="Search">
                    </form>
                </div>
                <div class="row">
                    <form id="formContainer" class="login-form  " action="" method="post">
                        <div>
                            <label class="form-label" for="">Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Name">
                        </div>
                        <div>
                            <label class="form-label" for="">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Email">
                        </div>
                        <div>
                            <label class="form-label" for="">Password</label>
                            <input class="form-control" type="password" name="pass" placeholder="Password">
                        </div>
                        <div>
                            <label class="form-label" for="">Role</label>
                            <input class="form-control" type="text" name="role" placeholder="Role">
                        </div>

                        <div class="mt-4">
                            <input class="btn btn-outline-primary" type="submit" value="Add" name="addBtn">
                            <input class="btn btn-outline-warning" type="reset" value="Clear" name="clearBtn">
                            <input class="btn btn-outline-danger" type="button" value="Close" onclick="closeForm()" name="closeBtn">
                        </div>
                    </form>

                    <table class="table table-primary mt-4">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Role</th>
                                <th colspan="3" scope="col">Opration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "select u.id,u.name,u.email,u.password,r.name r_name from `users` u,`role` r where u.role = r.id  ";
                            $result = $conn->query($sql);
                            if ($result) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['name']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['password']; ?></td>
                                        <td><?= $row['r_name']; ?></td>
                                        <td>
                                            <a class="btn btn-outline-primary" href="uedit.php?id=<?= $row['id']; ?>">Edit</a>
                                            <a class="btn btn-outline-danger" href="udelete.php?id=<?= $row['id']; ?>">Delete</a>
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