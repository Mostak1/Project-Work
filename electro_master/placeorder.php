<?php session_start();
require __DIR__ . '/vendor/autoload.php';

// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }
// if (!$_SESSION['loggedin']) {
//     header('location:login.php');
// }
$page = "Place order";
?>
<?php

use App\db;

$conn = db::connect();

$s_id = $_SESSION['userid'];

$q = "select * from users where id = '$s_id'";
$result = $conn->query($q);

$row = $result->fetch_assoc();

// if (isset($_POST['sub'])) {
//     $b_address = $_POST['b_address'];
//     $s_address = $_POST['s_address'];

//     $sql = "INSERT INTO `order`(`user_id`,`b_address`, `s_address`) VALUES ('$s_id','$b_address','$s_address')";

//     $result = $conn->query($sql);
//     $o_id = mysqli_insert_id($conn);
//      echo $o_id;
//     if ($conn->affected_rows) {
//         echo "Order Successfully done!!";
//     } else {
//         echo "Failed";
//     }

// }
?>
<?php require __DIR__ . '/components/header.php'; ?>
<?php require __DIR__ . '/components/bodyheader.php'; ?>

<div class="section my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">User Information</h3>
                    </div>
                    <form action="" method="post">
                        <div class="mb-2">
                            <input id="fname" class="form-control" type="text" name="fname" value="<?= $row['first_name'] ?>" placeholder="First Name">
                        </div>
                        <div class="mb-2">
                            <input class="form-control" type="text" name="lname" value="<?= $row['last_name'] ?>" placeholder="Last Name">
                        </div>
                        <div class="mb-2">
                            <input class="form-control" type="text" name="city" value="<?= $row['city'] ?>" placeholder="City">
                        </div>
                        <div class="mb-2">
                            <input class="form-control" type="text" name="state" value="<?= $row['state'] ?>" placeholder="State">
                        </div>
                        <div class="mb-2">
                            <input class="form-control" type="text" name="pcode" value="<?= $row['postal_code'] ?>" placeholder="Postal Code">
                        </div>
                        <div class="mb-2">
                            <input class="form-control" type="text" name="phn" value="<?= $row['phone'] ?>" placeholder="Phone">
                        </div>
                        <div class="mb-2">
                            <input class="form-control" type="email" name="email" value="<?= $row['email'] ?>" placeholder="Email">
                        </div>
                        <h3 class="title">Billing Address</h3>
                        <div class="mb-2">
                            <input id="bAddress" class="form-control" type="text" name="b_address" placeholder="Billing Address">
                        </div>
                        <h3 class="title">Shipping Address</h3>
                        <div class="mb-2">
                            <input id="sAddress" class="form-control" type="text" name="s_address" placeholder="Shipping Address">
                        </div>
                        <div>
                            <input value="<?= $s_id; ?>" id="u_id" name="u_id" type="hidden">
                        </div>
                </div>
            </div>
            <!-- ........................order......................... -->
            <div class="col-md-5 order-details">
                <div class="section-title text-center">
                    <h3 class="title">Your Order</h3>
                </div>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>Details</strong></div>
                        <div><strong>TOTAL</strong></div>
                    </div>
                    <div class="order-products">
                        <div class="order-col">
                            <div>Sub Total</div>
                            <div id="subtotal"></div>
                        </div>
                        <div class="order-col">
                            <div>Tax</div>
                            <div id="tax"></div>
                        </div>
                        <div class="order-col">
                            <div>Discount</div>
                            <div> <input type="text" id="discount" class="form-control" value="4"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="order-col">
                        <div><strong>TOTAL</strong></div>
                        <div><strong id="total" class="order-total">$2940.00</strong></div>
                    </div>
                </div>
                <!-- ...................payment................................ -->
                <div class="row mx-0 mb-2">
                    <div class="col-sm-4 p-0 d-inline">
                        <h6>Payment</h6>
                    </div>
                    <div class="col-sm-8 p-0">
                        <select name="payment" id="payment" class="form-control">
                            <option value="-1">Select</option>
                            <option value="cash">Cash</option>
                            <option value="bkash">bKash</option>
                            <option value="nogod">Nogod</option>
                            <option value="cod">Cash On Delivery</option>
                        </select>
                    </div>
                </div>
                <div class="row mx-0 mb-2">
                    <div class="col-sm-4 p-0 d-inline">
                        <h6>TrxID</h6>
                    </div>
                    <div class="col-sm-8 p-0">
                        <input type="text" id="trxid" class="form-control">
                    </div>
                </div>
                <div class="row mx-0 mb-2">
                    <div class="col-sm-4 p-0 d-inline">
                        <h6>Comment</h6>
                    </div>
                    <div class="col-sm-8 p-0">
                        <textarea name="comment" id="comment" class="form-control"></textarea>
                    </div>
                </div>
                <input id="orderBtn" type="submit" class="btn btn-danger" name="sub">
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function() {
        let cart = new Cart();
        let items = cart.getItems();
        // console.log(items);

        let user_id = $("#u_id").val();
        console.log(user_id);

        let subtotal = 0;
        items.forEach(e => {
            let cartPrice = e.pprice;
            let cartQan = e.quantity;
            subtotal += cartPrice * cartQan;
        });
        let tax = 0.05;
        let total = 0;
        total = subtotal + subtotal * tax;
        // console.log(subtotal);
        $("#subtotal").html(subtotal);
        $("#tax").html(tax);
        $("#total").html(total);
        let bAddress = $("#bAddress").val();
        let sAddress = $("#sAddress").val();

        $("#discount").blur(function() {
            // alert(5)
            let amount = Number($(this).val());
            $("#total").html(Number($("#total").html()) - amount);
        });
        $("#orderBtn").click(function() {
            let bAddress = $("#bAddress").val();
            let sAddress = $("#sAddress").val();
            // console.log(bAddress+sAddress);

            // alert("hi")
            let items = cart.items;
            // console.log(items);
            let discount = $("#discount").val();
            let total = Number($("#total").html());
            let payment = $("#payment").val();
            let trxid = $("#trxid").val();
            let comment = $("#comment").val();
            if (payment == "-1") {
                alert("pls select payment method");
                return;
            }
            if (payment == "bkash" || payment == "nogod") {
                if (trxid.length == 0) {
                    alert("Please provide transaction id if you select bkash or nogod");
                    return;
                }
            }
            let status = "pe";


            $.post("checkout.php", {
                action: "checkout",
                t: total,
                d: discount,
                p: payment,
                trx: trxid,
                c: comment,
                b: bAddress,
                s: sAddress,
                items: items,
            }, function(d) {

                d = JSON.parse(d)
                //console.log(d)
                if (d.success) {
                    alert("Your order has been received. Order Id : " + d.invoiceid);
                    cart.emptyCart();
                    location.href = "index.php";;
                }
                //ajax post in jquery end
            });
        })




    });
</script>

<?php
require __DIR__ . '/components/footer.php';
$conn->close();
?>