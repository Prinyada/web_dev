<?php include "db.php"?>
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
    <title>Admin</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        display: inline-flex;
        /* flex-wrap: wrap; */
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


    @media (max-width: 820px) {

        /* mobile */
        .header {
            background-color: #28A4FF;
            margin: 0px;
        }
    }

    @media (max-width: 1049.99px) {

        /* tablet */
        .header {
            background-color: #28A4FF;
            margin: 0px;
        }
    }

    @media(min-width: 1050px) {

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
            display: block;
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
    if (isset($_SESSION['admin_login'])) {
        $member_id = $_SESSION['admin_login'];
        $stmt = $pdo->prepare("SELECT * FROM member WHERE member_id = $member_id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    ?>
    <!-- header -->
    <div class="header">
        <div id="container-left">
            <img src="logo.png" style="width: 400px;">
        </div>
        <div id="container-right">
            <label>account : </label> <?php echo $row['member_name']; ?></a>
            <span class="button-logout">
                <a href="signIn.php">Logout</a>
            </span>
        </div>
    </div> 
    <div class="content">

    </div>
</body>
</html>

