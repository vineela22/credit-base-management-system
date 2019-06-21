<html>
<head><title>All Users</title>
<style>
.btn-group button {
  background-color:#BF3FBF;
  border: 1px solid green; /* Green border */
  color: white; /* White text */
  cursor: pointer; /* Pointer/hand icon */
  width: 100%; /* Set a width if needed */
  display: block; /* Make the buttons appear below each other */
}
.btn-group button:not(:last-child) {
  border-bottom: none; /* Prevent double borders */
}
/* Add a background color on hover */
.btn-group button:hover {
  background-color: #8c028c;
}
</style>

<script type="text/javascript">
function reply_click(clicked_id)
{
var x = document.getElementById(clicked_id).textContent;
var array=x.split(":");
var name=array[0];
window.location.href ="view.php?name="+name;
}
</script>

</head>
<body>
<h1><center>Name:Credits</h1>
<div class="btn-group">
<?php
$c=0;
$db=new mysqli('localhost','root','','Users');
if (!$db)
    die("Connection failed: " . mysqli_connect_error());
else
    $sql ="SELECT *FROM user order by Name";
$result=mysqli_query($db,$sql);
if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
     { 
    $c=$c+1;  
echo "<button onClick='reply_click(this.id)' id='$c'><h1>".$row["Name"]." : ".$row["Credit"]."</h1></button>"; 
      }
}
else
{
    echo "<h2>0 results</h2>";
}
mysqli_close($db);
?>
</div>
</body>
</html>