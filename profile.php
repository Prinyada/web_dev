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
    <link rel="stylesheet" href="./style/profile.css" type="text/css">

</head>


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
    <section>
        <div class="profile">
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
        </div>
    </section>
    <?php include 'footer.php';?>
</body>

</html>