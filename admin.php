<?php include "db.php" ?>
<?php
session_start();
setcookie("month",0, time() + (86400 * 30)); 

if (!isset($_SESSION['admin_login'])) {
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
    <link rel="stylesheet" href="admin.css" type="text/css">
</head>
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
            <img src="logo.png">
        </div>
        <div id="container-right">
            <label>account : </label> <?php echo $row['member_name']; ?></a>
            <span class="button-logout">
                <a href="signIn.php">Logout</a>
            </span>
        </div>
    </div>
    
    <div class="content">
        <div class="dropdown">
            <label for="">เดือน : </label>
            <select id="month-list" onchange=getmonth()>
                <option value="0">ทั้งหมด</option>
                <option value="1">มกราคม</option>
                <option value="2">กุมพาพันธ์</option>
                <option value="3">มีนาคม</option>
                <option value="4">เมษายน</option>
                <option value="5">พฤษภาคม</option>
                <option value="6">มิถุนายน</option>
                <option value="7">กรกฎาคม</option>
                <option value="8">สิงหาคม</option>
                <option value="9">กันยายน</option>
                <option value="10">ตุลาคม</option>
                <option value="11">พฤษจิกายน</option>
                <option value="12">ธันวาคม</option>
            </select>
        </div>

        <script>
            var httpRequest;

            function send() {
                httpRequest = new XMLHttpRequest();
                httpRequest.onreadystatechange = showResult;
                var url= "adminshowdata.php";
                httpRequest.open("GET", url);
                httpRequest.send();
            }

            function showResult() {
                if (httpRequest.readyState == 4 && httpRequest.status == 200) {
                    document.getElementById("data_table").innerHTML = httpRequest.responseText;
                }
            }
        
            function getmonth() {
                var get_month = document.getElementById("month-list")
                var value = get_month.value
                var text = get_month.options[ get_month.selectedIndex].text;
                var month = document.cookie = "month=" + value //create cookie
                console.log()
                send()
            }
            getmonth()
        </script>
        
       <div id="data_table">

       </div>
    </div>
    <?php include 'footer.php';?>
</body>

</html>