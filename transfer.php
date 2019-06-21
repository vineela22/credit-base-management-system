<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
body {background-color:#BF3FBF;}
input{
padding:10px;
font-size:inherit;
}
input[type="number"]{
display:block;
width:55%;
margin-bottom:20px;
border:2px solid black;
}
</style>
<script type="text/javascript">
function fun3()
{
var x = document.getElementById("tocredit").value;
var y = document.getElementById("toname").value;
var p = document.getElementById("fromname").textContent;
var p1=p.split(":");
var q = document.getElementById("fromcredit").textContent;
var q1=q.split(":");
if(x>0 && x<=parseInt(q1[1]))
{
window.location.href ="view1.php?tocredit="+ x + "&toname=" + y+ "&fromname=" + p1[1]+ "&fromcredit=" + q1[1];
}
else if(x<=0){
alert('credit value must be positive');
}
else{
alert('insufficient credits');
}
}
</script>
</head>
<body>
<?php
$name=$_GET['name'];
$credits=$_GET['credit'];
echo "<center><h1 id='fromname'>From:".$name."</h1>";
echo "<center><h1 id='fromcredit' >Current Credit:".$credits."</h1>";
echo "<center><input type='number' id='tocredit' placeholder='Enter credit to transfer' required>";
$db=new mysqli('localhost','root','','Users');
if (!$db)
    die("Connection failed: " . mysqli_connect_error());
else
    $sql ="SELECT *FROM user order by Name";
$result=mysqli_query($db,$sql);
if (mysqli_num_rows($result) > 0)
{
echo "<center><select id='toname' style='width:55%;padding:10px;border:2px solid black;' name='uname'>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value=". $row['Name'] .">" . $row['Name'] ."</option>";
      }
echo "</select>";
}
else
{
    echo "<h2>0 results</h2>";
}
mysqli_close($db);
?>

<center><button type="button" onclick="fun3()" style="margin-top:20px;" class="btn">Transfer</button>
</body>
</html>
