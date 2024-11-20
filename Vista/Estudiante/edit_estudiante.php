<?php
$cod_estudiante = $nombre_estudiante = $documento_estudiante = "";

if(isset($dataToView["data"]["cod_estudiante"])) $cod_estudiante = $dataToView["data"]["cod_estudiante"];
if(isset($dataToView["data"]["nombre_estudiante"])) $nombre_estudiante = $dataToView["data"]["nombre_estudiante"];
if(isset($dataToView["data"]["documento_estudiante"])) $documento_estudiante = $dataToView["data"]["documento_estudiante"];

?>
<a href="logout.php">Cerrar sesion</a>
<div class="row">
	<?php
	if(isset($_GET["response"]) and $_GET["response"] === true){
		?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="inicio.php?controller=estudiante&action=list">Volver al listado</a>
		</div>
		<?php
	}
	?>
	<form class="form" action="inicio.php?controller=estudiante&action=save" method="POST">
		<input type="hidden" name="cod_estudiante" value="<?php echo $cod_estudiante; ?>" />
		<div class="form-group">
			<label>Nombre</label>
			<input class="form-control" type="text" name="nombre_estudiante" value="<?php echo $nombre_estudiante; ?>" />
		</div>
		<div class="form-group mb-2">
			<label>Documento</label>
			<textarea class="form-control" style="white-space: pre-wrap;" name="documento_estudiante"><?php echo $documento_estudiante; ?></textarea>
		</div>
		<input type="submit" value="Guardar" class="btn btn-primary"/>
		<a class="btn btn-outline-danger" href="inicio.php?controller=estudiante&action=list">Cancelar</a>
	</form>
</div>