<?php
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id = (isset($_GET["id"]) ? $_GET["id"] : '');

$sql="DELETE FROM Reservations WHERE ReservationID=$id";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
header('Location:reservations.php');

mysqli_close($conn);

?>