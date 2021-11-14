<?php
    session_start();
    $conn=mysqli_connect("localhost:3308","root","","voyage");
    $uname=$_REQUEST['Uname'];
    $_SESSION['id']=$uname;
    $pass=$_REQUEST['Pass'];
    $status=$_REQUEST['status'];
    $sql="SELECT PersonID FROM Userinfo WHERE UserName='".$uname."' and pass='".$pass."'";
    $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
          $row = mysqli_fetch_array($result);
          $pid =$row['PersonID'];
           $_SESSION['pid']=$pid;
           $cid="SELECT CustomerID FROM Customer WHERE PersonID=$pid";
           $c_result = mysqli_query($conn,$cid);
           $row1 = mysqli_fetch_array($c_result);
           $c=$row1['CustomerID'];
           $aid="SELECT AdminID FROM Admin WHERE PersonID=$pid";
           $c_result1= mysqli_query($conn,$aid);
           $row2 = mysqli_fetch_array($c_result1);
           $a=$row2['AdminID'];
          if ($status=="Customer" and $c>0 ){
           $sql1="SELECT CustomerID FROM Customer WHERE CustomerID=$c";
           $result1=mysqli_query($conn,$sql1);
           header('Location:main.php');
           }
         else if($status=="Customer" and $c<1){
           echo "Choose right status";
           }
         else if ($status=="Admin" and $a>0){
          $sql2="SELECT AdminID FROM Admin WHERE AdminID=$a";
          $result2=mysqli_query($conn,$sql2);
          header('Location:adminDashboard.php');}
         else if ($status=="Admin" and $a<1){
           echo "Choose right status";
      }}
       else
        echo "You have entered the wrong credentials check username or password";
         
    ?>
