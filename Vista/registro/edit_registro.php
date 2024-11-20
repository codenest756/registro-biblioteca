<?php
require_once "Modelo/estudiante.php";
$cod_registro = $cod_estudiante = $nombre_estudiante = $documento_estudiante = $fecha="";

if(isset($dataToView["data"]["cod_registro"])) $cod_registro = $dataToView["data"]["cod_registro"];
if(isset($dataToView["data"]["cod_estudiante"])) $cod_estudiante = $dataToView["data"]["cod_estudiante"];
if(isset($dataToView["data"]["fecha"])) $fecha = $dataToView["data"]["fecha"];

?>
<div class="row">
	<?php
	if(isset($_GET["response"]) and $_GET["response"] === true){
		?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="inicio.php?controller=registro&action=list">Volver al listado</a>
		</div>
		<?php
	}
	?>
	<form class="form" action="inicio.php?controller=registro&action=save" method="POST">
		<input type="hidden" name="cod_registro" value="<?php echo $cod_registro; ?>" />
		<div class="form-group">
		
		</div>
		<div class="form-group mb-2">
			
		</div>
		<div class="form-group">
			<label>Nombre</label>
			<input class="form-control" type="text" name="cod_estudiante" value="<?php echo $cod_estudiante; ?>" />
		</div>
		<div class="form-group">
			<label>Codigo Estudiante</label>
			<input class="form-control" type="text" name="cod_estudiante" value="<?php echo $cod_estudiante; ?>" />
		</div>
		<div class="form-group">
			<label>Fecha</label>
			
			<div id="current_date">
    <script>
        document.getElementById("current_date").innerHTML = Date();
    </script>
</div>
		</div>
		<input type="submit" value="Guardar" class="btn btn-primary"/>
		


		<a class="btn btn-outline-danger" href="inicio.php?controller=registro&action=list">Cancelar</a>
	</form>
</div>