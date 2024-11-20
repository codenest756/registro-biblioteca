<div class="row">
	<form class="form" action="inicio.php?controller=estudiante&action=delete" method="POST">
		<input type="hidden" name="cod_estudiante" value="<?php echo $dataToView["data"]["cod_estudiante"]; ?>" />
		<a href="logout.php">Cerrar sesion</a>
		<div class="alert alert-warning">
			<b>¿Confirma que desea eliminar esta estudiante?:</b>
			<i><?php echo $dataToView["data"]["nombre_estudiante"]; ?></i>
		</div>
		<input type="submit" value="Eliminar" class="btn btn-danger"/>
		<a class="btn btn-outline-success" href="inicio.php?controller=estudiante&action=list">Cancelar</a>
	</form>
</div>