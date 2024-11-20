<div class="row">
	<form class="form" action="inicio.php?controller=registro&action=delete" method="POST">
		<input type="hidden" name="cod_registro" value="<?php echo $dataToView["data"]["cod_registro"]; ?>" />
		<div class="alert alert-warning">
			<b>¿Confirma que desea eliminar esta registro?:</b>
			<i><?php echo $dataToView["data"]["nombre_estudiante"]; ?></i>
		</div>
		<input type="submit" value="Eliminar" class="btn btn-danger"/>
		<a class="btn btn-outline-success" href="inicio.php?controller=registro&action=list">Cancelar</a>
	</form>
</div>