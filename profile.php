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

</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

* {
    font-family: 'Prompt', sans-serif;
}

body {
    background-color: #E0E0E0;
}

.profile-component {
    background-color: white;
    padding: 60px;
}

.nav-item .nav-link {
    color: #2C73C9;
}

.row {
    margin: 39px;
}

.col-md-6 p {
    color: #2C73C9;
}

.button .edit {
    border: none;
    border-radius: 30px;
    padding: 5px 10px;
    color: #6c757d;
    background-color: #E0E0E0;
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

    /* navbar */
    #main-bar {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
        width: 100%;
    }

    #mini-bar a {
        display: block;
        width: 100%;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    /* Change the link color to #111 (black) on hover */
    #mini-bar a:hover {
        background-color: #111;
    }
}

@media (min-width: 820px) and (max-width: 1024px) {

    /* tablet */
    .header {
        margin: 0px;
        padding: 20px 50px 130px 0px;
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

    /* ------------- navbar-------------- */
    #main-bar {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
        width: 100%;
    }

    #mini-bar a {
        display: block;
        width: 100%;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    /* Change the link color to #111 (black) on hover */
    #mini-bar a:hover {
        background-color: #111;
    }
}

@media (min-width: 1024px) {

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

    /* navbar */
    #main-bar {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    #mini-bar {
        float: left;
    }

    #mini-bar a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    /* Change the link color to #111 (black) on hover */
    #mini-bar a:hover {
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
    <div class="profile">
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
                        <a class="nav-link active" aria-current="page" href="./profile.php">ข้อมูลส่วนตัว</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./history.php">ประวัติการสั่งซื้อ</a>
                    </li>

                </ul>

                <div class="row">
                    <div class="col-md-6">
                        <label>รหัสสมาชิก</label>
                    </div>
                    <div class="col-md-6">
                        <p><?php echo $row['member_id']; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>ชื่อ</label>
                    </div>
                    <div class="col-md-6 ">
                        <p><?php echo $row['member_name']; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>เบอร์โทร</label>
                    </div>
                    <div class="col-md-6">
                        <p><?php echo $row['member_tel']; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>จังหวัด</label>
                    </div>
                    <div class="col-md-6">
                        <p><?php echo $row['member_province']; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>อีเมล</label>
                    </div>
                    <div class="col-md-6">
                        <p><?php echo $row['member_email']; ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <a></a>
                    </div>
                    <div class="col-md-6">
                        <span class="button">
                            <a class="edit" style="text-decoration: none; " href="./editprofile.php">แก้ไขข้อมูล</a>
                        </span>
                    </div>
                </div>


                
                <?php
                    };
                };
                ?>
            </div>
        </section>
    </div>
</body>

</html>