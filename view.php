<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style type="text/css">
body {background-color:#BF3FBF;}
h1{
color:black;
text-align:center;
}
</style>

</head>
<body>
<script type="text/javascript">
function fun2()
{
var name=document.getElementById('i1').textContent;
var a1=name.split(":");
var credits=document.getElementById('i2').textContent;
var a2=credits.split(":");
window.location.href ="transfer.php?name="+a1[1]+"&credit="+a2[1];
}
</script>
<?php
$name=$_GET['name'];
$con=new mysqli('localhost','root','','Users');
if (!$con)
    die("Connection failed: " . mysqli_connect_error());
else
   $sql = "SELECT *FROM user WHERE Name='$name'";
$result=mysqli_query($con,$sql);
$user=mysqli_fetch_assoc($result);
if($user){
    
      echo "<h1 id='i1'>Name:".$user['Name']."</h1>";
      echo "<h1>Email:".$user['Email']."</h1>";
      echo "<h1>Phone Number:".$user['PhoneNumber']."</h1>";
      echo "<h1 id='i2'>Credits:".$user['Credit']."</h1>";
      echo "<center><button type='button' onclick='fun2(this.id)' class='btn' id='b'>Transfer Credit</button>";
      }
else 
    echo "No such User....";
 
mysqli_close($con);
?>
</body>
</html>