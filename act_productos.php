<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-6" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lactalis - Productos</title>
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
	<br><h2><b>Productos</b></h2><br>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th width="30px">No.</th>
				<th>Nombre</th>
				<th>Marca</th>
				<th>Categoria</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$sql = "SELECT * FROM Productos";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) 
					{
						echo "<tr>
							<td>$row[id_producto]</td>
							<td>$row[nombre]</td>
							<td>$row[marca]</td>
							<td>$row[categoria]</td>
						</tr>";
					}
				}
			?>
		</tbody>
	</table>
	<a class="btn btn-default" href="menu.php"><i class="fa fa-arrow-left"></i> Regresar</a>
	<a class="btn btn-primary" href="menu.php"><i class="fa fa-refresh"></i> Actualizar</a>
</div>
</body>
</html>

