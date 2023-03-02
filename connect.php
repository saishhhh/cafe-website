
<?php

$servername="localhost";
$username="root";
$password="";

$dbname="test";
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$message=$_POST['message'];

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
	die('unable to connect'.
    $conn->connect_error);
}

$sql="INSERT INTO form (name,email,phone,message) VALUES('$name','$email','$phone','$message')";

if($conn->query($sql)===TRUE){
	include('success.html');
}
else{
	echo "error".$sql."<br>".$conn->error;
}

$conn->close();
?>