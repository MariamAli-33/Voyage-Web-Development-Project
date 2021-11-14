<!-- Username change php-->
<?php
session_start();
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id=$_SESSION['id'];
$showmsg3=false;
$showmsg4=false;
if(isset($_SESSION['pid'])) {
if(isset($_POST['submit'])){	

	$currentusername = mysqli_real_escape_string($conn, $_POST['currentusername']);	
	$newusername = mysqli_real_escape_string($conn, $_POST['newusername']);
		
	
	// checking empty fields
	if(empty($currentusername) || empty($newusername)) {	
		
	} else {	
    //updating the table
    
   
        $result = mysqli_query($conn, "SELECT UserName FROM userinfo where UserName='$currentusername' AND PersonID='".$_SESSION['pid']."'");

        if( !empty($result)&& $result->num_rows> 0){
            $update=mysqli_query($conn,"UPDATE userinfo set UserName='$newusername' where PersonID='".$_SESSION['pid']."'");
            $showmsg3=true;
            
        }
        else{
        
        $showmsg4=true;
         }
        
    
	
	}
}}
else{
  Header('Location:login.html');
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
          <li class="breadcrumb-item active text-bold" aria-current="page">Dashboard Settings</li>
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
               Manage Customers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manageGuides.php">
                <i class="fas fa-user-secret"></i>
                Manage Guides
              </a>
            </li>
          </ul>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Account Customization</span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item ">
              <a class="nav-link " href="adminProfile.php">
                <i class="fas fa-id-card"></i>
                My Profile
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="adminSettings.php">
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
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 m-2 border-bottom">
          <h1 class="h2 text-uppercase mt-3" id="mainBoxHeading">Account Settings</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <a href="adminProfile.php">
              <button type="button" class="btn btn-danger shadow rounded ">
                View Profile
              </button>
            </a>
          </div>
        </div>
        <?php

$showmsg=false;
$showmsg2=false;
$pwdupdate=false;
if(isset($_POST['change'])){	

	$currentpassword = mysqli_real_escape_string($conn, $_POST['currentpassword']);	
  $pwd1 = mysqli_real_escape_string($conn, $_POST['pwd1']);
  $pwd2 = mysqli_real_escape_string($conn, $_POST['pwd2']);
		
	
	// checking empty fields
	if(empty($currentpassword) || empty($pwd1) || empty($pwd2)) {	
		
		
		
  		
	} else {	
		//updating the table
        $result = mysqli_query($conn, "SELECT pass FROM userinfo where PersonID='".$_SESSION['pid']."'");
        $res = mysqli_fetch_array($result);
        if($res["pass"]===$currentpassword){
          if($pwd1===$pwd2){
        $update=mysqli_query($conn,"UPDATE userinfo set pass='$pwd1' where PersonID='".$_SESSION['pid']."'");
        $pwdupdate=true;
        }
         else{
           $showmsg2=true;   //error message incase new password does not match
         }}
        else{
          $showmsg=true;   //error message for invalid password

        }
      }
        
    
		mysqli_close($conn);
	
	}

?>
                <!-- Password Change Start -->
                <div class="row"  id="mainSubs">
                    <div class="col-sm-4 shadow p-3 m-2 rounded ">
                        <h4>Change Password Credentials</h4>
                        <form action="adminSettings.php" method="post" onsubmit="return checkForm(this);">
                            <div class="form-group">
                                <label for="exampleInputPassword1">New Password</label>
                                <input type="password" class="form-control" name="currentpassword" placeholder="Enter your current password" required>
                              <small id="message"></small>
                              <small id="message1"></small>
                              <p <?php if ($showmsg===false){?>style="display:none"<?php } ?>><font color='red'>Current password Invalid</font></p>
                              </div>
                           
                            <div class="form-group">
                              <label for="exampleInputPassword1">New Password</label>
                              <input type="password" class="form-control" name="pwd1" placeholder="Enter your new password" required>
                            <small id="message"></small>
                            <small id="message1"></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input type="password" class="form-control" name="pwd2" placeholder="Renter your new password" required>
                              <small id="message"></small>
                              <small id="message1"></small>
                              <p <?php if ($showmsg2===false){?>style="display:none"<?php } ?>><font color='red'>Passwords do not match</font></p><br/>
                              </div>
                            <button type="submit" name="change" class="btn btn-primary">Change Password</button>
                          </form>
                    </div>
 <!-- Password Change Start -->


<!-- Notifications Start -->
                    <div class="col-sm shadow m-2 p-3 rounded ">
                        <h4>Latest Notifications</h4>
                        <div <?php if ($showmsg3===false){?>style="display:none"<?php } ?> class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Congratulations,</strong> Your username has been updated sucessfully!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div <?php if ($showmsg3===false && $pwdupdate===false){?>style="display:none"<?php } ?> class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Dear User,</strong> Account Information has been updated sucessfully!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div <?php if ($pwdupdate===false){?>style="display:none"<?php } ?>  class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Congratulations,</strong> Your account password has been updated sucessfully!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hello User,</strong> You can now change the username from the dashboard settings!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Dear User</strong> You can now change your password from the settings!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                    </div>
<!-- Notifications End -->

<!-- Username Change Start -->
                </div>
                <div class="row" id="mainSubs">
                    <div class="col-sm-12 mt-2 shadow p-3  rounded">
                        <h4>Change Username </h4>
                        <form name="form1" action="adminSettings.php" method="post">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">@</span>
                                </div>
                                <input type="text" class="form-control" name="currentusername" placeholder="Current Username" aria-label="Username" aria-describedby="basic-addon1" required>
                              </div>
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">@</span>
                                </div>
                                <input type="text" class="form-control" name="newusername" placeholder="New Username" aria-label="Username" aria-describedby="basic-addon1" required>
                              </div>
                            <button type="submit" name="submit" class="btn btn-primary">Change Username</button>
                          </form>
                          <p <?php if ($showmsg4===false){?>style="display:none"<?php } ?>><font color='red'>Username does not exist</font></p><br/>
                    </div>                   
                </div>
               <!-- Username Change End -->
            </main>
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
    <script src="pwd.js"></script>
</body>

</html>