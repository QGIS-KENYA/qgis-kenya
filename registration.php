<?php

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$mobilenumber = $_POST['mobilenumber'];

//prevent sql injection
$fullname = stripslashes($fullname);
$email = stripcslashes($email);
$mobilenumber = stripslashes($mobilenumber);
$fullname = mysql_real_escape_string($fullname);
$email = mysql_real_escape_string($email);
$mobilenumber = mysql_real_escape_string($mobilenumber);


//Database Connection

$conn = new mysqli("localhost:3306","bktbsdci_bktbsdci","j[3QC#Nl6Ie21g","bktbsdci_registration");
if($conn->connect_error){
	die('connection Failed : '.$conn->connect_error);
}else{
	$stmt = $conn->prepare("insert into registration(fullname,email,mobilenumber)values(?,?,?)");
	$stmt->bind_param("ssi",$fullname,$email,$mobilenumber);
	$stmt->execute();
	header("Location:thankyou.html");
	$stmt->close();
	$conn->close();

}

?>