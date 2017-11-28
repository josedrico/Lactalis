<?php
   include('dbadmin.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn, "SELECT pwd FROM Usuarios WHERE pwd = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['pwd'];
   
   if(!isset($_SESSION['login_user']) or ($login_session == '')){
	  echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
   }
   
	$sql = "SELECT * FROM Usuarios WHERE pwd = '$login_session'";
	$result = $conn->query($sql);
	$userinfo = $result->fetch_assoc();
?>