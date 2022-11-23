<?php include "db.php" ?>
<?php
session_start();
ob_start();
if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
    header('location: signIn.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<title>Cart</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="./style/cart.css" type="text/css">
<body>
    <?php
    if (isset($_SESSION['user_login'])) {
        $member_id = $_SESSION['user_login'];
        $stmt = $pdo->prepare("SELECT * FROM member WHERE member_id = $member_id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    ?>
    <!-- header -->
    <div class="header">
        <div id="container-left">
            <img src="logo.png">
        </div>
        <div id="container-right">
            <label>account : </label> <?php echo $row['member_name']; ?></a>
            <span class="button-logout">
                <a href="signIn.php">Logout</a>
            </span>
        </div>
    </div>
    <!-- navbar -->
    <ul>
        <li><a href="home.php?data=main">หน้าหลัก</a></li>
        <li><a href="home.php?data=keyboard">คีย์บอร์ด</a></li>
        <li><a href="home.php?data=mouse">เม้าส์</a></li>
        <li><a href="home.php?data=headphone">หูฟัง</a></li>
        <li>
            <a>
                <form action="cart.php" method="post" class="box">
                    <input type="hidden" name="member_id" value=<?php echo  $_SESSION['user_login']; ?>>
                    <input type="submit" name="adds" value="Cart" class="cart">
                </form>
            </a>
        </li>
        <li><a href="./profile.php">โปรไฟล์</a></li>
    </ul>
    <?php
    if (!empty($_POST['add'])) {
        if ($_POST['add'] === "Add To Cart") {
            if (empty($_COOKIE["order"])) {
                
                $a = date("Y-m-d H:i:s");
                $stmt = $pdo->prepare("INSERT INTO `order` (order_date,member_id,order_id) VALUES (?,?,null)");
                $stmt->bindParam(1, $a);
                $stmt->bindParam(2, $_POST["member_id"]);
                $stmt->execute();
                $order_id = $pdo->lastInsertId();
                setcookie("order", $order_id, time() + 3600 * 24);
                $stmt = $pdo->prepare("INSERT INTO `orderitem` (item_id,order_id,item_quantity) VALUES (?,?,?)");
                $stmt->bindParam(1, $_POST["item_id"]);
                $stmt->bindParam(2, $order_id);
                $stmt->bindParam(3, $_POST["item_quantity"]);
                $stmt->execute();
                $total_price = 0;
                $stmt = $pdo->prepare("SELECT item.item_id,item.item_name,item.item_price,orderitem.item_quantity
                               FROM `orderitem` INNER JOIN `item` WHERE orderitem.item_id = item.item_id and orderitem.order_id=$order_id");
                $stmt->execute();

                while ($row = $stmt->fetch()) {
                    $total_price += ($row["item_quantity"] * $row["item_price"]);
    ?>
                    <div class="shopping-cart">
                        <h1 class="heading"></h1>
                        <table>
                            <thead>
                                <th>image</th>
                                <th>name</th>
                                <th>price</th>
                                <th>quantity</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src='image/<?= $row["item_id"] ?>.jpg' width='100'><br></td>
                                    <td><?= $row["item_name"] ?></td>
                                    <td><?= $row["item_price"] ?></td>
                                    <td>
                                        <form method="post" action="edit.php">
                                            <input type="submit" name="edit" value="+">&nbsp;<?= $row["item_quantity"] ?>&nbsp;<input type="submit" name="edit" value="-">
                                            <input type="hidden" name="item_id" value=<?php echo $row['item_id']; ?>>
                                            <input type="hidden" name="order_id" value=<?php echo $order_id; ?>>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-button">
                        <a id="sum_price"><?= "ราคารวม : " . $total_price . " บาท" ?></a>
                        <form method="post" class="confirm">
                            <input type="submit" name="submit" value="สั่งซื้อ" />
                        </form>
                    </div>
                <?php
                }

                if (array_key_exists('submit', $_POST)) {
                    submit();
                }
                function submit()
                {
                    
                    header('location:home.php');
                }

                ?>
                <?php
            }
            if (isset($_COOKIE["order"])) {
                function submit()
                {
                    setcookie("order", "", time() + 3600 * 24);
                    header('location:home.php');
                }
                if (array_key_exists('submit', $_POST)) {
                    submit();
                }

                $id = $_COOKIE['order'];
                $check = 0;
                $stmt = $pdo->prepare("SELECT * FROM `orderitem` WHERE order_id=(?)");
                $stmt->bindParam(1, $id);
                $stmt->execute();
                while ($row = $stmt->fetch()) {
                    if ($row["item_id"] === $_POST["item_id"]) $check++;
                }
                if ($check == 0) {
                    $stmt = $pdo->prepare("SELECT order_id FROM `order` WHERE member_id = (?) and order_id=(?)");
                    $stmt->bindParam(1, $_POST["member_id"]);
                    $stmt->bindParam(2, $id);
                    $stmt->execute();
                    $order_id = $stmt->fetch()[0];
                    $stmt = $pdo->prepare("INSERT INTO `orderitem` (item_id,order_id,item_quantity) VALUES (?,?,?)");
                    $stmt->bindParam(1, $_POST["item_id"]);
                    $stmt->bindParam(2, $order_id);
                    $stmt->bindParam(3, $_POST["item_quantity"]);
                    $stmt->execute();
                }

                $total_price = 0;
                $id = $_COOKIE['order'];
                $stmt = $pdo->prepare("SELECT item.item_id,item.item_name,item.item_price,orderitem.item_quantity
                                        FROM `orderitem` INNER JOIN `item` WHERE orderitem.item_id = item.item_id and orderitem.order_id=$id");
                $stmt->execute();
                while ($row = $stmt->fetch()) {
                    $total_price += ($row["item_quantity"] * $row["item_price"]);
                ?>
                    <div class="shopping-cart">
                        <h1 class="heading"></h1>
                        <table>
                            <thead>
                                <th>image</th>
                                <th>name</th>
                                <th>price</th>
                                <th>quantity</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src='image/<?= $row["item_id"] ?>.jpg' width='100'><br></td>
                                    <td><?= $row["item_name"] ?></td>
                                    <td><?= $row["item_price"] ?></td>
                                    <td>
                                        <form method="post" action="edit.php">
                                            <input type="submit" name="edit" value="+">&nbsp;<?= $row["item_quantity"] ?>&nbsp;<input type="submit" name="edit" value="-">
                                            <input type="hidden" name="item_id" value=<?php echo $row['item_id']; ?>>
                                            <input type="hidden" name="order_id" value=<?php echo $_COOKIE['order']; ?>>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php
                }
                ?>
                <div class="table-button">
                    <a id="sum_price"><?= "ราคารวม : " . $total_price . " บาท" ?></a>
                    <form method="post" class="confirm">
                        <input type="submit" name="submit" value="สั่งซื้อ" />
                    </form>
                </div>
            <?php
            }
        }
    } else {
        if (!isset($_COOKIE["order"])) {
            ?>
            <div class="choose">
                <p>เลือกสินค้าก่อน</p>
            </div>
            
            <?php
        } else {
            function submit()
            {
                setcookie("order", "", time() + 3600 * 24);
                header('location: home.php?data=main');
            }
            if (array_key_exists('submit', $_POST)) {
                submit();
            }

            $total_price = 0;
            $id = $_COOKIE['order'];
            $stmt = $pdo->prepare("SELECT item.item_id,item.item_name,item.item_price,orderitem.item_quantity
                                    FROM `orderitem` INNER JOIN `item` WHERE orderitem.item_id = item.item_id and orderitem.order_id=$id");
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $total_price += ($row["item_quantity"] * $row["item_price"]);
            ?>
                <div class="shopping-cart">
                    <h1 class="heading"></h1>
                    <table>
                        <thead>
                            <th>image</th>
                            <th>name</th>
                            <th>price</th>
                            <th>quantity</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src='image/<?= $row["item_id"] ?>.jpg' width='100'><br></td>
                                <td><?= $row["item_name"] ?></td>
                                <td><?= $row["item_price"] ?></td>
                                <td>
                                    <form method="post" action="edit.php">
                                        <input type="submit" name="edit" value="+">&nbsp;<?= $row["item_quantity"] ?>&nbsp;<input type="submit" name="edit" value="-">
                                        <input type="hidden" name="item_id" value=<?php echo $row['item_id']; ?>>
                                        <input type="hidden" name="order_id" value=<?php echo $_COOKIE['order']; ?>>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php
            }
            ?>
            <div class="table-button">
                <a id="sum_price"><?= "ราคารวม : " . $total_price . " บาท" ?></a>
                <form method="post" class="confirm">
                    <input type="submit" name="submit" value="สั่งซื้อ" />
                </form>
            </div>
    <?php
        }
    }

    ?>

</body>


</html>