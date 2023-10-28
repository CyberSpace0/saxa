<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files</title>
</head>
<body style="background-color: #808080">
<center><br><br><br><br><br><br><br><br><br><br><br>
<form method="post" enctype="multipart/form-data">
<input type="file" name="file" accept="multi/part"><input type="submit" name="submit" value="send">
</form>
<?php
echo '<br>png file is best choice<br>';
$x = $_FILES['file'];
$tmp = $x['tmp_name'];
$size = $x['size'];
if(isset($_FILES['file'])){
    if ($size > 20) {
        $content = file_get_contents($tmp);
        $ex = substr($content,1,3);
        $name = random_int(100,999);
        $path = dirname(__FILE__).'/uploads/'.$name.'.'.strtolower($ex);
        move_uploaded_file($tmp,$path);
    }
    else{
        echo 'the size is very small';
    }
}


?>
</center>    

</body>
</html>
