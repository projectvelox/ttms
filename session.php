<?php
   session_start();
   
   $user_check = $_SESSION['login_user'];
   $con = mysqli_connect("localhost","ttms","ttms","ttms");
   $ses_sql = mysqli_query($con,"select * from accounts where username = '$user_check' ");
   $ses_sql1 = mysqli_query($con,"select * from coaches where username = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $row1 = mysqli_fetch_array($ses_sql1,MYSQLI_ASSOC); 
   
   $login_session = $row['username'];
   $login_fullname = $row['firstname'] . " " . $row['lastname'];
   $coach = $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'];
   $gym = $row1['gym'];
   $login_access_level = $row['account_type'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }
?>