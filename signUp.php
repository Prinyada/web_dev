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
    </head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }           
        @media (max-width: 980px) { /* mobile */
            * {
                font-size: 35px;
            }
            .container{
                padding-left: 10px;
                padding-right: 10px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                
            }
        }
        @media (max-width: 1049.99px) { /* tablet */
            * {
                font-size: 20px;
            }
            .container{          
                padding-left: 250px;
                padding-right: 250px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        }
        @media(min-width: 1050px) { /* laptop */
            * {
                font-size: 18px;
            }
            .container{
                padding-left: 350px;
                padding-right: 350px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        } 
    </style>
    <body>
        <div class="container">
            <h3 class="header">สมัครสมาชิก</h3>
            <hr>
            <form action="signUp_db.php" method="post">
                <?php if(isset($_SESSION['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']); // ไม่ให้ session ค้าง
                        ?>
                    </div>
                <?php } ?>
                <?php if(isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php 
                            echo $_SESSION['success'];
                            unset($_SESSION['success']); // ไม่ให้ session ค้าง
                        ?>
                    </div>
                <?php } ?>
                <?php if(isset($_SESSION['warning'])) { ?>
                    <div class="alert alert-waring" role="alert">
                        <?php 
                            echo $_SESSION['warning'];
                            unset($_SESSION['warning']); // ไม่ให้ session ค้าง
                        ?>
                    </div>
                <?php } ?>
                <div class="">
                    <label class="">Username</label><br>
                    <input type="text" class="" name="member_name">
                </div>
                <div class="">
                    <label class="">Email</label><br>
                    <input type="email" class="" name="member_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                </div>
                <div class="">
                    <label class="">tel</label><br>
                    <input type="text" class="" name="member_tel">
                </div>
                <div class="">
                    <label class="">Password</label><br>
                    <input type="password" class="" name="password">
                </div>
                <div class="">
                    <label class="">Confirm Password</label><br>
                    <input type="password" class="" name="c_password">
                </div>
                <button type="submit" class="" name="signUp">Sign Up</button>
            </form> 
        <hr>
        <a href="signIn.php">เข้าสู่ระบบ</a>
        </div>
    </body>
</html>