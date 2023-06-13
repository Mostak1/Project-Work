<?php
require __DIR__ . '/vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!$_SESSION['loggedin']) {
    header('location:login.php');
}
$page = "Product Details";
?>

<?php

use App\db;

$conn = db::connect();

$uid = $_SESSION['userid'];
$sql = "select * from `users` where id= $uid";
$res = $conn->query($sql);
$r = $res->fetch_assoc();

$id = $_GET["id"];
$selectQuery = "select * from products where id= $id";
$result = $conn->query($selectQuery);
$row = $result->fetch_assoc();

$catid = $row['cat_id'];
$bid = $row['brand_id'];
$title = $row['title'];
$desc = $row['description'];
$mft = $row['manufacturer_id'];
$dimensions = $row['dimensions'];
$weight = $row['weight'];
$price = $row['sprice'];
$discount = $row['discount'];
$userid = $row['user_id'];
$quantity = $row['quantity'];


if (isset($_POST['submit'])) {
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];

    $inrev = "INSERT INTO `reviews`( `user_id`, `product_id`, `comment`, `star`) VALUES ('$uid','$id','$comment','$rating')";
    $ret = $conn->query($inrev);
    if ($ret) {
        $revv = "<h3>Review Added</h3>";
    }
}
?>

<?php require __DIR__ . '/components/header.php'; ?>

<style>
    #topp {
        margin-top: 100px !important;
    }

    .col-md-5 img {
        object-fit: cover;
        max-height: 600px;
        overflow: hidden;
    }

    .mainimg {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        object-fit: fill;
    }

    .subimg {
        height: 200px !important;
        object-fit: fill;
        filter: blur(3px);
    }

    .subimg:hover {
        object-fit: fill;
        filter: blur(0px);
        transition: .5s;
    }

    .color-bg {
        background-color: rgb(109, 150, 28) !important;
        color: whitesmoke;
        box-shadow: 5px 8px 10px rgb(190, 200, 170);
    }

    .lefticon {
        position: absolute;
        top: 45%;
        z-index: 1;
    }

    .buyicon a:hover {
        color: white;
        background-color: rgb(255, 32, 32);
    }

    .buyicon a {
        border: 1px solid rgb(255, 32, 32);
        color: rgb(255, 32, 32);
        border-radius: 20px;
        background-color: white;
        margin-left: 3px;
    }
     /* reviewww */

     .nrev form {
        margin-bottom: 30px;
    }

    .nrev label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .nrev input,
    .nrev textarea {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .nrev button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .nrev button[type="submit"]:hover {
        background-color: #0069d9;
    }

    .nrev .rating {
        margin-bottom: 20px;
    }

    .nrev .star {
        font-size: 24px;
        color: #ccc;
        cursor: pointer;
        margin-right: 10px;
    }

    .nrev .star.active,
    .nrev .star:hover {
        color: #ffcc00;
    }
</style>
</head>
<?php require __DIR__ . '/components/bodyheader.php'; ?>
<?php require __DIR__ . '/components/menubar.php'; ?>

<div class="shadow-lg my-3 mx-auto">

    <div class="container product-data">
        <div class=" row">
            <div class="col-md-6">
                <div class="border mainimg">
                    <img src="<?= settings()['homepage'] ?>/productimg/<?= $row['images'] ?>" width="90%" height="500px" id="limg" alt="comming">
                </div>
                <div class="row mt-2 mx-auto border position-relative">
                    <div class="col my-2">
                        <img class="subimg border" src="<?= settings()['homepage'] ?>/productimg/63ae7b4b4be6b.png" width="100%" alt="">
                    </div>
                    <div class="col  my-2">
                        <img class="subimg border" src="<?= settings()['homepage'] ?>/productimg/63aaabd1771e1.png" width="100%" alt="">
                    </div>
                    <div class="col  my-2">
                        <img class="subimg border" src="<?= settings()['homepage'] ?>/productimg/63aaac74aa3d2.png" width="100%" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3><?= $title ?? "Title Here" ?></h3>
                <hr>
                <p>Menufacturer: <?= $mft ?? "" ?> </p>
                <p>Availability:<?= $quantity ?? "" ?> </p>
                <p>Product Coad: <?= "#1234" ?></p>
                <br>
                <h3>Product Dimensions and Weight</h3>
                <p>Product Dimensions:<?= $dimensions ?? "" ?></p>
                <p>Product Weight:<?= $weight ?? "" ?></p>

                <!-- input grp -->
                <div class="input-group mb-3" style="width: 130px;">
                    <button class="input-group-text decrement-btn">-</button>
                    <input id="quantity" type="text" class="form-control bg-white text-center qval" value="2" disabled>
                    <button class="input-group-text increment-btn">+</button>
                </div>

                <hr>
                <p class="position-relative"><span class="position-absolute start-0 text-decoration-line-through text-danger">Price:<?=$price?>Tk </span> <span class="position-absolute end-0">Discount Price:<?=$price-($discount*$price/100)?>Tk</span></p>
                <br><br>
                <div class="buyicon ">
                    <a id="addToCart" class=" px-3 py-1 fs-5 rounded" href="javascript:void(0)">
                        <i class="fa-solid fa-cart-shopping "></i> Add to Cart
                    </a>
                    <a class=" fs-5  px-3 py-1 rounded shadow-lg" href="">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a class=" fs-5  px-3 py-1 rounded shadow-lg" href="">
                        <i class="fa-solid fs-5 fa-code-compare"></i>
                    </a>
                    <a class="-emphasis fs-5  px-3 py-1 rounded shadow-lg" href="">
                        <i class="fa-solid fa-question"></i>
                    </a>
                </div>

            </div>
        </div>
        <marquee behavior="" direction="">Product Details and Review</marquee>
            <div class="row">
                <div class="text-center text-gray bg-dark fs-3">
                    <a href="#details" data-page="detl.php" id="details" class="redlinem homenvm me-2">Details </a>
                    <a href="#review" data-page="review.php" id="review" class="redlinem homenvm">Review</a>
                </div>
                <h3></h3>
                <div class="content c1">
                    <p><?= $desc ?? ""  ?> </p>
                </div>
                <div class="content c2 row">
                    <div class="col-9 oldrev">
                        <?php
                        $selectRev = "SELECT reviews.id, reviews.comment, reviews.star, users.first_name FROM reviews JOIN users ON reviews.user_id = users.id  where `product_id`='$id' ORDER BY id DESC";
                        $resultr = $conn->query($selectRev);
                        if ($resultr->num_rows) {
                            while ($rowr = $resultr->fetch_assoc()) {

                        ?>
                                <div class="card mb-2">
                                    <div class="card-header">
                                        <span class="me-5">Reviewed by <?= $rowr['first_name'] ?></span>
                                        <span>Rating <?= $rowr['star'] ?></span>
                                        
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><?= $title ?? "Title Here" ?> </h3>

                                        <p class="card-text"> <?=$rowr['comment'] ?></p>

                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                    <div class="col-3 nrev">
                        <form method="post">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" placeholder="" value="<?= $r['first_name'] ?>" disabled required> 

                           
                            <label for="comment">Review:</label>
                            <textarea id="comment" name="comment" required></textarea>

                            <div class="rating">

                                <i class="star fa fa-star" data-rating="1"></i>
                                <i class="star fa fa-star" data-rating="2"></i>
                                <i class="star fa fa-star" data-rating="3"></i>
                                <i class="star fa fa-star" data-rating="4"></i>
                                <i class="star fa fa-star" data-rating="5"></i>
                                <input type="text" name="rating" id="myInput" hidden value="">
                            </div>
                            <?php

                            ?>
                            <!-- // Process the rating value as needed -->

                            <input name="submit" type="submit"></input>
                        </form>

                        <div class="reviews"></div>
                    </div>
                </div>
            </div>
    </div>
</div>
<script>
    $(function() {
        $("#addToCart").click(function() {
            let cart = new Cart();
            let id = <?= $row['id'] ?>;
            let title = '<?= $row['title'] ?>';
            let pprice = '<?= $row['sprice'] ?>';
            let qnt = $("#quantity").val();
            let data = cart.getItems();
            if(data.length>0){
                data.forEach(e => {
                if (e.id == id) {
                    alert("This Product Already Added")
                    return false;
                    
                } else {
                    cart.addItem({
                        title: title,
                        pprice: pprice,
                        id: id,
                        quantity: qnt
                    });
                    // console.log(cart.totalItems());
                    $("#bcart").html(cart.totalItems());
                }
            });
            }else{
                cart.addItem({
                        title: title,
                        pprice: pprice,
                        id: id,
                        quantity: qnt
                    });
                    // console.log(cart.totalItems());
                    $("#bcart").html(cart.totalItems());
            }
            

        })
    });

    let limg = document.getElementById("limg");
    let simg = document.getElementsByClassName("subimg");

    simg[0].onclick = function() {
        limg.src = simg[0].src;
        simg[0].style.filter = "blur(0px)";
        simg[1].style.filter = "blur(3px)";
        simg[2].style.filter = "blur(3px)";
    };
    simg[1].onclick = function() {
        limg.src = simg[1].src;
        simg[0].style.filter = "blur(3px)";
        simg[1].style.filter = "blur(0px)";
        simg[2].style.filter = "blur(3px)";
    };
    simg[2].onclick = function() {
        limg.src = simg[2].src;
        simg[0].style.filter = "blur(3px)";
        simg[1].style.filter = "blur(3px)";
        simg[2].style.filter = "blur(0px)";
    };
</script>
<script src="assets/js/jquery-3.6.3.min.js"></script>
    <!-- -------------------review-------------------- -->
    <script>
        $(document).ready(function() {
            $(".c2").hide();
            $("#details").click(function() {
                $(".content").hide();
                $(".c1").show();
            })
            $("#review").click(function() {
                $(".content").hide();
                $(".c2").show();
            })



        })
        $(document).ready(function() {
            // Star rating system
            $('.star').click(function() {
                var rating = $(this).data('rating');
                $('.star').removeClass('active');
                $('.star').each(function() {
                    if ($(this).data('rating') <= rating) {
                        $(this).addClass('active');
                    }
                });

            });
            $('.star').click(function() {
                var rating = $(this).data("rating");
                $("#myInput").val(rating);
            });

        });
    </script>

<?php
require __DIR__ . '/components/footer.php';
$conn->close();
?>