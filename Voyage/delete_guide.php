<?php 
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id = (isset($_GET["id"]) ? $_GET["id"] : '');
$sql="Select P.PersonID, P.AddressID from TourGuide G join Person P on G.PersonID=P.PersonID where G.GuideID=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$pid=$row['PersonID'];
$aid=$row['AddressID'];
$sql1="DELETE FROM TourGuide WHERE GuideID=$id";
$result = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
$sql2="DELETE FROM Person WHERE PersonID=$pid";
$result = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
$sql3="DELETE FROM Address WHERE AddressID=$aid";
$result = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
header('Location:manageGuides.php');
mysqli_close($conn);

?>