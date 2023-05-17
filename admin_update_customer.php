<?php
session_start();
require_once('connection.php');
$customer_id=$_SESSION['customer_id'];
$fname=$_SESSION['fname'];
$lname=$_SESSION['lname'];
$email=$_SESSION['email'];
$phone_number=$_SESSION['phone_number'];
$gender=$_SESSION['gender'];
$password=$_SESSION['password'];
// $password = md5($password);
$query = "UPDATE customer SET fname = '$fname' ,lname='$lname',email = '$email', phone_number = '$phone_number' , gender = '$gender' , password = '$password' WHERE customer_id = '$customer_id'";
$sql = $con->prepare($query);
$result = $sql->execute();
if($result == 0){
    echo file_get_contents('errors.html');
}else{
    header('Location:dashboard.php'); 
}
?>