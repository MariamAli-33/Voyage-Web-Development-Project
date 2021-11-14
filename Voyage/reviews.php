<?php
session_start();
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id=$_SESSION['id'];
$sql1="SELECT R.Customer_Review, P.LastName FROM CustomerReviews R join (Customer C join Person P on C.PersonID=P.PersonID) on R.CustomerID=C.CustomerID
ORDER BY RAND()
LIMIT 1";
$sql2="SELECT R.Guide_Review, P.LastName FROM GuideReviews R join (TourGuide G join Person P on G.PersonID=P.PersonID) on R.GuideID=G.GuideID
ORDER BY RAND()
LIMIT 1";
$sql3="SELECT R.Admin_Review, P.LastName FROM AdminReviews R join (Admin A join Person P on A.PersonID=P.PersonID) on R.AdminID=A.AdminID
ORDER BY RAND()
LIMIT 1";
$sql4="SELECT R.Admin_Review, P.LastName FROM AdminReviews R join (Admin A join Person P on A.PersonID=P.PersonID) on R.AdminID=A.AdminID
ORDER BY RAND()
LIMIT 1";
$result1= mysqli_query($conn,$sql1);
$result2= mysqli_query($conn,$sql2);
$result3= mysqli_query($conn,$sql3);
$result4= mysqli_query($conn,$sql4);
while($row1 = mysqli_fetch_array($result1))
{
$cname=$row1['LastName'];
$creview=$row1['Customer_Review'];
}
while($row2 = mysqli_fetch_array($result2))
{
$gname=$row2['LastName'];
$greview=$row2['Guide_Review'];
}
while($row3 = mysqli_fetch_array($result3))
{
$aname= $row3['LastName'];
$areview=$row3['Admin_Review'] ;
}
while($row4 = mysqli_fetch_array($result4))
{
$aname1= $row4['LastName'];
$areview1=$row4['Admin_Review'] ;
}
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("form").submit(function(){
    alert("Your Reviews are Submitted Successfully");
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
                    <li class="breadcrumb-item active text-bold" aria-current="page">User Reviews</li>
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
                            <a class="nav-link" href="attractions.html">
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
                            <a class="nav-link" href="guidance.php">
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
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">
                                <i class="fas fa-id-card"></i>
                                My Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="settings.php">
                                <i class="fas fa-cogs"></i>
                                Dashboard Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active " href="reviews.php">
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
                    <h1 class="h2 text-uppercase m-3" id="mainBoxHeading"> Our User Opnions</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="#reviewSection">
                            <button type="button" class="btn btn-danger shadow rounded ">
                                Give Review
                            </button>
                        </a>
                    </div>
                </div>
                <!-- User reviews start -->
                
                <div class="row" id="mainSubs">
                    <div class="col-sm-12 shadow p-3 m-2 rounded ">
                        <h4>Most popular reviews</h4>
                        <div class="media bg-warning shadow p-3  rounded ">
                            <div class="media-body">
                                <h5 class="mt-0" id="reviewHeading"> <?php echo $cname; ?> <span
                                        class="fa fa-star checked"><span class="fa fa-star checked"><span
                                                class="fa fa-star checked"><span class="fa fa-star checked"><i
                                                        class="fas fa-star-half-alt"></i></span></h5>
                                <?php echo $creview; ?>
                                <div class="media mt-3">
                                    <a class="mr-3" href="#">
                                    </a>
                                    <div class="media-body ">
                                        <h5 class="mt-0 "> <?php echo $aname; ?> </h5>
                                        <?php echo $areview; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="media bg-warning shadow p-3  rounded ">
                            <div class="media-body">
                                <h5 class="mt-0" id="reviewHeading"> <?php echo $gname; ?>  <span
                                        class="fa fa-star checked"><span class="fa fa-star checked"><span
                                                class="fa fa-star checked"><span class="fa fa-star checked"><i
                                                        class="fas fa-star-half-alt"></i></span></h5>
                                <?php echo $greview; ?>
                                <div class="media mt-3">
                                    <a class="mr-3" href="#">
                                    </a>
                                    <div class="media-body ">
                                        <h5 class="mt-0 "><?php echo $aname1; ?> </h5>
                                        <?php echo $areview1; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User reviews End -->

                <!-- Share Reviews Start -->
                <div class="row" id="mainSubs">
                    <div class="col-sm-12 shadow p-3 m-2 rounded " id="reviewSection">
                        <h4>Share your Opnions</h4>
                        <form action="reviews1.php">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Reviews</label>
                                <textarea class="form-control" name="rev" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <br>
                                <input type="submit" value="Submit your views">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Share Reviews End-->
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