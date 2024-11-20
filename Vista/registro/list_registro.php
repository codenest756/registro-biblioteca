<div class="row">
	<div class="col-md-12 text-right">
		<a href="inicio.php?controller=registro&action=edit" class="btn btn-outline-primary">Registrar</a>
		<hr/>
	</div>
	<?php
	if(count($dataToView["data"])>0){
		foreach($dataToView["data"] as $registro){
			?>
			<div class="col-md-3">
				<div class="card-body border border-secondary rounded">
				<div class="card-text"><?php echo nl2br($registro['cod_estudiante']); ?></div>
				<div class="card-text"><?php echo nl2br($registro['fecha']); ?></div>
					<hr class="mt-1"/>
					<a href="inicio.php?controller=registro&action=edit&cod_registro=<?php echo $registro['cod_registro']; ?>" class="btn btn-primary">Editar</a>
					<a href="inicio.php?controller=registro&action=confirmDelete&cod_registro=<?php echo $registro['cod_registro']; ?>" class="btn btn-danger">Eliminar</a>
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