<?php
// including the database connection file
session_start();
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


if(isset($_POST['update'])){	

	$id = mysqli_real_escape_string($conn, $_POST['id']);	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$information = mysqli_real_escape_string($conn, $_POST['information']);	
	
	// checking empty fields
	if(empty($name) ||  empty($information)) {	
		$_GET['id'] = $id;
		
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		
		
		if(empty($information)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($conn, "UPDATE attractions SET Name='$name',Information='$information' WHERE AttractionID=$id");
		
		mysqli_close($conn);
		//redirectig to the display page. 
		header("Location: manageAttractions.php");
	}
}
?>


<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM attractions WHERE AttractionID=$id");

while($res = mysqli_fetch_array($result)){
	$name = $res['Name'];
	$information = $res['Information'];
}

?>

<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	
	
	
	<form name="form1" method="post" action="editAttraction.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			
			<tr> 
				<td>Information</td>
				<td><input type="text" name="information" value="<?php echo $information;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
