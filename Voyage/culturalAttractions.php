<?php
session_start();
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id=$_SESSION['id'];
$sql="Select D.DestinationID, H.HotelID, L.LocationID, D.Picture, D.DestName, D.Information, D.Suggestion, L.Country, L.Province, L.Region, L.Distance, L.Direction, H.Name as HName, H.Rating, W.weather, Lang.Name as LName, Lang.Specification
from Destinations D 
join Location L on D.LocationID=L.LocationID
join Hotels H on D.HotelID1=H.HotelID
join Weather W on D.WeatherID=W.WeatherID
join Languages Lang on D.Home_LanguageID=Lang.LanguageID
where AttractionID=4";
$result= mysqli_query($conn,$sql);
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
      data-target=".sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
      aria-label="Toggle navigation">
      <i class="fas fa-sliders-h"></i>
    </button>
    <!-- Bredcrumbs Start -->
    <div class="col-sm">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-dark m-2">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Login</a></li>
          <li class="breadcrumb-item active text-bold" aria-current="page">Attractions</li>
        </ol>
      </nav>
    </div>
    <input class="form-control w-25" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="makeReservation.html" style="color:  rgb(255, 255, 255); font-size: 15px;"> Log Out
          <span><i class="fas fa-sign-out-alt"></i></span></a>
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
              <a class="nav-link active" href="attractions.html">
                <i class="fas fa-map-marked-alt"></i>
                Attractions
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="reservations.php">
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
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
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
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 m-2 border-bottom">
          <h1 class="h2 text-uppercase mt-3" id="mainBoxHeading">Famaous Cultural Places To Visit</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <a href="reservations.php">
              <button type="button" class="btn btn-danger shadow rounded ">
                View Reservations
              </button>
            </a>
          </div>
        </div>
        <!-- Attractions Cards Start -->
    <div class="img-block">
          <?php 	
         while($row=mysqli_fetch_array($result)){
         
echo "<tr>";
echo '<img  src="data:image/jpeg;base64,'.base64_encode( $row['Picture'] ).'"/>';
echo "<br>";
echo "<td>Name:" . $row['DestName'] . "<br></td>";
echo "<td>Location:" . $row['Country'] . " ". $row['Province'] . " ". $row['Region'] . " ". $row['Distance'] . " ". $row['Direction'] . "<br></td>";
echo "<td>Information:" . $row['Information'] . "<br></td>";
echo "<td>Residential Hotel:" . $row['HName'] . "<br></td>";
echo "<td>Rating:" . $row['Rating'] . "<br></td>";
echo "<td>Weather Information:" . $row['weather'] . "<br></td>";
echo "<td>Local Language:" . $row['LName'] . "<br></td>";
echo "<td>Local Language Specification:" . $row['Specification'] . "<br></td>";
echo "<td>Suggestion:" . $row['Suggestion'] . "<br></td>";
echo '<td><a href="make_res.php?destid=' . $row['DestinationID'] . '&hotid=' . $row['HotelID'] . '&locid=' . $row['LocationID'] . '" class="delete">Make Reservation<br></a></td>';


echo "</tr>";
}
         ?> 

        <!-- Attractions Cards End -->

        <!-- Pagiation Start -->

        <!-- Pagiation End -->
      </main>
      <!-- Main Body End -->
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