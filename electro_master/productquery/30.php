<?php
$conn = new mysqli("localhost","root","","electro_master");
$sql = "SELECT * FROM products WHERE sprice>30000 and sprice<40000";
$result = $conn->query($sql);
?>
<h3 class="text-center">Range 30000Tk to 40000Tk</h3>
<div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">';
    <?php
    if ($result->num_rows) {
        while ($res = $result->fetch_assoc()) {

    ?>
            <div class="col">
                <div class="card h-100  shadow-sm">
                    <div class="cardsimg">

                        <img src="productimg/<?= $res['images'] ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="label-top shadow-sm">
                        <?= $res['name'] ?? "" ?>
                    </div>
                    <div class="card-body">
                        <div class="clearfix mb-3">
                            <span class="float-start badge rounded-pill bg-success"><?= $res['sprice'] ?? "" ?>TK
                            </span>
                            <span class="float-end">
                                <a href="#" class="small text-muted">
                                    <?= $res['discount'] ?? "" ?>
                                </a>
                            </span>
                        </div>
                        <h5 class="card-title">
                            <?= $res['description'] ?? "" ?>
                        </h5>
                        <div class="text-center my-4">
                            <a href="product_details.php?id=<?= $res['id'] ?>" class="btn btn-warning"> Details </a>
                        </div>
                        <div class="clearfix mb-1">
                            <span class="float-start wishlist" data-price="<?= $res['sprice'] ?>" data-image="<?= $res['images'] ?>" data-id="<?= $res['id'] ?>" data-title="<?= $res['title'] ?>">
                                <i class="fa-solid fa-heart"></i>
                            </span>
                            <span class="float-end">
                                <i class="fas fa-plus"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>'

    <?php
        }
    }

    ?>
</div>