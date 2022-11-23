<?php
session_start();
include "db.php"
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="getprovince.js"></script>
    <link rel="stylesheet" href="./style/signUp.css" type="text/css">
</head>
<body>
    <div id="container-logo">
        <img src="logo.png">
    </div>
    <div class="container">
        <h3 class="header">สมัครสมาชิก</h3>
        <hr>
        <form action="signUp_db.php" method="post">
            <?php if (isset($_SESSION['error'])) { ?>
            <div style="background-color: #FF5C5C;">
                <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']); // ไม่ให้ session ค้าง
                    ?> 
            </div>
            <?php } ?>
            <?php if (isset($_SESSION['success'])) { ?>
            <div style="background-color: #7DE85D;">
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']); // ไม่ให้ session ค้าง
                    ?>
            </div>
            <?php } ?>
            <?php if (isset($_SESSION['warning'])) { ?>
            <div class="content" style="background-color: #FF5C5C;">
                <?php
                    echo $_SESSION['warning'];
                    unset($_SESSION['warning']); // ไม่ให้ session ค้าง
                    ?>
            </div>
            <?php } ?>
            <div class="box">
                <label>Username</label><br>
                <input type="text" class="box-input" name="member_name">
            </div>
            <div class="box">
                <label>Email</label><br>
                <input type="email" class="box-input" name="member_email"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
            </div>
            <div class="box">
                <label>tel</label><br>
                <input type="text" class="box-input" name="member_tel"
                pattern="^0[0-9]{9}">
            </div>
            <div class="box">
                <label>จังหวัด</label><br>
                <select name="province" id="province"></select>
            </div>
            <div class="box">
                <label>Password</label><br>
                <input type="password" class="box-input" name="password">
            </div>
            <div class="box">
                <label>Confirm Password</label><br>
                <input type="password" class="box-input" name="c_password">
            </div>
            <div class="box">
                <button type="submit" class="button-submit" name="signUp">Sign Up</button>
            </div>
        </form>
        <hr>
        <a href="signIn.php">เข้าสู่ระบบ</a>
    </div>
</body>

</html>