<?php
     require __DIR__ . '/../../vendor/autoload.php';

     use App\db;
     
     $conn = db::connect();
            $sql = "select o.id,u.first_name u_name,o.total,o.discount,o.comment,o.payment,o.trxid,o.status,o.b_address,o.s_address from `order` o,`users` u where o.user_id=u.id and o.status='recived' ORDER BY id DESC";
            $result = $conn->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['u_name']; ?></td>
                        <td><?= $row['total']; ?></td>
                        <td><?= $row['discount']; ?></td>
                        <td><?= $row['comment']; ?></td>
                        <td><?= $row['payment']; ?></td>
                        <td><?= $row['trxid']; ?></td>
                        <td><?= $row['status']; ?></td>
                        <td><?= $row['b_address']; ?></td>
                        <td><?= $row['s_address']; ?></td>
                        <td>
                                        <a class="btn btn-outline-primary" href="manageorder.php?id=<?= $row['id']; ?>">Details</a>
                        </td>

                                </tr>
            <?php
                            }
                        }
            ?>