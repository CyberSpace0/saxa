<?php
ini_set('display_errors', 0);
$host = "db_mysql";
$user="root";
$pass ="root";
$database = "KSA";
$connect = mysqli_connect($host,$user,$pass,$database);
if(mysqli_connect_errno()){
    die("cannot connect ".mysqli_connect_error());
}
$id = $_GET['id'];
$query2 = "select * from product where id=".$id;
$result = mysqli_query($connect,$query2);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    
<body style="background-color: gray;">
<center><br><br><br><br><br><br><br><br><br>
<nav style="background-color: darkslateblue;width: 90%;">
<br><br>
<br>
<?php 

while ($row = mysqli_fetch_row($result)){
    echo '<img src="'.$row[1].'" style="width:15%" ><br><br><a>'.$row[2].'</a><br><br><a>'.$row[3].'</a>';
};


?>
<br><br>

</nav>
</body>
</html>
