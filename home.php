<?php include "db.php"?>
<?php
    session_start();

    if(!isset($_SESSION['user_login'])){
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
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    * {
        font-family: 'Prompt', sans-serif;
    } 
    @media (max-width: 820px) { /* mobile */
        .header {
            background-color: #28A4FF;
            margin: 0px;
        }
    }
    @media (max-width: 1049.99px) { /* tablet */
        .header {
            background-color: #28A4FF;
            margin: 0px;
        }
    }
    @media(min-width: 1050px) { /* laptop */
        .header { 
            margin: 0px;
            padding: 20px 50px 20px 0px;
            font-size: 22px;
            color: #FFFFFF;
            text-align: right;
            background-color: #2C73C9;
            list-style-type: none;
        }  
        .button-logout a:link,a:visited {
            background-color: #FF5C5C;
            padding: 5px 10px;
            display: inline-block;
            text-decoration: none;
            border-radius: 3px;
            color: #FFFFFF;
        }
        .content {
            width: 50px;
            height: 50px;
            background-color: green;
            display: inline;
            margin: 0;
            padding: 0;
        }
        .content .type {
            background-color: yellow;
        }
        .content .content-item {
            background-color: green;
        }
    } 
</style>
<body>
    <div class="container">
        <?php
            if(isset($_SESSION['user_login'])){
                $member_id = $_SESSION['user_login'];
                $stmt = $pdo->prepare("SELECT * FROM member WHERE member_id = $member_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        ?>
        <div class="header">
            <label>account : </label>&nbsp;<?php echo $row['member_name'];?>
            <div class="button-logout">
                <a href="signIn.php">Logout</a>
            </div>
        </div>
        <div class="items">
            <div class="box-container">
                <?php
                    $items = $pdo->prepare("SELECT * FROM item");
                    $row = $items->fetch(PDO::FETCH_ASSOC);

                    if($items->rowCount() > 0){
                        
                    
                ?>
                    <form action="" method="post" class="box">
                        <!-- <img src="image/"> -->
                        
                    </form>
                <?php
                    // };
                };    
                ?>
            </div>
        </div>
    </div>
</body>
</html>