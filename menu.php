<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-6" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lactalis - Menu</title>
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
<?php include("user_session.php"); ?>
<div class="navbar navbar-fixed-top navbar-custom" style="height:80px;">
	<br>
	<table width="100%"><tr>
		<td>&nbsp&nbsp&nbsp&nbsp<img src="assets/img/Lactalis.png" width="100px" height="40px"></i></td>
		<td align="right"><font size="3" style="margin-right:30px;" color="black" width="100%"><b><?php echo $userinfo['nombre']; ?></b>&nbsp&nbsp&nbsp&nbsp 
		<a class="btn" href="logout.php">SALIR</a></font><td>
	</tr></table>
</div>
<div align="center">
	<br><br>
	<a class="btn btn-default" href="consultar_pedidos.php" style="width:240px;">Consultar Pedidos</a><br><br>
	<a class="btn btn-default" href="generar_pedidos.php" style="width:240px;">Generar Pedidos</a><br><br>
	<a class="btn btn-default" href="act_clientes.php" style="width:240px;">Actualizar Clientes</a><br><br>
	<a class="btn btn-default" href="act_productos.php" style="width:240px;">Actualizar Productos</a><br><br>
</div>
</body>
</html>

