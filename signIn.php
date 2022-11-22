<?php
    session_start();
    include "db.php";
    setcookie("order","", time() + 3600 * 24);
    ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="signIn.css" type="text/css">
</head>
<body>
    <div id="container-logo">
        <img src="logo.png" >
    </div>
    <div class="container">
        <h3 class="header">เข้าสู่ระบบ</h3>
        <hr>
        <form action="singIn_db.php" method="post">
            <?php if(isset($_SESSION['error'])) { ?>
            <div class="alert-danger">
                <?php 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']); // ไม่ให้ session ค้าง
                        ?>
            </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
            <div class="alert-success">
                <?php 
                            echo $_SESSION['success'];
                            unset($_SESSION['success']); // ไม่ให้ session ค้าง
                        ?>
            </div>
            <?php } ?>
            <div class="box">
                <label>Email</label><br>
                <input type="email" class="box-input" name="member_email" placeholder="enter email">
            </div>
            <div class="box">
                <label>Password</label><br>
                <input type="password" class="box-input" name="password" placeholder="enter password">
            </div>
            <div class="box">
                <button type="submit" class="button-submit" name="signIn">เข้าสู่ระบบ</button>
            </div>

        </form>
        <hr>
        <a href="signUp.php">สมัครสมาชิก</a>
    </div>
</body>

</html>