<a href="logout.php">Cerrar sesion</a>
<div class="row">
	<div class="col-md-12 text-right">
		<a href="inicio.php?controller=novedades&action=edit" class="btn btn-outline-primary">Crear novedades</a>
		<hr/>
	</div>
	<?php
	if(count($dataToView["data"])>0){
		foreach($dataToView["data"] as $novedades){
			?>
			<div class="col-md-3">
				<div class="card-body border border-secondary rounded">
					<h5 class="card-title"><?php echo $novedades['tipo']; ?></h5>
					<h5 class="card-title"><?php echo $novedades['descripcion']; ?></h5>
					<h5 class="card-title"><?php echo $novedades['cod_estudiante']; ?></h5>
					<div class="card-text"><?php echo nl2br($novedades['fecha']); ?></div>
					<hr class="mt-1"/>
					<a href="inicio.php?controller=novedades&action=edit&cod=<?php echo $novedades['cod']; ?>" class="btn btn-primary">Editar</a>
					<a href="inicio.php?controller=novedades&action=confirmDelete&cod=<?php echo $novedades['cod']; ?>" class="btn btn-danger">Eliminar</a>
				</div>
			</div>
			<?php
		}
	}else{
		?>
		<div class="alert alert-info">
			Actualmente no existen novedades.
		</div>
		<?php
	}
	?>
</div>