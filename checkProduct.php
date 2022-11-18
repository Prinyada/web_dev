<script src="scriptajax.js"></script>
<?php
include "db.php";
$data = $_GET["productname"];
$stmt = $pdo->prepare("SELECT * FROM item WHERE item_name LIKE '%$data%'");
$stmt->execute();
echo '
<ul>
   ';
   //Fetching result from database.
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       ?>
   <li onclick='fill("<?=$row["item_name"]; ?>")'>
   <a href="home.php?data=<?php echo $row['item_name']; ?>">
       <?php echo $row['item_name']; ?>
   </li></a>
   <?php
}
?>
</ul>