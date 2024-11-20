<a href="logout.php">Cerrar sesion</a>
<div class="row">
	<div class="col-md-12 text-right">
		<a href="inicio.php?controller=estudiante&action=edit" class="btn btn-outline-primary">Crear estudiante</a>
		<hr/>
	</div>
	<?php
	if(count($dataToView["data"])>0){
		foreach($dataToView["data"] as $estudiante){
			?>
			<div class="col-md-3">
				<div class="card-body border border-secondary rounded">
				<h5 class="card-title"><?php echo $estudiante['cod_estudiante']; ?></h5>
					<h5 class="card-title"><?php echo $estudiante['nombre_estudiante']; ?></h5>
					<div class="card-text"><?php echo nl2br($estudiante['documento_estudiante']); ?></div>
					<hr class="mt-1"/>
					<a href="inicio.php?controller=estudiante&action=edit&cod_estudiante=<?php echo $estudiante['cod_estudiante']; ?>" class="btn btn-primary">Editar</a>
					<a href="inicio.php?controller=estudiante&action=confirmDelete&cod_estudiante=<?php echo $estudiante['cod_estudiante']; ?>" class="btn btn-danger">Eliminar</a>
				</div>
			</div>
			<?php
		}
	}else{
		?>
		<div class="alert alert-info">
			Actualmente no existen estudiantes.
		</div>
		<?php
	}
	?>
</div>