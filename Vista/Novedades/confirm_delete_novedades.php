
<a href="logout.php">Cerrar sesion</a>
<div class="row">
	<form class="form" action="inicio.php?controller=novedades&action=delete" method="POST">
		<input type="hidden" name="cod" value="<?php echo $dataToView["data"]["cod"]; ?>" />
		<div class="alert alert-warning">
			<b>¿Confirma que desea eliminar esta novedad?:</b>
			<i><?php echo $dataToView["data"]["tipo"]; ?></i>
		</div>
		<input type="submit" value="Eliminar" class="btn btn-danger"/>
		<a class="btn btn-outline-success" href="inicio.php?controller=novedades&action=list">Cancelar</a>
	</form>
</div>