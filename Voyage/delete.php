<?php
session_start();
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM attractions WHERE AttractionID=$id");

mysqli_close($conn);

//redirecting to the display page (manageAttractions.php in our case)
header("Location:manageAttractions.php");
?>