<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
<?php 
ini_set('display_errors', 0);
$jwt = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjEiLCJpYXQiOjE1MTYyMzkwMjJ9.1EUw90A2xwL40wJOlE5gNDBCLdDDMG3JkW5f5ChoYKI';
setcookie("id",$jwt,time()+60*60*24*30,'/');

$a = $_COOKIE['id'];
$x = explode(".",$a);
$data = base64_decode($x[1]);
$id = intval(substr($data,7,5));
if ($id == 1500) {
    echo "AOL{654e62e9b715c5df3328471523130627}";
}
else{
    echo 'normal user';
}



?>

</body>
</html>
