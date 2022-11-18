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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    * {
        font-family: 'Prompt', sans-serif;
    }

    body {
        background-color: #E0E0E0;
    }

    img {
        max-width: 200px;
    }
    @media (max-width: 820px) {
        /* mobile */
        .header {
            margin: 0px;
            padding: 20px 50px 130px 0px;
            font-size: 20px;
            color: #FFFFFF;
            background-color: #2C73C9;
            width: 100%;
        }
        .container-left img {
            max-width: 150px;
        }
        #container-left {
            float: left;
            width: 70%;
        }

        #container-left img {
            margin-left: 20px;
            margin-top: 15px;
        }

        #container-right {
            text-align: right;
            float: right;
            width: 30%;
        }
        .button-logout a:link,
        a:visited {
            background-color: #FF5C5C;
            padding: 5px 10px;
            display: inline-block;
            text-decoration: none;
            border-radius: 3px;
            color: #FFFFFF;
            margin-top: 10px;

        }

        .button-logout a:hover {
            background-color: #CD5C5C;
        }

        .button-cart a.cart:link,
        a.cart:visited {
            background-color: #32CD32;
            padding: 5px 115px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            border-radius: 3px;
            color: #FFFFFF;
            margin-top: 5px;
        }
        /* -------------- cart ----------------*/
        .box-container {
            display: block;
            margin-left: auto;
            margin-right: auto;  
            width: 40%;
        }
        .items {
            display: flex;
            justify-content: center;
        }

        .items .box-container .box {
            text-align: center;
            border-radius: 5px;
            box-shadow: 0px 5px 10px #BEBEBE;
            border: 2px solid #000000;
            position: relative;
            padding: 20px 25px 20px 20px;
            max-width: 250px;
            margin: 20px;
            background-color: #FFFFFF;
        }

        .items .box-container .box .add-to-cart {
            border: none;
            border-radius: 3px;
            background-color: #28A4FF;
            margin-top: 10px;
            padding: 10px;
        }

        .items .box-container .box .add-to-cart:hover {
            background-color: #87CEEB;
        }

        .items .box-container .box input[type="number"] {
            width: 100%;
            border: 2px solid #000000;
            border-radius: 5px;
            color: #000000;
            padding: 5px 5px 5px 10px;
            margin: 5px 0px;
        }

        #sum_price {
            margin: 10px;
            color: #28A4FF;
            font-weight: bold;
            font-size: 18px;
        }

        .shopping-cart {
            padding: 20px 50px 10px 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .shopping-cart table {
            width: 60%;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0px 5px 10px #BEBEBE;
            border: 2px solid #000000;
            background-color: #FFFFFF;
        }

        .shopping-cart table thead {
            background-color: #2C3E50;
        }

        .shopping-cart table thead th {
            padding: 10px;
            color: #FFFFFF;
            font-size: 20px;
        }

        .table-button {
            margin-top: 15px;
            text-align: center;
        }

        h3 .choose {
            font-size: 20px;
        }
        /* --------------- navbar -------------------*/
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            width: 100%;
        }
        li a {
            display: block;
            width: 100%;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* Change the link color to #111 (black) on hover */
        li a:hover {
            background-color: #111;
        }

    }

    @media (min-width: 820px) and (max-width: 1024px){
        /* tablet */
        body {
            display: block;
        }
        
        .header {
            margin: 0px;
            padding: 20px 50px 100px 0px;
            font-size: 20px;
            color: #FFFFFF;
            background-color: #2C73C9;
            width: 100%;
        }

        #container-left {
            float: left;
            width: 70%;
        }

        #container-left img {

            margin-left: 20px;
            margin-top: 15px;
        }

        #container-right {
            text-align: right;
            float: right;
            width: 30%;
        }
        .button-logout a:link,
        a:visited {
            background-color: #FF5C5C;
            padding: 5px 10px;
            display: inline-block;
            text-decoration: none;
            border-radius: 3px;
            color: #FFFFFF;
            margin-top: 10px;

        }

        .button-logout a:hover {
            background-color: #CD5C5C;
        }

        .button-cart a.cart:link,
        a.cart:visited {
            background-color: #32CD32;
            padding: 5px 115px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            border-radius: 3px;
            color: #FFFFFF;
            margin-top: 5px;
        }
        /* -------------- cart ----------------*/
        .box-container {
            display: block;
            margin-left: auto;
            margin-right: auto;  
            width: 40%;
        }
        .items {
            display: flex;
            justify-content: center;
        }

        .items .box-container .box {
            text-align: center;
            border-radius: 5px;
            box-shadow: 0px 5px 10px #BEBEBE;
            border: 2px solid #000000;
            position: relative;
            padding: 20px 25px 20px 20px;
            max-width: 250px;
            margin: 20px;
            background-color: #FFFFFF;
        }

        .items .box-container .box .add-to-cart {
            border: none;
            border-radius: 3px;
            background-color: #28A4FF;
            margin-top: 10px;
            padding: 10px;
        }

        .items .box-container .box .add-to-cart:hover {
            background-color: #87CEEB;
        }

        .items .box-container .box input[type="number"] {
            width: 100%;
            border: 2px solid #000000;
            border-radius: 5px;
            color: #000000;
            padding: 5px 5px 5px 10px;
            margin: 5px 0px;
        }

        #sum_price {
            margin: 10px;
            color: #28A4FF;
            font-weight: bold;
            font-size: 18px;
        }

        .shopping-cart {
            padding: 20px 50px 10px 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .shopping-cart table {
            width: 60%;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0px 5px 10px #BEBEBE;
            border: 2px solid #000000;
            background-color: #FFFFFF;
        }

        .shopping-cart table thead {
            background-color: #2C3E50;
        }

        .shopping-cart table thead th {
            padding: 10px;
            color: #FFFFFF;
            font-size: 20px;
        }

        .table-button {
            margin-top: 15px;
            text-align: center;
        }

        h3 .choose {
            font-size: 20px;
        }

        /* ------------- navbar ----------------*/
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            width: 100%;
        }
        li a {
            display: block;
            width: 100%;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* Change the link color to #111 (black) on hover */
        li a:hover {
            background-color: #111;
        }
    }

    @media (min-width: 1024px){

        /* laptop */
        .header {
            margin: 0px;
            padding: 20px 50px 100px 0px;
            font-size: 20px;
            color: #FFFFFF;
            background-color: #2C73C9;
            width: 100%;
        }

        #container-left {
            float: left;
            width: 70%;
        }

        #container-left img {
            margin-left: 20px;
            margin-top: 15px;
        }

        #container-right {
            text-align: right;
            float: right;
            width: 30%;
        }

        .button-logout a:link,
        a:visited {
            background-color: #FF5C5C;
            padding: 5px 10px;
            display: inline-block;
            text-decoration: none;
            border-radius: 3px;
            color: #FFFFFF;
            margin-top: 10px;

        }

        .button-logout a:hover {
            background-color: #CD5C5C;
        }

        .button-cart a.cart:link,
        a.cart:visited {
            background-color: #32CD32;
            padding: 5px 115px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            border-radius: 3px;
            color: #FFFFFF;
            margin-top: 5px;
        }

        .items {
            display: flex;
            justify-content: center;
        }

        .items .box-container .box {
            text-align: center;
            border-radius: 5px;
            box-shadow: 0px 5px 10px #BEBEBE;
            border: 2px solid #000000;
            position: relative;
            padding: 20px 25px 20px 20px;
            max-width: 250px;
            margin: 20px;
            background-color: #FFFFFF;
        }

        .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
        }

        .items .box-container .box .add-to-cart {
            border: none;
            border-radius: 3px;
            background-color: #28A4FF;
            margin-top: 10px;
            padding: 10px;
        }

        .items .box-container .box .add-to-cart:hover {
            background-color: #87CEEB;
        }

        .items .box-container .box input[type="number"] {
            width: 100%;
            border: 2px solid #000000;
            border-radius: 5px;
            color: #000000;
            padding: 5px 5px 5px 10px;
            margin: 5px 0px;
        }

        #sum_price {
            margin: 10px;
            color: #28A4FF;
            font-weight: bold;
            font-size: 18px;
        }

        .shopping-cart {
            padding: 20px 50px 10px 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .shopping-cart table {
            width: 60%;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0px 5px 10px #BEBEBE;
            border: 2px solid #000000;
            background-color: #FFFFFF;
        }

        .shopping-cart table thead {
            background-color: #2C3E50;
        }

        .shopping-cart table thead th {
            padding: 10px;
            color: #FFFFFF;
            font-size: 20px;
        }

        .table-button {
            margin-top: 15px;
            text-align: center;
        }

        h3 .choose {
            font-size: 20px;
        }

        /* navbar */
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: flex;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* Change the link color to #111 (black) on hover */
        li a:hover {
            background-color: #111;
        }

        /* Change the link color to #111 (black) on hover */
        li a:hover {
            background-color: #111;
        }

        .choose {
            margin-top: 20px;
            font-size: 25px;
            text-align: center;
        }
    }
</style>

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
                        <form method="post">
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
                    <form method="post">
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
                <form method="post">
                    <input type="submit" name="submit" value="สั่งซื้อ" />
                </form>
            </div>
    <?php
        }
    }

    ?>

</body>


</html>