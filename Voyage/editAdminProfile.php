<?php
// including the database connection file
session_start();
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id=$_SESSION['id'];
$showsuccessmsg=false;
$showerrormessage=false;
if(isset($_SESSION['pid'])){
if(isset($_POST['update'])){	
	$id=mysqli_real_escape_string($conn, $_POST['Id']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    list($firstName,$lastName) = explode(' ', $name);
    $phone=mysqli_real_escape_string($conn, $_POST['phone']);
    $bloodgroup = mysqli_real_escape_string($conn, $_POST['bloodgroup']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $religion = mysqli_real_escape_string($conn, $_POST['religion']);
    $address1 = mysqli_real_escape_string($conn, $_POST['address1']);
    list($HouseNO,$Street,$City,$Province,$Country)=explode(',',$address1);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $dateofbirth = mysqli_real_escape_string($conn, $_POST['dateofbirth']);
    $birthDate = date('Y-m-d', strtotime(str_replace('-', '/', $dateofbirth)));

	
	// checking empty fields
    if(empty($name) || empty($gender) ||empty($email) ||empty($phone)
    ||empty($bloodgroup)||empty($religion)||empty($password)||empty($address1)||empty($dateofbirth)
    ){	
	} else {	
        //updating the table
        $res=mysqli_query($conn,"SELECT pass from userinfo where PersonID='".$_SESSION['pid']."'");
        $pwd=mysqli_fetch_array($res);
        if($pwd["pass"]===$password){
		$result = mysqli_query($conn, "UPDATE person SET FirstName='$firstName',LastName='$lastName',
        ContactNo='$phone',Religion='$religion',DOB='$birthDate',BloodGroup='$bloodgroup',
        Email='$email'
         WHERE PersonID='".$_SESSION['pid']."'");
        $result2=mysqli_query($conn,"UPDATE address set HouseNO='$HouseNO',Street='$Street',
        City='$City',Province='$Province',Country='$Country' where AddressID in
        (SELECT AddressID FROM person where PersonID='".$_SESSION['pid']."')");
         
      
        $showsuccessmsg=true;    //msg for successful updation of account info
    }
        else{
            $showerrormessage=true; //invalid password
        }
		
	}
}}
else{
    header('Location:logout.php');
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Admin Dashboard</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles -->
  <link href="./css/main.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow ">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 p-4" href="#"><?php echo $id;?></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-sliders-h"></i>
        </button>
        <!-- Bredcrumbs Start -->
        <div class="col-sm">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-dark m-2">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="login.html">Login</a></li>
                    <li class="breadcrumb-item"><a href="adminProfile.php">My Profile</a></li>
                    <li class="breadcrumb-item active text-bold" aria-current="page">Edit Profile</li>
                </ol>
            </nav>
        </div>
        <input class="form-control w-25" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="logout.php" style="color:  rgb(255, 255, 255); font-size: 15px;"> Log Out <span><i
                            class="fas fa-sign-out-alt"></i></span></a>
            </li>
        </ul>
    </nav>
    <!-- Navbar End -->
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse shadow-lg bg-white rounded">
                <div class="sidebar-sticky pt-5">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="adminDashboard.php">
                                <i class="fas fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="manageAttractions.php">
                                <i class="fas fa-map-marked-alt"></i>
                                Manging Attractions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="manageCustomers.php">
                                <i class="fas fa-calendar-alt"></i>
                                ManageCustomers
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="manageGuides.php">
                                <i class="fas fa-user-secret"></i>
                                Manage Guides
                            </a>
                        </li>
                    </ul>
                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Account Customization</span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item ">
                            <a class="nav-link active" href="adminProfile.php">
                                <i class="fas fa-id-card"></i>
                                My Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="adminSettings.php">
                                <i class="fas fa-cogs"></i>
                                Dashboard Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- SideMenu End -->

            <!-- Main Body Start -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" id="main">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 m-2 border-bottom">
                    <h1 class="h2 text-uppercase mt-3" id="mainBoxHeading">Edit Your Profile </h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="adminProfile.php">
                            <button type="button" class="btn btn-danger shadow rounded ">
                                Go Back
                            </button>
                        </a>

                    </div>
                </div>
                <p <?php if ($showsuccessmsg===false){?>style="display:none"<?php } ?>><font color='red'>Profile updated successfully!!!</font></p><br/>
                <!-- Fetching data from database -->
                <?php

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT P.PersonID,CONCAT(P.FirstName,' ',P.LastName) as fullName,P.ContactNo,
P.Email,P.Gender,DATE_FORMAT(DOB,'%D %b %Y')dateofbirth,P.BloodGroup,P.Religion,CONCAT(A.HouseNO,',',A.Street,',',A.City,',',
A.Province,',',
A.Country
) as address1,U.UserName,U.pass

FROM person as P join address as A on P.AddressID=A.AddressID
 join userinfo as U where
 U.PersonID=P.PersonID
  AND P.PersonID='".$_SESSION['pid']."'");

$res = mysqli_fetch_array($result);
    $customerID=$res['PersonID'];
    $name = $res['fullName'];
    $contactNo=$res['ContactNo'];
    $email = $res['Email'];
    $gender = $res['Gender'];
    $date = $res['dateofbirth'];
    $dateofbirth = date('Y-m-d', strtotime(str_replace('-', '/', $date)));
    $bloodgroup = $res['BloodGroup'];
    $religion = $res['Religion'];
    $address1 = $res['address1'];
    $username = $res['UserName'];
    $password = $res['pass'];
    mysqli_close($conn);

?>
                <!-- Profile Form Start-->
                <div class="row" id="mainSubs">
                    <div class="col-md-6 shadow bg-white rounded" id="reservationForm">
                        <div class="row row-cols row-cols-md-8">
                            <form action="editAdminProfile.php" name="form1" method="post">
                                <h5 class="font-weight-bold">User Information </h5>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">User ID</label>
                                        <input type="text" class="form-control" name="Id" value="<?php echo $customerID;?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">User Name</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $name;?>" required>
                                    </div>
                                </div>
                                <h5 class="font-weight-bold">Contact Information</h5>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Phone Number </label>
                                        <input type="number" class="form-control" name="phone" value="<?php echo $contactNo;?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Home Address </label>
                                        <input type="text" class="form-control" name="address1" value="<?php echo $address1;?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Email Address</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $email;?>" required>
                                    </div>
                                </div>
                                <h5 class="font-weight-bold">Basic Information </h5>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddress">Date of Birth</label>
                                            <input type="date" class="form-control" name="dateofbirth" value="<?php echo $dateofbirth;?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddress">Gender</label>
                                            <input type="text" class="form-control" name="gender" value="<?php echo $gender;?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddress">Religion</label>
                                            <input type="text" class="form-control" name="religion" value="<?php echo $religion;?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddress">Blood Group</label>
                                            <input type="text" class="form-control" name="bloodgroup" value="<?php echo $bloodgroup;?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Account Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password of your account"
                                        required>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                        <label class="form-check-label" for="gridCheck">
                                            Accept the profile policies
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" name="update" class="btn btn-primary">Edit Profile</button>
                            </form>
                            <p <?php if ($showerrormessage===false){?>style="display:none"<?php } ?>><font color='red'>Incorrect Password</font></p><br/>
                        </div>
                    </div>
                </div>
                <!-- Profile Form End -->

            </main>
            <!-- Main Body End  -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://kit.fontawesome.com/b33adcddb8.js" crossorigin="anonymous"></script>
    <script src="./my js/main.js"></script>

</body>

</html>