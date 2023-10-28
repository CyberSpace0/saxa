<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scoreboard</title>
</head>
<body style="background-color: gray;">
    <center><br>
    <img src="https://adfs.kfu.edu.sa/adfs/portal/logo/logo.png"><br>
    <?php
    
    $connect = mysqli_connect('localhost','root','123456789','ctfd');
    $qu = "select max(score),fullname from account";
    $rx = mysqli_query($connect, $qu);
    $d = mysqli_fetch_array($rx);
    echo "<h2>The First person ".$d['fullname']." | ".$d['max(score)']."<br></h2>";

    $query = "select fullname,score from account";
    $result = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo $row["fullname"]." | ".$row["score"]."<br>";
    }
    ?>
    </center>
</body>
</html>