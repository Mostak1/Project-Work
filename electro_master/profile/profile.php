<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../vendor/autoload.php';
$page = "Profile";

use App\db;

$conn = db::connect();
$uid = $_SESSION['userid'];

?>
<?php require __DIR__ . '/../components/header.php'; ?>
<style>
    .side {
        width: 98% !important;
        height: 600px;
        color: rgb(255, 32, 32);
        background-color: #15161D;
        margin-top: 10px;
        border-radius: 10px;
        box-shadow: 8px 8px 8px gray;
    }

    .main {
        width: 98% !important;
        min-height:600px ;
        color: rgb(255, 32, 32);
        background-color: #15161D;
        margin-top: 10px;
        border-radius: 10px;
        box-shadow: 8px 8px 8px gray;
    }

    .propic {
        text-align: center;
    }

    .propic a {
        color: rgb(255, 32, 32);
    }

    .propic a:hover {
        color: white;
    }

    .propic i {
        font-size: 50pt;
        margin: 10px auto;
    }
</style>
</head>

<body class="">
    <?php require __DIR__ . '/../components/bodyheader.php'; ?>
    <?php require __DIR__ . '/../components/menubar.php'; ?>
    <div class="container my-3">
        <div class="row">
            <div class="col-3">
                <div class="side">
                    <div class="propic">

                        <i class="fa-regular fa-user"></i>
                        <p>Name: <?= $_SESSION['username'] ?></p>
                    </div>
                    <hr>
                    <div class="propic">
                        <a v="uinfo" href="#">Information</a>

                    </div>
                    <hr>
                    <div class="propic">
                        <a v="orderinfo" href="#">Orders</a>

                    </div>
                    <hr>
                    <div class="propic">
                        <a href="">Wishlist</a>

                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-9">
                <div class="main">
                <?php
                $sql = "SELECT * FROM `users` WHERE `id`='$uid'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();

                    ?>
                    <h1 class="text-center py-3">Information of <?= $row['first_name'] ?> <?= $row['last_name'] ?> </h1>
                    <hr>
                    <div class="row ps-5 pb-2">
                        <div class="col-3">
                            Name 
                        </div>
                        <div class="col-8">
                            : <?= $row['first_name'] ?> <?= $row['last_name'] ?>
                        </div>
                    </div>
                    <div class="row ps-5 pb-2">
                        <div class="col-3">
                            Email 
                        </div>
                        <div class="col-8">
                           : <?= $row['email'] ?>
                        </div>
                    </div>
                    <div class="row ps-5 pb-2">
                        <div class="col-3">
                            Address 
                        </div>
                        <div class="col-8">
                           : <?= $row['home'] ?>
                           , <?= $row['city'] ?>
                           , <?= $row['state'] ?>
                        </div>
                    </div>
                    <div class="row ps-5 pb-2">
                        <div class="col-3">
                            Postal Code 
                        </div>
                        <div class="col-8">
                           : <?= $row['postal_code'] ?>
                          
                        </div>
                    </div>
                    <div class="row ps-5 pb-2">
                        <div class="col-3">
                            Mobile Number 
                        </div>
                        <div class="col-8">
                           : <?= $row['phone'] ?>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?=settings()['homepage']?>assets/js/jquery-3.6.3.min.js"></script>
    <script>
        $(document).ready(function() {
            $('a').on("click", function() {
                var link = $(this).attr("v") + ".php";
                $('.main').fadeOut(200, function() {
                    $('.main').load(link).fadeIn(400);
                });
                });
            });
            // $('a').on("click",  function () {
			// 	// e.preventDefault();
			// 	// alert($(this).attr("v"));
            //     // alert("Click")
			// 	var loadfile = $(this).attr("v") + ".php";
				
			// 	$('#content').fadeOut(100, function () {
			// 		$('#content').load(loadfile).fadeIn(600);
			// 	});
        
    </script>
    <?php require __DIR__ . '/../components/footer.php'; ?>