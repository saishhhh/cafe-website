<style>
.mycss{
	color: black;
    border: 1px solid #000;
    width: 500px;
    height: 30px;
    padding: 25px;
    background: #ccc;
    font-family: "Lucida Console", "Courier New", monospace;
}
body {
  background-image: url('images/contact.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
img {
  width:250px;
  height:250px;
}
h1 {
	color: white;
  font-size: 40px;
}
</style>
<center>
  <body>
  <h1><u>Customer Details</u></h1>
  <br>
  <br>
<?php
$servername = "localhost"; // default
$username = "root"; // root is a username
$password = "";     // No password for my db that why it is blank
$dbname = "test"; // mydb is my db name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysql_connect_error());
}

// Query Processing 
if($_POST["phone"]!=0) // search using phone
{
$v1=$_POST["phone"];
$sql = "SELECT * from form where phone=$v1";
}
else  // search using name
{
  $v2=$_POST["name"];  
  $sql = "SELECT * from form where name='$v2'";
}

$result = mysqli_query($conn, $sql); // conn for connection execute query

// Result processing
if (mysqli_num_rows($result) > 0) 
{
  // output data of each row
  while($row = mysqli_fetch_array($result)) 
{
    echo "<p class='mycss'>Customer Name:        ". $row["name"]."</p>";
    echo "<p class='mycss'>Customer Email:       ". $row["email"]."</p>";
    echo "<p class='mycss'>Customer Phone:       ". $row["phone"]."</p>";
    echo "<p class='mycss'>Customer Message:     ". $row["message"]."</p>";
  }
} 

else 
{
  echo "<p class='mycss'>0 results</p>";
}

mysqli_close($conn);// close the database
?>
</center>
</body>
</html>
