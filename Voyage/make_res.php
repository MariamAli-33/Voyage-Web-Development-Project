<?php
session_start();
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id=$_SESSION['id'];
$pid=$_SESSION['pid'];
$destid = (isset($_GET["destid"]) ? $_GET["destid"] : '');
$hotid = (isset($_GET["hotid"]) ? $_GET["hotid"] : '');
$locid = (isset($_GET["locid"]) ? $_GET["locid"] : '');
$_SESSION['destid']=$destid;
$_SESSION['hotid']=$hotid;
$_SESSION['locid']=$locid;
$cid="SELECT CustomerID FROM Customer WHERE PersonID=$pid";
$c_result = mysqli_query($conn,$cid);
$row1 = mysqli_fetch_array($c_result);
$c=$row1['CustomerID'];
$_SESSION['cid']=$c;
$did="SELECT DestName FROM Destinations WHERE DestinationID=$destid";
$d_result = mysqli_query($conn,$did);
$row2 = mysqli_fetch_array($d_result);
$d=$row2['DestName'];
$hid="SELECT Name FROM Hotels WHERE HotelID=$hotid";
$h_result = mysqli_query($conn,$hid);
$row3 = mysqli_fetch_array($h_result);
$h=$row3['Name'];
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
  <title>Customer Dashboard</title>
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
                    <li class="breadcrumb-item"><a href="reservations.php">Reservation</a></li>
                    <li class="breadcrumb-item active text-bold" aria-current="page">Make A New Reservation</li>
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
                            <a class="nav-link" href="main.php">
                                <i class="fas fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="attractions.html">
                                <i class="fas fa-map-marked-alt"></i>
                                Attractions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="reservations.php">
                                <i class="fas fa-calendar-alt"></i>
                                Reservations
                            </a>
                        </li>
                                    <li class="nav-item">
              <a class="nav-link " href="guidance.php">
                <i class="fas fa-info-circle"></i>
                Tour Guidance
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
                            <a class="nav-link " href="profile.php">
                                <i class="fas fa-id-card"></i>
                                My Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="settings.php">
                                <i class="fas fa-cogs"></i>
                                Dashboard Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reviews.php">
                                <i class="fas fa-smile"></i>
                                User Reviews
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
                    <h1 class="h2 text-uppercase mt-3" id="mainBoxHeading">Reservation Statement</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="reservations.html">
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
                           <h4>Make New Reservation</h4>
                            <form  method="get" action="made_reservation.php">
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">UserName</label>
                                    <input type="text" class="form-control"  placeholder="<?php echo $id; ?>">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputPassword4">Where to Go?</label>
                                    <input type="text" class="form-control"  placeholder="<?php echo $d; ?>">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputEmail4">Reservation From</label>
                                    <input type="date" class="form-control" name="from" placeholder="DD-MM-YYYY" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputEmail4">Reservation To </label>
                                    <input type="date" class="form-control" name="to" placeholder="DD-MM-YYYY" required>

                                  </div>
                                  <div>
                                                                 <div class="form-group">
                                    <label for="inputPassword4">Reserved Hotel</label>
                                    <input type="text" class="form-control"  placeholder="<?php echo $h; ?>"  required>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputAddress">Account Password</label>
                                    <input type="password" name="pass"class="form-control"  required>
                                  </div>
                                <div class="form-group">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                    <label class="form-check-label" for="gridCheck">
                                      Check me out
                                    </label>
                                  </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Reserve</button>
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