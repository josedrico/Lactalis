<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-6" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lactalis - Pedido</title>
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
<?php
	if(isset($_GET["ped"])){
		$sql = "SELECT * FROM Pedidos WHERE id_pedido = $_GET[ped]";
		$result = $conn->query($sql);
		$pedido = $result->fetch_assoc();
	}
?>
<div align="center">
	<br><h2><b>Consultar pedido</b></h2>
	<h3><?php echo "Pedido #$pedido[id_pedido] a $pedido[tienda]"?></h3><br>
	<table class="table table-striped table-bordered table-hover" width="400px">
		<thead>
			<tr>
				<th>Cantidad</th>
				<th>Departamento</th>
				<th>Producto</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if(isset($_GET["ped"])){
				$sql = "SELECT * FROM Desg where id_pedido='$_GET[ped]'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) 
					{
						echo "<tr>
							<td>$row[cantidad] $row[unidad]</td>
							<td>$row[departamento]</td>
							<td>$row[producto]</td>
						</tr>";
					}
				}
			}
			?>
		</tbody>
	</table>
	<a class="btn btn-default" href="consultar_pedidos.php"><i class="fa fa-arrow-left "></i> Regresar</a>
</div>
</body>
</html>

