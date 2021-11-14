<?php
session_start();
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id=$_SESSION['id'];
$pid=$_SESSION['pid'];
$sql1="SELECT CustomerID from Customer where PersonID=$pid";
$result1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_array($result1);
$a=$row1['CustomerID'];
$sql="SELECT R.ReservationID, R.Reserved_From, R.Reserved_to, R.Cost_of_Tour,R.Payment_Status, P.FirstName, H.Name, D.DestName
from Reservations R
join (TourGuide G join Person P on G.PersonID=P.PersonID) on R.GuideID=G.GuideID
join Hotels H on R.Reserved_Hotel_ID=H.HotelID
join Destinations D on R.DestinationID=D.DestinationID
where R.CustomerID=$a";
$result = mysqli_query($conn,$sql);
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
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure you want to delete this reservation?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>
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
                    <li class="breadcrumb-item active text-bold" aria-current="page">Reservations</li>
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
                    <h1 class="h2 text-uppercase mt-3" id="mainBoxHeading">Booking Records</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="attractions.html">
                            <button type="button" class="btn btn-danger shadow rounded ">
                                Make New Reservation
                            </button>
                        </a>
                    </div>
                </div>
                <!-- Table creation -->
                <div class="row" id="mainSubs">
                    <div class="col-md-12 shadow px-4 py-3 mb-3 bg-white rounded">
                        <div class="row row-cols row-cols-md-8">
                            <!-- Table Start -->
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ReservationID</th>
                                        <th scope="col">Destinations</th>
                                        <th scope="col">Reservation_From</th>
                                        <th scope="col">Reservation_To</th>
                                        <th scope="col">Reserved Hotel</th>
                                        <th scope="col">Tour Guide</th>
                                        <th scope="col">Total Cost of Tour</th>
                                        <th scope="col">Payment Status</th>
                                        <th scope="col"></th>

                                    </tr>
                                </thead>
                                <tbody> <?php
                    while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['ReservationID'] . "</td>";
echo "<td>" . $row['DestName'] . "</td>";
echo "<td>" . $row['Reserved_From'] . "</td>";
echo "<td>" . $row['Reserved_to'] . "</td>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['FirstName'] . "</td>";
echo "<td>" . $row['Cost_of_Tour'] . "</td>";
echo "<td>" . $row['Payment_Status'] . "</td>";
echo '<td><a href="delete_res.php?id=' . $row['ReservationID'] . '" class="delete">Delete</a></td>';


echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>

                                </tbody>

                            </table>
                           

                            <!-- Table Ending -->
                        </div>
                    </div>
                </div>
                <!-- Pagiation Start -->
                
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
