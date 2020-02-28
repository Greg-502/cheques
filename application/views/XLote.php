
<br><br>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h4 style="font-weight: bold">Impresión</h4>
      <form method="POST" action="<?php echo base_url();?>XLote" autocomplete="off">
        <div class="col-md-12">
        <hr class="my-4">
      <h4 style="font-weight: bold;">Listado</h4>

          <table id="example" class="table table-striped table-bordered table-hover table-responsive-sm table-responsive-md" style="width:100%">
          <thead>
              <tr>
                <th scope="col">id Empleado</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nit</th>
              </tr>
          </thead>
          <tbody>
            <?php  if(!empty($empleadosImprimir)):?>
          <?php  foreach($empleadosImprimir as $xRenglon):?>
                <tr>
                  <td><?php echo $xRenglon->id_Empleado; ?></td>
                    <td><?php echo $xRenglon->nombre;?></td>
                    <td><?php echo $xRenglon->nit;?></td>
                </tr>
              <?php  endforeach;?>
          <?php  endif;?>
          </tbody>
        </table>
    </div>
    </div>
    </div>
	</div>
  </div>
</div>
<br>
