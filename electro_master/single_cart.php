<?php
require __DIR__ . '/vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!$_SESSION['loggedin']) {
    header('location:login.php');
}
$page = "Cart";

use App\db;

$conn = db::connect();

require __DIR__ . '/components/header.php'; ?>
<link rel="stylesheet" href="<?= settings()['homepage'] ?>/assets/css/home_body.css">

</head>

<body>


    <?php
    require __DIR__ . '/components/bodyheader.php';
    require __DIR__ . '/components/menubar.php';
    ?>
    <div style="min-height: 500px;" class="container">
        <h1>Shopping Cart</h1>
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub-Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="cartInfo">
            </tbody>
        </table>
        <a href="placeorder.php"><button class="btn btn-danger mt-4 mb-4">Confirm Order</button></a>

    </div>

    <script>
        $(function() {
            let showCart = new Cart();
            console.log(showCart.getItems());
            let cartInfo = showCart.getItems();
            let html = "";
            cartInfo.forEach(e => {
                html += `
                    <tr >
                    <td>${e.title}</td>
                    <td>${e.pprice}</td>
                    <td>
                        <input class="w-25 form-control" type="number" value="${e.quantity}">
                    </td>
                    <td>${e.pprice * e.quantity}</td>
                    <td>
                    <a href="javascript:void(0)"  class="removeItem" data-item='${e.id}'><button class="btn btn-danger">Remove</button></a>
                     
                    </td>
                    
                    </tr >`;
                return html;
            })
            $("#cartInfo").html(html);
            $(".removeItem").click(function() {
                console.log($(this).data("item"));
                if (confirm("Are you sure you want to remove")) {
                    showCart.removeItem($(this).data("item"));
                    location.reload();
                }
            });

        });
    </script>
    <?php require __DIR__ . '/components/footer.php';
    $conn->close();
    ?>