<?php
session_start();
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id=$_SESSION['id'];
$sql="SELECT C.CustomerID, P.FirstName, P.CNIC, P.Email,P.ContactNo, P.Gender, P.Age, A.Country, A.Province, A.City, A.Street, A.HouseNO
FROM Customer C join (Person P join Address A on P.AddressID=A.AddressID) on C.PersonID=P.PersonID";
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
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure you want to delete this Customer?')){
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
          <li class="breadcrumb-item active text-bold" aria-current="page">Managing Customers</li>
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
              <a class="nav-link active " href="manageCustomers.php">
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
          </ul>
        </div>
      </nav>
      <!-- SideMenu End -->

      <!-- Main Body Start -->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" id="main">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 m-2 border-bottom">
          <h1 class="h2 text-uppercase mt-3" id="mainBoxHeading">Managing Customers</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <a href="addCustomer.php">
                <button type="button" class="btn btn-danger shadow rounded ml-2">
                  Add Customer
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
                                        <th scope="col">Customer ID</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">CNIC</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col">Home Address</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Age</th> 
                                        <th scope="col"></th>  
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                    while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['CustomerID'] . "</td>";
echo "<td>" . $row['FirstName'] . "</td>";
echo "<td>" . $row['CNIC'] . "</td>";
echo "<td>" . $row['Email'] . "</td>";
echo "<td>House# " . $row['HouseNO'] . " ". $row['Street'] . " ". $row['City'] . " ". $row['Province'] . " ". $row['Country'] . "</td>";
echo "<td>" . $row['ContactNo'] . "</td>";
echo "<td>" . $row['Gender'] . "</td>";
echo "<td>" . $row['Age'] . "</td>";
echo '<td><a href="delete_customer.php?id=' . $row['CustomerID'] . '" class="delete">Delete</a></td>';


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