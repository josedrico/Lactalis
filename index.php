<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lactalis - Inicio</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<?php
   include("dbadmin.php");
   session_start();
   
   $error="";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myuser = str_replace("'", "", $_POST['user']);
      $mypassword = str_replace("'", "", $_POST['password']); 
      
      $sql = "SELECT id_usuario FROM Usuarios WHERE email = '$myuser' and pwd = '$mypassword'";

      $result = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		if($count == 1) {
			$_SESSION['login_user'] = $mypassword;
			echo "<script type='text/javascript'>window.location.href = 'menu.php';</script>";
		}  else {
			$error = "Usuario o contraseña incorrectos.";
		}
	}
?>
    <div align="center">
		<img src="assets/img/Lactalis.png"></i><br><br>
		<form action="" method = "post">
			<input type="text" style="width:400px;" placeholder="Usuario" class="form-control" name="user" <?php if(isset($_POST['user'])){ echo "value='$_POST[user]'";} ?>><br>
			<input type="password" style="width:400px;" placeholder="Contraseña" class="form-control" name="password"/><br>
			<input type="submit" class="btn btn-primary" style="width:400px;" value="ENTRAR">
			<div style = "color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
		</form>
    </div>

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
