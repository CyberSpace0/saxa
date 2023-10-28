<?php
$host = "db_mysql";
$user="root";
$pass ="root";
$database = "KSA";
$connect = mysqli_connect($host,$user,$pass,$database);
if(mysqli_connect_errno()){
    die("cannot connect ".mysqli_connect_error());
}

$query2 = "select * from product";
$result2 = mysqli_query($connect,$query2);
$data = mysqli_fetch_all($result2);
$url = [$data[0][1],$data[1][1],$data[2][1]];
$title = [$data[0][2],$data[1][2],$data[2][2]];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body style="background-color: gray;">
<center><br><br><br><br><br>
<nav style="background-color: darkslateblue;width: 90%;">
<br><br>
<br>
<?php 

for ($i=0; $i <= 2; $i++) { 
    $x = $i +1;
    echo "<img src='".$url[$i]."' width='10%'><br><a href='product.php?id=".$x."'>".$title[$i]."</a><br><br>";
}


?>
<br><br><br><br><br><br><br><br><br>
</nav>
</center>

</body>
</html>
