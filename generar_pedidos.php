<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-6" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lactalis - Pedidos</title>
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
	<form method="post" action="">
	<br><h2><b>Generar Pedido</b></h2><br>
	<?php
	$id = $userinfo['id_usuario'];
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$err = array();
		if ( isset ($_POST["id_pedido"])){ 
			$id_pedido = $_POST["id_pedido"];
		} else {
			$time = time();
			$sql = "INSERT INTO Pedidos (id_usuario, timer) VALUES ($id, $time)";
			$result = $conn->query($sql);
			$sql = "SELECT id_pedido FROM Pedidos WHERE timer='$time'";
			$result = $conn->query($sql);
			$pedido = $result->fetch_assoc();
			$id_pedido = $pedido["id_pedido"];
		}
		echo '<input type="hidden" name="id_pedido" value="'.$id_pedido.'">'; 
		$sql = "UPDATE Pedidos SET tienda='$_POST[tienda]' WHERE id_pedido='$id_pedido'";
		$result = $conn->query($sql);
		if (empty($_POST["producto"])) {
			$err["name"]= "Se requiere seleccionar un producto";
		}
		if (empty($_POST["tienda"])) {
			$err["name"]= "Se requiere seleccionar una tienda";
		}
		if (empty($_POST["cantidad"])) {
			$err["age"]= "Se requiere especificar una cantidad";
		}
		if(!count($err)){
			$sql = "INSERT INTO Desg (cantidad, unidad, departamento, producto, id_pedido) VALUES ('$_POST[cantidad]', '$_POST[unidad]', '$_POST[dpto]', '$_POST[producto]', '$id_pedido')";
			$result = $conn->query($sql);
			if ( $_POST['submit']=="Finalizar Pedido" ){
				echo "<script type='text/javascript'>window.location.href = 'consultar_pedidos.php';</script>";
			} 
		} else {
			echo $err[0];
		}
	} else {
		
	}
	?>
	<table>
		<tr>
			<td width="180px">Sel. Tienda</td>
			<td>
				<input name="tienda" list="tiendas" class="form-control" style="margin-top:5px; margin-bottom:5px;" value="<?php if(isset($_POST["tienda"])){ echo $_POST["tienda"];} ?>">
				<datalist id="tiendas">
					<?php 
					$sql = "SELECT nombre, code FROM Clientes";
					$result = $conn->query($sql);
					while($row = $result->fetch_assoc()) 
					{	
						echo "<option value='$row[nombre]'>$row[code]</option>";
						
					}
					?>
				</datalist>
			</td>
		</tr><tr>
			<td>Sel. Departamento</td>
			<td>
				<select name="dpto" class="form-control" style="margin-top:5px; margin-bottom:5px;">
					<option value="Paquete" <?php if(isset($_POST["dpto"]) AND $_POST["dpto"]=="Paquete"){ echo " selected"; } ?>> Paquete </option>
					<option value="Granel"  <?php if(isset($_POST["dpto"]) AND $_POST["dpto"]=="Granel"){ echo " selected"; } ?>>Granel</option>
					<option value="Cocina"  <?php if(isset($_POST["dpto"]) AND $_POST["dpto"]=="Cocina"){ echo " selected"; } ?>>Cocina</option>
					<option value="Panaderia" <?php if(isset($_POST["dpto"]) AND $_POST["dpto"]=="Panaderia"){ echo " selected"; } ?>>Panaderia</option>
				</select>
			</td>
		</tr><tr>
			<td>Cantidad</td>
			<td>
			<input type="number" name="cantidad" class="form-control" style="margin-top:5px; margin-bottom:5px;">
			</td>
		</tr><tr>
			<td align="right" colspan="2">
				<input type="radio" value="KG" name="unidad" checked="checked"/> KG &nbsp&nbsp
				<input type="radio" value="PZA" name="unidad"/> PZA &nbsp&nbsp
				<input type="radio" value="C/F" name="unidad"/> C/F	&nbsp&nbsp
				<input type="radio" value="DEG" name="unidad"/> DEG 
			</td>
		</tr><tr>
			<td>Sel. Producto</td>
			<td>
				<input name="producto" list="productos" class="form-control" style="margin-top:5px; margin-bottom:5px;">
				<datalist id="productos">
					<?php 
					$sql = "SELECT * FROM Productos";
					$result = $conn->query($sql);
					while($row = $result->fetch_assoc()) 
					{	
						echo "<option value='$row[nombre]'>$row[marca]</option>";
						
					}
					?>
				</datalist>
			</td>
		<tr>
		<?php
			if (isset($id_pedido)){
				$sql = "SELECT * FROM Desg WHERE id_pedido = '$id_pedido'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					echo "<tr><td colspan='2' align='center'><h3>En este pedido</h3></td></tr>";
					while($row = $result->fetch_assoc()) 
					{
						echo "<tr><td colspan='2'><b>$row[cantidad] $row[unidad]</b> de <b>$row[producto]</b> para <b>$row[departamento]</b></td></tr>";
					}
				}
			}
		?>
	</table>
	<br><br>
	<a class="btn btn-default" href="menu.php"><i class="fa fa-arrow-left "></i> Regresar</a>
	<input class="btn btn-primary" type="submit" name="submit" value="Agregar otro producto">
	<input class="btn btn-primary" type="submit" name="submit" value="Finalizar Pedido">
	</form>
</div>
</body>
</html>

