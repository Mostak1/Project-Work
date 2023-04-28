<?php
require __DIR__ . '/vendor/autoload.php';
$page = "Registration";
// <!-- connetion  -->
use App\db;

$conn = db::connect();
$did =$_POST['division_id'];
echo $did;
                                $sqds = "SELECT * FROM `districts` where `division_id`='$did'";
                                $ds = $conn->query($sqds);

                                if ($ds->num_rows) {
                                    while ($dsr = $ds->fetch_assoc()) {
                                ?>
                                        <option value="<?= $dsr['id'] ?>"><?= $dsr['name'] ?></option>

                                <?php    }
                                }
                                ?>