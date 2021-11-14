<?php
session_start();
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id=$_SESSION['id'];
$sql1="SELECT COUNT(*) as Gtotal 
FROM TourGuide";
$sql2="SELECT COUNT(*) as Ctotal
FROM Customer";
$sql3="SELECT COUNT(*) as Dtotal
FROM Destinations";
$sql4="SELECT COUNT(*) as Htotal
FROM Hotels";
$result1= mysqli_query($conn,$sql1);
$result2= mysqli_query($conn,$sql2);
$result3= mysqli_query($conn,$sql3);
$result4= mysqli_query($conn,$sql4);
$row1 = mysqli_fetch_array($result1);
$row2 = mysqli_fetch_array($result2);
$row3 = mysqli_fetch_array($result3);
$row4 = mysqli_fetch_array($result4);
$gcount = $row1['Gtotal'];
$ccount = $row2['Ctotal'];
$dcount = $row3['Dtotal'];
$hcount = $row4['Htotal'];
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
          <li class="breadcrumb-item active text-bold" aria-current="page">Dashboard</li>
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
              <a class="nav-link " href="manageCustomers.php">
                <i class="fas fa-calendar-alt"></i>
               Manage Customers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manageGuides.php">
                <i class="fas fa-money-check-alt"></i>
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
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 m-2 border-bottom">
          <h1 class="h2 text-uppercase mt-3" id="mainBoxHeading">Admin Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <a href="adminDashboard.php">
              <button type="button" class="btn btn-danger shadow rounded ">
                Export Report
              </button>
            </a>
          </div>
        </div>
        <!-- Cards Start  -->
        <div class="row row-cols row-cols-md-4 shadow rounded" id="mainSubs">
          <div class="col mb-4  ">
            <div class="card text-white bg-dark shadow p-2 mb-2 rounded" style="max-width: 50rem;">
              <div class="card-header">Latest Updates</div>
              <div class="card-body">
                <h5 class="card-title">Voyage Tour Agents</h5>
                <h1><?php echo $gcount; ?></h1>
              </div>
            </div>
          </div>
          <div class="col mb-4  ">
            <div class="card text-white bg-danger  shadow p-2 mb-2 rounded" style="max-width: 50rem;">
              <div class="card-header">Latest Updates</div>
              <div class="card-body">
                <h5 class="card-title">Regular Customers</h5>
                <h1><?php echo $ccount; ?></h1>
              </div>
            </div>
          </div>
          <div class="col mb-4  ">
            <div class="card text-white bg-warning shadow p-2 mb-2 rounded" style="max-width: 50rem;">
              <div class="card-header">Latest Updates</div>
              <div class="card-body">
                <h5 class="card-title">Popular Destinations</h5>
                <h1><?php echo $dcount; ?></h1>
              </div>
            </div>
          </div>
          <div class="col mb-4 ">
            <div class="card text-white bg-primary shadow p-2 mb-2 rounded" style="max-width: 50rem;">
              <div class="card-header">Latest Updates</div>
              <div class="card-body">
                <h5 class="card-title">Sponsored Hotels</h5>
                <h1><?php echo $hcount; ?></h1>
              </div>
            </div>
          </div>
          <!-- Cards End -->

          <!-- Latest News Start -->
        </div>
        <canvas id="line-chart" width="800" height="450"></canvas>
        <div class="row shadow rounded mt-3" id="mainSubs">
          <div class="col-md-6 ">
            <h3 class="m-3">Latest News</h3>
            <div class="list-group ">
              <a href="#" class="list-group-item list-group-item-action active shadow p-3 mb-2 rounded">
                <div class="d-flex w-100 justify-content-between ">
                  <h5 class="mb-1">TRAVELLERS FROM THE UK </h5>
                  <small>3 days ago</small>
                </div>
                <p class="mb-1">Temporary entry restriction applies to passengers who originate from the UK, are in, or
                  have been in the UK for the last 10 days.
                  Passengers whose travel originate from destinations other than the UK, who are transiting through the
                  UK and not leaving the airport, are allowed to travel in to Pakistan.</p>
              </a>
              <a href="#" class="list-group-item list-group-item-action border-bottom shadow p-3 mb-2 rounded ">
                <div class="d-flex w-100 justify-content-between rounded">
                  <h5 class="mb-1">TRAVELLERS FROM THE UK </h5>
                  <small>3 days ago</small>
                </div>
                <p class="mb-1">Temporary entry restriction applies to passengers who originate from the UK, are in, or
                  have been in the UK for the last 10 days.
                  Passengers whose travel originate from destinations other than the UK, who are transiting through the
                  UK and not leaving the airport, are allowed to travel in to Pakistan.</p>
              </a>
              <a href="#" class="list-group-item list-group-item-action shadow p-3 mb-2 rounded ">
                <div class="d-flex w-100 justify-content-between ">
                  <h5 class="mb-1">TRAVELLERS FROM THE UK </h5>
                  <small>3 days ago</small>
                </div>
                <p class="mb-1">Temporary entry restriction applies to passengers who originate from the UK, are in, or
                  have been in the UK for the last 10 days.
                  Passengers whose travel originate from destinations other than the UK, who are transiting through the
                  UK and not leaving the airport, are allowed to travel in to Pakistan.</p>
              </a>
            </div>
          </div>

          <!-- Latest News End -->

          <!-- Latest Notofications Start -->

          <div class="col-md-6  shadow rounded">
            <h3 class="m-3" >Latest Notifications</h3>
            <ul class="list-group ">
              <li class="list-group-item  d-flex justify-content-between align-items-center shadow p-3 mb-2 bg-white rounded">
                Group Trip Available Now
                <span class="badge badge-warning">5</span>
              </li>
              <li
                class="list-group-item  d-flex justify-content-between align-items-center shadow p-3 mb-2 bg-white rounded">
                Discount Offer In Weekend Days, Upto 50% Off
                <span class="badge badge-warning">3</span>
              </li>
              <li
                class="list-group-item  d-flex justify-content-between align-items-center shadow p-3 mb-2 bg-white rounded">
                Latest News has been updated according to the recommendations
                <span class="badge badge-warning">7</span>
              </li>
              <li
                class="list-group-item  d-flex justify-content-between align-items-center shadow p-3 mb-2 bg-white rounded">
                Account password has been changed
                <span class="badge badge-warning">1</span>
              </li>
              <li
                class="list-group-item  d-flex justify-content-between align-items-center shadow p-3 mb-2 bg-white rounded">
                Account has been created sucessfully
                <span class="badge badge-warning">1</span>
              </li>
              <li
                class="list-group-item  d-flex justify-content-between align-items-center shadow p-3 mb-2 bg-white rounded">
                Account Information has been verified
                <span class="badge badge-warning">1</span>
              </li>
              <li
                class="list-group-item bg-secondary d-flex justify-content-between align-items-center shadow p-3 mb-2 bg-white rounded">
                Group Trip Available Now
                <span class="badge badge-warning">5</span>
              </li>
              

            </ul>
          </div>
          <!-- Latest Notofications End -->
        </div>
        <div class="row shadow rounded" id="mainSubs">
        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
        </div>
      </main>
      <!-- Main Body Ending -->
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
  <script src="https://kit.fontawesome.com/b33adcddb8.js" crossorigin="anonymous"></script>

  <script src="./my js/main.js"></script>
</body>

</html>