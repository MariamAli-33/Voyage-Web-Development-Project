<?php
session_start();
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//$pid=$id=$_SESSION['pid'];
$id=$_SESSION['id'];
?>
<!doctype html>
<html lang="en">

    <head>
 
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
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 p-4" href="#"><?php echo $id;?></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
        data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-sliders-h"></i>
    </button>
    <!-- Bredcrumbs Start -->
    <div class="col-sm">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb bg-dark m-2">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Login</a></li>
              <li class="breadcrumb-item active text-bold" aria-current="page">Tour Guidance</li>
            </ol>
          </nav>
    </div>
        <input class="form-control w-25" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="logout.php" style="color:  rgb(255, 255, 255); font-size: 15px;"> Log Out <span><i class="fas fa-sign-out-alt"></i></span></a>
            </li>
        </ul>
</nav>
<!-- Navbar End -->
<div class="container-fluid" >
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
                        <a class="nav-link active" href="guidance.php">
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
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" id="main" >
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 m-2 border-bottom">
                <h1 class="h2 text-uppercase m-3" id="mainBoxHeading">Tour Guide for our Users</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="#agentSection">
                        <button type="button" class="btn btn-danger shadow rounded ">
                            Connect Us
                        </button>
                    </a>
                </div>
            </div>
                <!-- Accordian Start -->
                <div class="row" id="mainSubs">
                    <div class="col-sm-12">
                        <h4 class=" py-3">Important Questions</h4>
                        <hr>
                        <div class="accordion shadow rounded" id="accordionExample">
                            <div class="card">
                                <div class="card-header bg-primary shadow rounded" id="headingOne">
                                    <h1 class="mb-0  text-bold">
                                        <button class="btn btn-block text-left bg-primary" type="button"
                                            data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Popular Hotels for Staying
                                        </button>
                                    </h1>
                                </div>
                                <?php 
                                if(isset($_SESSION['pid'])){
                            $result = mysqli_query($conn, "SELECT Name,Rating,One_night_stay_cost,Reason_of_popularity from
                            hotels where rating='five star' or rating='four star' ORDER BY rating desc;
                            ");
                               if($result){
                                
                           
                            while($res = mysqli_fetch_array($result)){
                                        
                                $hotelName = $res['Name'];
                                $rating = $res['Rating'];
                                $popularity=$res['Reason_of_popularity'];
                                $cost=$res['One_night_stay_cost'];

                               echo " <div id='collapseOne' class='collapse show' aria-labelledby='headingOne'
                                    data-parent='#accordionExample'>
                                    <div class='card-body'>
                                    Hotel Name:".$hotelName;echo"    <br>
                                    Rating:"  .$rating;echo" stars       <br>
                                    Reason of Popularity:".$popularity;echo"   <br>
                                    Cost of one night stay:" .$cost;echo" PKR  
                                    </div>
                                </div>" ;} 
                            } else{
                                echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
                            }
                           }
                           else{
                               Header('Location:login.html');
                           }
                           
                           ?>
                            </div>
                            <div class="card">
                                <div class="card-header bg-warning  shadow rounded" id="headingTwo">
                                    <h1 class="mb-0" style="font-weight: bold; font-size: 20px;">
                                        <button class="btn btn-block text-left collapsed bg-warning" type="button"
                                            data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            Top Destinations
                                        </button>
                                    </h1>
                                </div>
                                <?php 
                            $result = mysqli_query($conn, "SELECT d.DestName as dName,d.Information as info,d.Suggestion as
                            suggestion,l.Name as langName  from
                            destinations as d join languages as l where d.Home_LanguageID=l.LanguageID ;
                            ");
                            while($res = mysqli_fetch_array($result)){
                                        
                                $destName = $res['dName'];
                                $info=$res['info'];
                                $suggestion=$res['suggestion'];
                                $langName = $res['langName'];
                                echo "<div id='collapseTwo' class='collapse' aria-labelledby='headingTwo'
                                    data-parent='#accordionExample'>
                                    <div class='card-body'>
                                    Destination Name: ".$destName; echo"<br>
                                    Native Language: ".$langName;echo"<br>
                                    Information: ".$info; echo"<br>
                                    Suggestion: ".$suggestion;echo"<br>
                                    
                                    </div>
                                </div>";} ?>
                            </div>
                            <div class="card">
                                <div class="card-header bg-danger border-dark shadow rounded" id="headingThree">
                                    <h1 class="mb-0 ">
                                        <button class="btn btn-block text-left collapsed bg-danger" type="button"
                                            data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                           Tourist Attractions
                                        </button>
                                    </h1>
                                </div>
                                <?php 
                            $result = mysqli_query($conn, "SELECT Name,Information from attractions
                            ");
                            while($res = mysqli_fetch_array($result)){
                                        
                                $attrName = $res['Name'];
                                $info=$res['Information'];
                                echo "<div id='collapseThree' class='collapse' aria-labelledby='headingThree'
                                    data-parent='#accordionExample'>
                                    <div class='card-body'>
                                       Name: ".$attrName;echo"<br>
                                       Information: ".$info;echo"
                                    </div>
                                </div>" ;} ?>
                            </div>

                        </div>
                    </div>


                    
                </div>

                <!-- Accordian End -->
                <?php


$result = mysqli_query($conn, "SELECT CONCAT(person.firstName,' ',person.lastName) 
as fullName,No_of_tours_guided,Speciality_areas,
Years_of_Experience
 FROM person JOIN tourguide where person.PersonID=tourguide.PersonID LIMIT 10");

                                    ?>
		



                
                       
                
               <!-- Agent Lists Start-->
                <div class='row mt-4' id='mainSubs'> 
                    <div class='col-sm-12' id='agentSection'>
                        <h4>Tour Agents List</h4>
                        <hr>
                        <ul class='list-unstyled py-3 ' id='agent_list'>
                        <?php while($res = mysqli_fetch_array($result)){
                                        
                                        $fullName = $res['fullName'];
                                        $toursguided=$res['No_of_tours_guided'];
                                        $experience=$res['Years_of_Experience'];
                                        $speciality=$res['Speciality_areas']; echo"
                            <li class='media'>
                                <img src='./pics/user.jfif' class='mr-3 '>
                                <div class='media-body'>
                                    <h5 class='mt-0 mb-1'>Travel Agent</h5>
                                    
                                    Hello ".$id; echo". My name is " .$fullName ; echo ".I have an experience of " .$experience;echo " years.
                                    My Speciality areas are ".$speciality;echo". I have guided ".$toursguided;echo" tours.Contact me and  will be happy to guide you further.
                                    
                                    </br>
                                    <div class='row float-right px-5'>
                                        <a href='guidance.php'>
                                            <button type='button' class='btn btn-primary '>Contact Me</button>
                                        </a>
                                    </div>
                                </div>
                            </li>"; }?>
                         
                        </ul>
                    </div>
                </div>
                <!-- Agent Lists End -->
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://kit.fontawesome.com/b33adcddb8.js" crossorigin="anonymous"></script>
    <script src="./my js/main.js"></script>
</body>

</html>