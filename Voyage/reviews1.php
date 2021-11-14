<?php
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();}
$email = $_REQUEST['email'];
$rev = $_REQUEST['rev'];
$sql="SELECT PersonID from Person where (Email='$email')";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$id=$row['PersonID'];
$sql1="SELECT CustomerID from Customer where PersonID=$id";
$result1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_array($result1);
$id1=$row1['CustomerID'];
$sql2="INSERT into CustomerReviews(CustomerID,Customer_Review) values ($id1,'$rev')";
$result2 = mysqli_query($conn,$sql2);
header('Location:reviews.php');
mysqli_close($conn);
?>