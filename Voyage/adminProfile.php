<?php
session_start();
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id=$_SESSION['id'];
if(isset($_SESSION['pid'])){

    $result = mysqli_query($conn, "SELECT P.PersonID,CONCAT(P.FirstName,' ',P.LastName)
    as fullName,P.ContactNo,
    P.Email,P.Gender,DATE_FORMAT(DOB,'%D %b %Y')dateofbirth,P.BloodGroup,P.Religion,
    CONCAT(A.HouseNO,',',A.Street,',',A.City,',',
    A.Province,',',
    A.Country
    ) as address1,U.UserName,U.pass
    
     FROM person as P join address as A on P.AddressID=A.AddressID join userinfo as U where
     U.PersonID=P.PersonID
    AND P.PersonID='".$_SESSION['pid']."'"); 
          
    $res = mysqli_fetch_array($result);	
   
    }
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
                    <li class="breadcrumb-item active text-bold" aria-current="page">Admin Profile</li>
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
                    <h1 class="h2 text-uppercase mt-3" id="mainBoxHeading">User Profile</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="editAdminProfile.php">
                            <button type="button" class="btn btn-danger shadow rounded ">
                                Edit Profile
                            </button>
                        </a>
                    </div>
                </div>
                <!-- Information Card Start -->
                <div class="row" id="mainSubs">
                    <div class="col-12 shadow p-3 mb-5 rounded ">
                        <div class="col-md-12 ">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-description"><span> User Information </span> </h4>
                                    <ul class="information">
                                        <li class="infoItems"><i class="fas fa-user"></i> <span
                                                class="infoItemsLabel">User ID</span><span
                                                class="infoItemsDes"><?php echo "</td>".$res['PersonID']."</td>"?></span>
                                        </li>
                                        <li class="infoItems"><i class="fas fa-user"></i> <span
                                                class="infoItemsLabel">Full Name:</span><span
                                                class="infoItemsDes"><?php echo "</td>".$res['fullName']."</td>"?>
                                                </span>
                                        </li>
                                        <li class="infoItems"><i class="fas fa-at"></i><span
                                                class="infoItemsLabel">Username:</span><span
                                                class="infoItemsDes"><?php echo "</td>".$res['UserName']."</td>"?></span>
                                        </li>
                                        <li class="infoItems"><i class="fas fa-unlock-alt"></i><span
                                                class="infoItemsLabel">Password:</span><span
                                                class="infoItemsDes"><?php echo "</td>".$res['pass']."</td>"?></span>
                                        </li>
                                    
                                    </ul>
                                    <h4 class="card-description"> <span>Contact Information </span> </h4>
                                    <ul class="information">
                                        <li class="infoItems"><i class="fas fa-phone-square"></i><span
                                                class="infoItemsLabel">Phone Number:</span><span
                                                class="infoItemsDes"><?php echo "</td>".$res['ContactNo']."</td>"?></span>
                                        </li>
                                        <li class="infoItems"><i class="fas fa-map-marker-alt"></i><span
                                                class="infoItemsLabel">Home Address :</span><span
                                                class="infoItemsDes"><?php echo "</td>".$res['address1']."</td>"?>
                                                </span>
                                        </li>
                                        
                                        <li class="infoItems"><i class="fas fa-envelope"></i><span
                                                class="infoItemsLabel">Email Address:</span><span
                                                class="infoItemsDes"><?php echo "</td>".$res['Email']."</td>"?></span>
                                        </li>
                                    </ul>
                                    <h4 class="card-description"> <span>Basic Information </span> </h4>
                                    <ul class="information">
                                        <li class="infoItems"><i class="fas fa-birthday-cake"></i><span
                                                class="infoItemsLabel">Date of Birth:</span><span
                                                class="infoItemsDes">
                                                <?php echo "</td>".$res['dateofbirth']."</td>"?></span>
                                        </li>

                                        <li class="infoItems"><i class="fas fa-venus-mars"></i><span
                                                class="infoItemsLabel">Gender:</span><span
                                                class="infoItemsDes"><?php echo "</td>".$res['Gender']."</td>"?></span>
                                        </li>
                                        <li class="infoItems"><i class="fas fa-venus-mars"></i><span
                                                class="infoItemsLabel">Religion:</span><span
                                                class="infoItemsDes"><?php echo "</td>".$res['Religion']."</td>"?></span>
                                        </li>
                                        <li class="infoItems"><i class="fas fa-tint"></i><span
                                                class="infoItemsLabel">Blood Group:</span><span
                                                class="infoItemsDes"><?php echo "</td>".$res['BloodGroup']."</td>"?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Information Card End-->
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
</body>

</html>