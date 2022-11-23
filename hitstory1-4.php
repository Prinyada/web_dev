<?php include "db.php" ?>
<?php
session_start();

if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
    header('location: signIn.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="history.css" type="text/css">
</head>

<body>
    <div class="profile">
        <?php
        if (isset($_SESSION['user_login'])) {
            $member_id = $_SESSION['user_login'];
            $stmt = $pdo->prepare("SELECT * FROM member WHERE member_id = $member_id");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        ?>
        <?php
        $sql = $pdo->prepare("SELECT `orderitem`.item_quantity,`item`.item_name,`item`.item_price,`order`.order_date 
        FROM `order` 
        INNER JOIN `orderitem`
        ON `order`.order_id = orderitem.order_id 
        INNER JOIN `member` 
        ON `member`.member_id = `order`.member_id 
        INNER JOIN `item` 
        ON `orderitem`.item_id = `item`.item_id 
        WHERE `order`.order_date  BETWEEN '2022-01-01 00:00:00' AND '2022-04-30 00:00:00' and `member`.member_id=$member_id 
        ORDER BY order_date DESC ");
        $sql->execute();

        ?>

        <!-- header -->
        <div class="header">
            <div id="container-left">
                <img src="logo.png" style="width: 200px;">
            </div>
            <div id="container-right">
                <label>account : </label> <?php echo $row['member_name']; ?></a>
                <span class="button-logout">
                    <a href="signIn.php">Logout</a>
                </span>
            </div>
        </div>
        <!-- navbar -->
        <ul id="main-bar">
            <li id="mini-bar"><a href="home.php?data=main">หน้าหลัก</a></li>
            <li id="mini-bar"><a href="home.php?data=keyboard">คีย์บอร์ด</a></li>
            <li id="mini-bar"><a href="home.php?data=mouse">เม้าส์</a></li>
            <li id="mini-bar"><a href="home.php?data=headphone">หูฟัง</a></li>
            <li id="mini-bar">
                <a>
                    <form action="cart.php" method="post" class="box">
                        <input type="hidden" name="member_id" value=<?php echo  $_SESSION['user_login']; ?>>
                        <input type="submit" name="adds" value="Cart" class="cart">
                    </form>
                </a>
            </li>
            <li id="mini-bar"><a href="./profile.php">โปรไฟล์</a></li>
        </ul>
        <section>
            <div class="profile-component">

                <?php
                $mem = $pdo->prepare("SELECT * FROM member WHERE member_id = $member_id");
                $mem->execute();
                if ($mem->rowCount() > 0) {
                    while ($row = $mem->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div action="" method="post" class="profilebox">
                    <h1>ข้อมูลส่วนตัว</h1>
                    <div class=""><?php echo $row['member_name']; ?></div>
                    <p>รหัสสมาชิก : <?php echo $row['member_id']; ?> </p>

                </div>

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link " href="./profile.php">ข้อมูลส่วนตัว</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./history.php">ประวัติการสั่งซื้อ</a>
                    </li>


                </ul>

                <div class="dropdown">
                    <button class="dropbtn">
                        วันที่ซื้อสินค้า
                    </button>
                    <div class="dropdown-content">
                        <a class="dropdown-item" href="./history.php">ทั้งหมด</a>
                        <a class="dropdown-item" href="./hitstory1-4.php">มกราคม-เมษายน</a>
                        <a class="dropdown-item" href="./history5-8.php">พฤษภาคม-สิงหาคม</a>
                        <a class="dropdown-item" href="./history9-12.php">กันยายน-ธันวาคม</a>
                    </div>
                </div>

                <table class="table">
                    <th>สินค้า</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th>วัน เดือน ปี</th>

                    <?php while ($row = $sql->fetch()) { ?>
                    <tr class="table-light">
                        <td><?= $row["item_name"] ?></td>
                        <td><?= $row["item_price"] * $row["item_quantity"] ?></td>
                        <td><?= $row["item_quantity"] ?></td>
                        <td><?= $row["order_date"] ?></td>

                    </tr>
                    <?php } ?>
                </table>

                <?php
                    };
                };
                ?>
            </div>
        </section>
    </div>
</body>

</html>