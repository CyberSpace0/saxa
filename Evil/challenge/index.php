<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>injection</title>
</head>
<body>
<a href="?a=guest"></a>

<?php
ini_set('display_errors', 0);
$x = $_GET['a'];
eval("echo $x;");

?>

</body>
</html>
