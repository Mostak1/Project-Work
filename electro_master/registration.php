<?php
require __DIR__ . '/vendor/autoload.php';
$page = "Registration";
// <!-- connetion  -->
use App\db;

$conn = db::connect();


if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pcode = $_POST['pcode'];
    $phn = $_POST['phn'];
    $email = $_POST['email'];
    $pass = $_POST['pwd'];

    $password = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "select * from `users` where 1";
    $result1 = $conn->query($sql);
    if ($result1) {
        $res = $result1->fetch_assoc();
        if ($email == $res['email']) {

            header("location:" . settings()['homepage'] . "/registration.php");
            $emailex = 'Email Exist';
            exit;
        } else {
            $sql = "insert into `users` (first_name,last_name,city,state,postal_code,phone,email,password,role) values('$fname','$lname','$city','$state','$pcode','$phn','$email','$password','1')";
            //    echo $sql;
            //    exit;

            $result = $conn->query($sql);
            if ($result) {
                $succ = "Registration Successfull";
                header("location: login.php?m=Registration Success");
            } else {
                echo "Data Not inserted";
            }
        }
    }
};
?>

<!-------- Header start---- -->
<?php
require __DIR__ . '/components/bodyheader.php';
require __DIR__ . '/components/header.php';
?>
<link rel="stylesheet" href="<?= settings()['homepage'] ?>/assets/css/home_body.css">

</head>

<body>
    <?php require __DIR__ . '/components/menubar.php'; ?>
    <div class="logreg">
        <div class="container ">
            <!-- registration form  -->
            <div class="shadow-lg mt-5 p-3 mx-auto mb-5 rounded" id="registration">
                <form class="form-horizontal  mx-auto" method="post">
                    <h2 class="text-center my-4"><?= $succ ?? "Registration" ?></h2>
                    <hr>
                    <div class="form-group row mb-2">
                        <label class="control-label col-sm-4" for="fname">First Name:</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" autocomplete="off" required>
                            <div class="spanf" id="nameerror"></div>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="control-label col-sm-4" for="lname">Last Name:</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" autocomplete="off" required>
                            <div class="spanf" id="nameerror"></div>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="control-label col-sm-4" for="state">State:</label>
                        <div class="col-sm">

                            <select class="form-control" name="state" id="state">
                                <option value="-1" selected>Select</option>
                                <?php
                                $sqd = "SELECT * FROM `divisions` where 1";
                                $dvs = $conn->query($sqd);

                                if ($dvs->num_rows) {
                                    while ($dvr = $dvs->fetch_assoc()) {
                                ?>
                                        <option value="<?= $dvr['id'] ?>"><?= $dvr['name'] ?></option>

                                <?php    }
                                }
                                ?>
                            </select>
                            <div class="spanf" id="nameerror"></div>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="control-label col-sm-4" for="city">City:</label>
                        <div class="col-sm">

                            <select class="form-control" name="city" id="city">
                                <option value="-1">Select</option>

                            </select>
                            <div class="spanf" id="nameerror"></div>
                        </div>
                    </div>
                    

                    <div class="form-group row mb-2">
                        <label class="control-label col-sm-4" for="pcode">Postal Code:</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="pcode" placeholder="Postal Code" name="pcode" autocomplete="off" required>
                            <div class="spanf" id="nameerror"></div>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="control-label col-sm-4" for="phn">Phone:</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="phn" placeholder="Phone" name="phn" autocomplete="off" required>
                            <div class="spanf" id="nameerror"></div>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label class="control-label col-sm-4" for="email">Email:</label>
                        <div class="col-sm">
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                            <div class="spanf" id="emailerror"></div>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label class="control-label col-sm-4" for="pwd">Password:</label>
                        <div class="col-sm">
                            <input type="password" class="form-control" id="pass" placeholder="Enter password" name="pwd" required>
                            <div class="spanf" id="passerror"></div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label><input type="checkbox" class="check" name="remember" required> Accept all terms
                                    and
                                    conditions.</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="col-sm-offset-2 col-sm-10 mx-auto px-3 text-center">
                            <input id="submit" class="" name="submit" type="submit" value="Sign Up">
                            <!-- <button onclick="emailCheck()" type="button" class="btn btn-default bg-primary px-4">Submit</button> -->
                        </div>
                    </div>
                </form>
                <h1><?= $emailex ?? "" ?></h1>
            </div>
        </div>
        <p class="text-center">Register and Sign In in the website. Thank You</p>
    </div>
    <!-- registration form  -->
    </div>
    </div>
    <script src="assets/js/jquery-3.6.3.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#state').on('change', function() {
                var division_id = this.value;
                $.ajax({
                    url: 'district.php',
                    type: "POST",
                    data: {

                        division_id: division_id
                    },

                    success: function(result) {
                        $('#city').html(result);
                    }
                })
            })
        })
    </script>
    <?php require __DIR__ . '/components/footer.php'; ?>