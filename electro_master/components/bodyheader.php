<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container mx-auto pt-2 row">
            <ul class="col-6 ul">
                <li class="li"><a class="a" href="#"><i class="fa fa-phone "></i> +021-95-51-84</a></li>
                <li class="li"><a class="a" href="#"><i class="fa-regular fa-envelope "></i> email@email.com</a></li>
                <li class="li"><a class="a" href="#"><i class="fa-solid fa-location-dot "></i> 1734 Stonecoal Road</a></li>
            </ul>
            <div class="col-1"></div>
            <ul class="col-5 text-end ul">
                <li class="li"><a class="me-2 a" href="#"><i class="fa fa-dollar"></i> USD</a></li>

                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) { ?>
                    <!-- Example single danger button -->
                    <div class="btn-group">
                        <button type="button" class="a dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['username'] ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= settings()['homepage'] ?>/profile/profile.php">My Profile</a></li>
                            <li><a class="dropdown-item" href="#">Orders</a></li>
                            <li><a class="dropdown-item" href="<?= settings()['homepage'] ?>wishshow.php">Wishlist</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= settings()['homepage'] ?>/logout.php">Log Out</a></li>
                        </ul>
                    </div>
                <?php } else { ?>
                    <li class="li">
                        <a class="me-2 a" aria-current="page" href="login.php"><i class="fa-solid fa-user"></i>Login</a>
                    </li>
                    <li class="li">
                        <a class="a" aria-current="page" href="registration.php">Register</a>
                    </li>
                <?php }  ?>

            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <div id="header" class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container d-flex justify-content-between">
                <a class="navbar-brand mb-4" href="#"><img  src="<?= settings()['homepage'] ?>assets/images/logo.png" width="120px" alt=""></a>

                <button class="navbar-toggler text-danger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    Menu <span class="text-white navbar-toggler-icon"></span>
                </button>
                <div class="">
                    <form class="input-group mb-3 ms-2" method="post">
                        <input class="form-control border-danger " type="search" placeholder="Search here">
                        <input class="btn btn-outline-danger px-2" type="submit" value="Search">
                    </form>
                </div>
                <div class="collapse  navbar-collapse mb-3 " id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item me-3">
                            <a class="redlinem homenvm" href="<?= settings()['homepage'] ?>index.php">Home </a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="redlinem homenvm" href="<?= settings()['homepage'] ?>product.php">Product </a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="redlinem homenvm" href="<?= settings()['homepage'] ?>product.php">Categories </a>
                        </li>

                        <li class="nav-item me-3">
                            <?php if (isset($_SESSION['loggedin'])  && $_SESSION['loggedin'] && $_SESSION['role'] == "2") { ?>
                                <a class="redlinem homenvm" href="<?= settings()['adminpage'] ?>" target="_blank">Admin </a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>

                <div class="nav-item me-2">
                    
                    <a href="wishshow.php" class="nav-link position-relative cart text-white"><i class="fa-solid fa-heart text-danger"></i> Wishlist
                        <span class="position-absolute top-3 start-100 translate-middle badge rounded-pill" id="witch"></span>
                    </a>
                </div>
                <div class="nav-item gx-3 ms-4 ">
                    <a href="single_cart.php" class="nav-link position-relative cart"><i class="fa-solid fa-cart-shopping"></i> Cart
                        <span class="position-absolute top-3 start-100 translate-middle badge rounded-pill" id="bcart">0</span>

                    </a>
                </div>
            </div>
        </nav>
    </div>
    <script>
        $(function() {
            let bcart = new Cart();
            $("#bcart").html(bcart.totalItems());
        });
    </script>