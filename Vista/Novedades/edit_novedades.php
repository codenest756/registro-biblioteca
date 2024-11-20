<?php
$tipo = $solucion = $descripcion = $cod = $cod_estudiante = $fecha = "";

if(isset($dataToView["data"]["tipo"])) $tipo = $dataToView["data"]["tipo"];
if(isset($dataToView["data"]["solucion"])) $solucion = $dataToView["data"]["solucion"];
if(isset($dataToView["data"]["descripcion"])) $descripcion = $dataToView["data"]["descripcion"];
if(isset($dataToView["data"]["cod"])) $cod = $dataToView["data"]["cod"];
if(isset($dataToView["data"]["cod_estudiante"])) $cod_estudiante = $dataToView["data"]["cod_estudiante"];
if(isset($dataToView["data"]["fecha"])) $fecha= $dataToView["data"]["fecha"];


?>
<a href="logout.php">Cerrar sesion</a>
<div class="row">
	<?php
	if(isset($_GET["response"]) and $_GET["response"] === true){
		?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="inicio.php?controller=novedades&action=list">Volver al listado</a>
		</div>
		<?php
	}
	?>
	<form class="form" action="inicio.php?controller=novedades&action=save" method="POST">
		<input type="hidden" name="cod" value="<?php echo $cod; ?>" />
		<div class="form-group mb-2">
			<label>Tipo</label>
			<input type class="form-control" type="text" name="tipo" value="<?php echo $tipo; ?>" />
		</div>
		<div class="form-group mb-2">
			<label>Solucion<t/label>
			<textarea class="form-control" style="white-space: pre-wrap;" name="solucion"><?php echo $solucion; ?></textarea>
		</div>
		<div class="form-group mb-2">
			<label>Descripcion<t/label>
			<textarea class="form-control" style="white-space: pre-wrap;" name="descripcion"><?php echo $descripcion; ?></textarea>
		</div>
		<div class="form-group mb-2">
			<label>Cod Estudiante<t/label>
			<textarea class="form-control" style="white-space: pre-wrap;" name="cod_estudiante"><?php echo $cod_estudiante; ?></textarea>
		</div>
		<div class="form-group mb-2">
			<label>Fecha<t/label>
			<input type = "date"class="form-control" style="white-space: pre-wrap;" name="fecha"><?php echo $fecha; ?></textarea>
		</div>
		<input type="submit" value="Guardar" class="btn btn-primary"/>
		<a class="btn btn-outline-danger" href="inicio.php?controller=novedades&action=list">Cancelar</a>
	</form>
</div>

