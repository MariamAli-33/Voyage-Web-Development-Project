<?php 
session_start();
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
    $lname=$_REQUEST['LName'];
    $fname=$_REQUEST['FName'];
    $cnic=$_REQUEST['CNIC'];
    $email=$_REQUEST['Email'];
    $dob=$_REQUEST['dob'];
    $reg=$_REQUEST['Reg'];
    $age=$_REQUEST['Age'];
    $gen=$_REQUEST['Gen'];
    $cno=$_REQUEST['cno'];
    $bg=$_REQUEST['bg'];
    $con=$_REQUEST['country'];
    $prov=$_REQUEST['Prov'];
    $city=$_REQUEST['city'];
    $st=$_REQUEST['street'];
    $hno=$_REQUEST['hno'];
    $uname=$_REQUEST['uname'];
    $pass=$_REQUEST['pass'];
    echo "$con"."$prov". "$city"."$st"."$hno";
$sql="Insert into Address(Country, Province, City, Street, HouseNO) values ('$con','$prov','$city','$st',$hno)";
$result= mysqli_query($conn,$sql);
$sql2="Select AddressID from Address where (Country='$con' and Province='$prov' and City='$city' and Street='$st' and HouseNO=$hno)";
$result2= mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_array($result2);
$aid=$row2['AddressID'];
$sql1="Insert into Person(LastName, FirstName,CNIC, AddressID, Gender, Age, ContactNo,Email, BloodGroup,Religion,DOB) values
('$lname','$fname','$cnic',$aid, '$gen', '$age', '$cno','$email','$bg','$reg','$dob')";
$result1= mysqli_query($conn,$sql1);
$sql3="Select PersonID from Person where CNIC='$cnic'";
$result3= mysqli_query($conn,$sql3);
$row3 = mysqli_fetch_array($result3);
$pid=$row3['PersonID'];
$sql4="Insert into Customer(PersonID) values ($pid)";
$result4= mysqli_query($conn,$sql4);
$sql5="Insert into userinfo(PersonID, UserName, pass) values ($pid, '$uname','$pass')";
$result5= mysqli_query($conn,$sql5);
header('Location:manageCustomers.php');
mysqli_close($conn);

?>