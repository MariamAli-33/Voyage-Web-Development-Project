<?php
session_start();
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id=$_SESSION['id'];
    if(isset($_SESSION['pid'])) {
   
        $query="SELECT AttractionID,Name,Information from attractions";
          if(mysqli_query($conn, $query)){
            
        } else{
            echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
        }
        
          
            
        }
       
        else
        {
          header('Location:login.html');
        }
        
    
	
	


?>
<!doctype html>
<html lang="en">


<body>
<h1> Attractions Table </h1>
<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<th>ID</th>
		<th>Name</th>
		<th>Information</th>
		<th>Update</th>
	</tr>
  <?php 
  $result=mysqli_query($conn,$query);
  
		while($res = mysqli_fetch_array($result)) { 		
			echo "<tr>";
			echo "<td>".$res['AttractionID']."</td>";
			echo "<td>".$res['Name']."</td>";
			echo "<td>".$res['Information']."</td>";	
			echo "<td><a href=\"editAttraction.php?id=$res[AttractionID]\">Edit</a> | <a href=\"delete.php?id=$res[AttractionID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		mysqli_close($conn);
	?>
  </table>
  <a href="addAttraction.php">Add New Attraction</a><br/><br/>
</body>

</html>