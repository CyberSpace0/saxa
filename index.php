<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenges</title>
</head>
<body style="background-color: #001933;">
<style>
    .topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
</style>
<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="scoreboard.php">scoreboard</a>
</div> 
<?php
$cookie = htmlentities($_COOKIE['sessionid'],ENT_QUOTES);
$connect = mysqli_connect("localhost","root","123456789","ctfd");
$challengs = ["1" => "enc","2" => "Evil","3" => "Hiddin","4" => "Internal","5" => "search_engine","6" => "files","7" => "product"];
$xd = "/var/www/html/".$challengs[$_GET['challenge']]."_ports";
$ports = file($xd);
$cc = count($ports);
if(!isset($_COOKIE['sessionid'])){
    header('Location: login.php');
    die();
}
if(isset($_COOKIE['sessionid'])){
    if(isset($_GET['challenge'])){
        $d = true;
        $x = 0;
        $nn = $challengs[$_GET['challenge']];
        $queryx = "select * from user where session='".$cookie."' and challenge='".$nn."'";# need filter in $_COOKIE
        $resultx = mysqli_query($connect,$queryx);
        if(strlen(mysqli_fetch_assoc($resultx)['port']) > 0){
            $data = mysqli_fetch_assoc($resultx)['port'];
        }
        else{
            while ($d) {
                $pp = $ports[$x];
                $query = "select * from user where port='".$pp."'";
                $x = $x + 1;
                $result = mysqli_query($connect,$query);
                if(strlen(mysqli_fetch_assoc($result)['port']) < 1){
                    $d = false;
                }
                if($x == $cc){
                    $d = false;
                }
        
            }
            if($d == false){
                $query1 = "insert into user(challenge,port,session) values('".$nn."','".$pp."','".$_COOKIE['sessionid']."')";
                $result1 = mysqli_query($connect,$query1);    
                $data = $pp;
            }
        }
        
        
    }
}


?>
<style>
.xa:hover {
    font-size: 45px;
}

</style>
<center><br><br>
    <nav style="padding-top: 2%;background-image: url('https://www.hackthebox.com/images/unictf2020/og.png');width:90%" >
    <ul>
        <li><h3><a class="xa" style="list-style-type: none;color: white;text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;display: inline-block;transition-duration: 0.5s ;transition-property: font-size;" href="?challenge=1"> enc</a></li><br><br></h3>
        <li><h3><a class="xa" style="list-style-type: none;color: white;text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;display: inline-block;transition-duration: 0.5s ;transition-property: font-size;" href="?challenge=2"> Evil</a></li><br><br></h3>
        <li><h3><a class="xa" style="list-style-type: none;color: white;text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;display: inline-block;transition-duration: 0.5s ;transition-property: font-size;" href="?challenge=3"> Hiddin</a></li><br><br></h3>
        <li><h3><a class="xa" style="list-style-type: none;color: white;text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;display: inline-block;transition-duration: 0.5s ;transition-property: font-size;" href="?challenge=4"> Internal</a></li><br><br></h3>
        <li><h3><a class="xa" style="list-style-type: none;color: white;text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;display: inline-block;transition-duration: 0.5s ;transition-property: font-size;" href="?challenge=5"> search_engine</a></li><br><br></h3>
        <li><h3><a class="xa" style="list-style-type: none;color: white;text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;display: inline-block;transition-duration: 0.5s ;transition-property: font-size;" href="?challenge=6"> files</a></li><br><br></h3>
        <li><h3><a class="xa" style="list-style-type: none;color: white;text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;display: inline-block;transition-duration: 0.5s ;transition-property: font-size;" href="?challenge=7"> product</a></li><br><br></h3>

    </ul>
    
<form action="" method="post" >
    <input type="text" name="flag">
    <input type="submit" value="send flag">
</form>    <br>

<?php
// for the flag

if(isset($_POST["flag"])){
    if(isset($_GET['challenge'])){
        $flag = $_POST['flag'];
        $flag = htmlentities($flag, ENT_QUOTES);
        $fquery = "select * from flag where flag='".$flag."'";
        $fresult = mysqli_query($connect,$fquery);
        $point = mysqli_fetch_assoc($fresult)["point"];
        if(strlen($point) > 1){# to check if the user already sent the flag
            $point = intval($point);
            $cquery = "select * from challenge where session='".$cookie."' and challenge='".$challengs[$_GET['challenge']]."'";
            $cresult = mysqli_query($connect,$cquery);
            $crow = mysqli_fetch_assoc($cresult)['session'];
            if(strlen($crow) > 1){
                echo '<script>alert("YOU ENTER THIS FLAG BEFORE")</script>';
            }
            else{
                $squery = "insert into challenge(session,challenge) values('".$cookie."','".$challengs[$_GET['challenge']]."')";
                $sresult = mysqli_query($connect,$squery);
                # 
                $scorequery = "select * from account where session='".$cookie."'";
                $scoreresult = mysqli_query($connect,$scoreresult);
                $score = mysqli_fetch_assoc($scoreresult)['score'];
                $score = intval($score);
                $score = $score + $point;
                $new_score = "update account set score='".$score."' where session='".$cookie."'";
                $update = mysqli_query($connect,$new_score);
            }
        }
        
        
    }
    else{
        echo '<script>alert("YOU NEED TO CHOSE THE CHALLENGE FIRST")</script>';
    }
    
}




// show port
if (isset($_GET['challenge'])) {
    $qx = "select * from user where session='".$cookie."' and challenge='".$challengs[$_GET['challenge']]."'";
    $rx = mysqli_query($connect,$qx);
    $data = mysqli_fetch_assoc($rx)['port'];
}

echo '<div style="color: white;">'.$data.'</div>';


?>
</center>
</nav>


</body>
</html>