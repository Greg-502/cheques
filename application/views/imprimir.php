<!-- inicio del formulario emergente para ingresar color nuevo-->
<div class="modal fade" id="imprimir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Desea imprimir el cheque de: <?php echo $nombre; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Ingrese un nuevo color</label>
						<input type="text" required class="form-control" id="nuevo_color" name="color" value="<?php $color ?>">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" style="color:white;">Cerrar</button>
						<button  onclick="nuevoColor()" data-dismiss="modal" class="btn btn-primary" name="imprimir" value="Imprimir" style="color:white;">Guardar</button>
					</div>
			</div>
		</div>
	</div>
</div>
<!-- Fin ventana emergente-->
