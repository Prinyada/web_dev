<?php
    session_start();
    include "db.php";

    if(isset($_COOKIE["order"])){
        $id = $_COOKIE['order'];
        $check = 0;
        $stmt = $pdo->prepare("SELECT * FROM `orderitem` WHERE order_id=(?)");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            if ($row["item_id"] === $_POST["item_id"]) $check++;
        }
        if($check==0){
            //DELETE FROM table_name WHERE condition;
            $stmt = $pdo->prepare("DELETE FROM `order` WHERE order_id=(?)");
            $stmt->bindParam(1, $id);
            $stmt->execute();
        }



        setcookie("order","", time() + 3600 * 24);
    }
    
    setcookie("month","", time() + 3600 * 24);
    ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="./style/signIn.css" type="text/css">
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
            <div style="background-color: #FF5C5C;">
                <?php 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']); // ไม่ให้ session ค้าง
                        ?>
            </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
            <div>
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