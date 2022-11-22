<?php
include "db.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showdata</title>
</head>

<body>
    <table class="table">
        <th>รหัสสินค้า</th>
        <th>ชื่อสินค้า</th>
        <th>จำนวนที่ขายได้</th>
        <th>จำนวนสินค้าในคลัง</th>
        <th>รวมราคา</th>

        <?php
        if ($_COOKIE["month"] == 0) { //for all month
            $query = $pdo->prepare("SELECT item.item_id,item.item_name,count(item.item_id) as sold,item.item_quantity,sum(item.item_price) as price 
            FROM `order` 
            INNER JOIN orderitem 
            ON `order`.order_id = orderitem.order_id 
            INNER JOIN member 
            ON member.member_id = `order`.member_id 
            INNER JOIN item 
            ON orderitem.item_id = item.item_id 
            GROUP BY item.item_name;");

            $query_sum_price = $pdo->prepare("SELECT sum(item.item_price) as price
            FROM `order`
            INNER JOIN orderitem
            ON `order`.order_id = orderitem.order_id
            INNER JOIN member
            ON member.member_id = `order`.member_id
            INNER JOIN item
            ON orderitem.item_id = item.item_id
            ");
        } else if ($_COOKIE["month"] != 0) { //for choosen month
            $query = $pdo->prepare("SELECT item.item_id,item.item_name,count(item.item_id) as sold,item.item_quantity,sum(item.item_price) as price 
            FROM `order` 
            INNER JOIN orderitem 
            ON `order`.order_id = orderitem.order_id 
            INNER JOIN member 
            ON member.member_id = `order`.member_id 
            INNER JOIN item 
            ON orderitem.item_id = item.item_id 
            WHERE MONTH(`order`.`order_date`) = ?
            GROUP BY item.item_name;");
            $query->bindParam(1, $_COOKIE["month"]);

            $query_sum_price = $pdo->prepare("SELECT sum(item.item_price) as price
            FROM `order`
            INNER JOIN orderitem
            ON `order`.order_id = orderitem.order_id
            INNER JOIN member
            ON member.member_id = `order`.member_id
            INNER JOIN item
            ON orderitem.item_id = item.item_id
            WHERE MONTH(`order`.`order_date`) = ?
            ");
            $query_sum_price->bindParam(1, $_COOKIE["month"]);
        }

        $query->execute();
        while ($row = $query->fetch()) { ?>
            <tr class="table-light" id="data_table">
                <td><?= $row["item_id"] ?></td>
                <td><?= $row["item_name"] ?></td>
                <td><?= $row["sold"] ?></td>
                <td><?= $row["item_quantity"] ?></td>
                <td><?= $row["price"] ?></td>
            </tr>
        <?php } ?>
    </table>
    <div id="sum_price">
        <?php

        $query_sum_price->execute();

        while ($row = $query_sum_price->fetch()) {
            if (empty($row["price"])) {
                echo "ไม่มีการขายในเดือนนี้";
            } else {
                echo "ยอดการขายทั้งหมด " . $row["price"] . " บาท";
            }
        }

        ?>
    </div>
</body>

</html>