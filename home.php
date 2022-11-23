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
    <title>Home</title>
    <!-- Including jQuery is required. -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="scriptajax.js"></script>

    <link rel="stylesheet" href="./style/home.css" type="text/css">
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


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


    <script>
    var xmlHttp;

    function checkProduct(str) {
        if (str.length == 0) {
            document.getElementById("display").innerHTML = "";
            document.getElementById("display").style.border = "0px";
            return;
        }
        xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = showproductnameStatus;

        var productname = document.getElementById("productname").value;
        var url = "checkProduct.php?productname=" + productname;
        console.log(url)
        xmlHttp.open("GET", url);
        xmlHttp.send();
    }

    function showproductnameStatus() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            document.getElementById("display").innerHTML = this.responseText;
            document.getElementById("display").style.color = "white";
        }
    }

    function print(query) {
        document.getElementById("demo").innerHTML = "asd";

    }
    </script>

    <!-- search -->
    <div class="search">
        <form>
            Search : <input id="productname" type="text" placeholder="Search" onkeyup="checkProduct(this.value)">
            <div id="display"></div>
        </form>
    </div>


    <!-- get data from get -->
    <?php $page = $_GET["data"]; ?>


    <!-- product -->
    <div class="container">
        <div class="items">
            <div class="box-container">
                <?php
                // Nav bar to main menu
                if ($page == "main") {
                    $items = $pdo->prepare("SELECT * FROM item");
                    $items->execute();
                    if ($items->rowCount() > 0) {
                        while ($row = $items->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <form action="cart.php" method="post" class="box">
                    <img src="image/<?php echo $row['item_id']; ?>.jpg">
                    <div class="name-item"><?php echo $row['item_name']; ?></div>
                    <div class="price-item"><?php echo $row['item_price']; ?></div>
                    <input type="number" min="1" name="item_quantity" value="1">
                    <input type="hidden" name="item_id" value=<?php echo $row['item_id']; ?>>
                    <input type="hidden" name="member_id" value=<?php echo  $_SESSION['user_login']; ?>>
                    <input type="submit" name="add" value="Add To Cart" class="add-to-cart">
                </form>
                <?php }
                    }
                } elseif ($page == "keyboard") {   // Nav bar to keybaord menu
                    $items = $pdo->prepare("SELECT * FROM item where item_type = 'คีย์บอร์ด'");
                    $items->execute();
                    if ($items->rowCount() > 0) {
                        while ($row = $items->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                <form action="cart.php" method="post" class="box">
                    <img src="image/<?php echo $row['item_id']; ?>.jpg">
                    <div class="name-item"><?php echo $row['item_name']; ?></div>
                    <div class="price-item"><?php echo $row['item_price']; ?></div>
                    <input type="number" min="1" name="item_quantity" value="1">
                    <input type="hidden" name="item_id" value=<?php echo $row['item_id']; ?>>
                    <input type="hidden" name="member_id" value=<?php echo  $_SESSION['user_login']; ?>>
                    <input type="submit" name="add" value="Add To Cart" class="add-to-cart">
                </form>
                <?php }
                    }
                } elseif ($page == "mouse") {   // Nav bar to keybaord menu
                    $items = $pdo->prepare("SELECT * FROM item where item_type = 'เม้าส์'");
                    $items->execute();
                    if ($items->rowCount() > 0) {
                        while ($row = $items->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                <form action="cart.php" method="post" class="box">
                    <img src="image/<?php echo $row['item_id']; ?>.jpg">
                    <div class="name-item"><?php echo $row['item_name']; ?></div>
                    <div class="price-item"><?php echo $row['item_price']; ?></div>
                    <input type="number" min="1" name="item_quantity" value="1">
                    <input type="hidden" name="item_id" value=<?php echo $row['item_id']; ?>>
                    <input type="hidden" name="member_id" value=<?php echo  $_SESSION['user_login']; ?>>
                    <input type="submit" name="add" value="Add To Cart" class="add-to-cart">
                </form>
                <?php }
                    }
                } elseif ($page == "headphone") {   // Nav bar to keybaord menu
                    $items = $pdo->prepare("SELECT * FROM item where item_type = 'หูฟัง'");
                    $items->execute();
                    if ($items->rowCount() > 0) {
                        while ($row = $items->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                <form action="cart.php" method="post" class="box">
                    <img src="image/<?php echo $row['item_id']; ?>.jpg">
                    <div class="name-item"><?php echo $row['item_name']; ?></div>
                    <div class="price-item"><?php echo $row['item_price']; ?></div>
                    <input type="number" min="1" name="item_quantity" value="1">
                    <input type="hidden" name="item_id" value=<?php echo $row['item_id']; ?>>
                    <input type="hidden" name="member_id" value=<?php echo  $_SESSION['user_login']; ?>>
                    <input type="submit" name="add" value="Add To Cart" class="add-to-cart">
                </form>
                <?php }
                    }
                } else {   // Nav bar from search menu
                    $items = $pdo->prepare("SELECT * FROM item where item_name LIKE '%$page%'");
                    $items->execute();
                    if ($items->rowCount() > 0) {
                        while ($row = $items->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                <form action="cart.php" method="post" class="box">
                    <img src="image/<?php echo $row['item_id']; ?>.jpg">
                    <div class="name-item"><?php echo $row['item_name']; ?></div>
                    <div class="price-item"><?php echo $row['item_price']; ?></div>
                    <input type="number" min="1" name="item_quantity" value="1">
                    <input type="hidden" name="item_id" value=<?php echo $row['item_id']; ?>>
                    <input type="hidden" name="member_id" value=<?php echo  $_SESSION['user_login']; ?>>
                    <input type="submit" name="add" value="Add To Cart" class="add-to-cart">
                </form>
                <?php }
                    }
                } ?>
            </div>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>

</html>