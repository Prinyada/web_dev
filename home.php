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

</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

    .box-container {
        display: block;
        justify-content: center;
        align-items: center;
    }

    .search {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }

    /* navbar */
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

@media (min-width: 820px) and (max-width: 1024px) {
    body {
        display: block;
    }

    /* tablet */
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

    .cantainer {
        justify-content: center;
        align-items: center;
    }

    .box-container {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 40%;
    }

    .search {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }

    /*--------------- navbar ---------------*/
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
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

@media (min-width: 1024px) {

    /* laptop */
    .header {
        /* margin: 0px; */
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

    .box-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .search {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }

    /* navbar */
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    /* li {
            float: left;
        } */

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
</body>



</html>