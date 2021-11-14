<?php 
session_start();
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
    $from=$_REQUEST['from'];
    $to=$_REQUEST['to'];
    $pass=$_REQUEST['pass'];
    $cid=$_SESSION['cid'];
    $destid=$_SESSION['destid'];
    $locid=$_SESSION['locid'];
    $hid=$_SESSION['hotid'];
$sql1="Select One_night_stay_cost from Hotels where HotelID=$hid";
$result1= mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_array($result1);
$cost = $row1['One_night_stay_cost'];
$diff = strtotime($to) - strtotime($from); 
$days=abs(round($diff / 86400));
$ct=((int)$cost)*$days;
$sql2="Select GuideID from TourGuide ORDER BY RAND()
LIMIT 1";
$result2= mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_array($result2);
$guide = $row2['GuideID'];
$sql3="Insert into Reservations(CustomerID,DestinationID,Reserved_From, Reserved_to,GuideID, Reserved_Hotel_ID, Cost_of_Tour,Payment_Status) values ($cid,$destid,'$from','$to',$guide,$hid,'$ct','Pending')";
$result3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
header('Location:reservations.php');
mysqli_close($conn);

?>