<?php
session_start();
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id=$_SESSION['id'];

mysqli_close($conn);
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
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 p-4" href="#"><?php echo $id; ?></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
      data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-sliders-h"></i>
    </button>
    <!-- Bredcrumbs Start -->
    <div class="col-sm">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-dark m-2">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Login</a></li>
          <li class="breadcrumb-item"><a href="manageReservations.html">Managing Guides</a></li>
          <li class="breadcrumb-item active text-bold" aria-current="page">New Guide</li>
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
              <a class="nav-link active" href="adminDashboard.php">
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
              <a class="nav-link " href="manageReservations.php">
                <i class="fas fa-calendar-alt"></i>
               User Reservations
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manageCustomers.php">
                <i class="fas fa-money-check-alt"></i>
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
                    <h1 class="h2 text-uppercase mt-3" id="mainBoxHeading">Add New Guide</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="manageReservations.html">
                            <button type="button" class="btn btn-danger shadow rounded ">
                                Go Back
                            </button>
                        </a>
                        
                    </div>
                </div>
                <!-- Reservation Form Start-->
                <div class="row" id="mainSubs" >
                    <div class="col-md-6 shadow bg-white rounded" id="reservationForm">
                        <div class="row row-cols row-cols-md-8">
                           <h4>Add New Guide</h4>
                            <form method="get" action="addguide1.php">
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="inputEmail4">Last Name</label>
                                    <input type="text" class="form-control"  name="LName" placeholder="XXXX" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputPassword4">First Name</label>
                                    <input type="text" class="form-control"  name="FName" placeholder="XXXX"  required>
                                  </div>
                                   <div class="form-group col-md-6">
                                    <label for="inputPassword4">CNIC</label>
                                    <input type="text" class="form-control"  name="CNIC" placeholder="XXXX"  required>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputPassword4">Email</label>
                                    <input type="text" class="form-control"  name="Email" placeholder="XXXX"  required>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputEmail4">Date of Birth</label>
                                    <input type="date" class="form-control" name="dob"  placeholder="DD-MM-YYYY" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputEmail4">Relegion</label>
                                    <input type="text" class="form-control" name="Reg"  placeholder="XXXX" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputEmail4">Age </label>
                                    <input type="text" class="form-control" name="Age"  placeholder="XXXX" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputEmail4">Gender</label>
                                    <input type="text" class="form-control" name="Gen"  placeholder="XXXX" required>
                                  </div>
                                   <div class="form-group col-md-6">
                                    <label for="inputEmail4">Contact Number</label>
                                    <input type="text" class="form-control" name="cno"  placeholder="Customer Phone Number" required>
                                  </div>
                                   <div class="form-group col-md-6">
                                    <label for="inputEmail4">Blood group</label>
                                    <input type="text" class="form-control" name="bg"  placeholder="XXXX" required>
                                  </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddress">Country</label>
                                            <input type="text" class="form-control"  name="country" placeholder="XXXX"  required>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddress">Province</label>
                                            <input type="text" class="form-control"  name="Prov" placeholder="XXXX"  required>
                                          </div>
                                    </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddress">City</label>
                                            <input type="text" class="form-control"  name="city" placeholder="XXXX"  required>
                                          </div>
                                    </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddress">Street</label>
                                            <input type="text" class="form-control"  name="street" placeholder="XXXX"  required>
                                          </div>
                                    </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddress">House No</label>
                                            <input type="text" class="form-control"  name="hno" placeholder="XXXX"  required>
                                          </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddress">No of Tours Guided</label>
                                            <input type="text" class="form-control"  name="tno" placeholder="XXXX"  required>
                                          </div>
                                    </div>
                                         <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddress">Speciality Areas</label>
                                            <input type="text" class="form-control"  name="spec" placeholder="XXXX"  required>
                                          </div>
                                    </div>
                                         <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddress">Years of Experience</label>
                                            <input type="text" class="form-control"  name="exp" placeholder="XXXX"  required>
                                          </div>
                                    </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddress">User Name</label>
                                            <input type="text" class="form-control"  name="uname" placeholder="XXXX"  required>
                                          </div>
                                    </div>    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddress">Password</label>
                                            <input type="password" class="form-control"  name="pass" placeholder="XXXX"  required>
                                          </div>
                                    </div>
                                </div>                            
                                
                                <div class="form-group">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                    <label class="form-check-label" for="gridCheck">
                                      Accept the guide policies
                                    </label>
                                  </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Guide</button>
                              </form>
                        </div>
                    </div>
                </div>
                <!-- Reservation Form Start -->
                
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