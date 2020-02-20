<style type="text/css">
  .pisto {
    text-align: right;
    font-weight: bold;
  }

  @media (max-width: 767px) {
    .pisto{
      text-align: left;
      color: gray;
    }
}
</style>

<br><br>
<div class="container">

  <div class="row">
    <div class="col-md-12">
      <h4 style="font-weight: bold">Impresión</h4>
      <hr class="my-4">
    </div>

<div class="container">
  <div class="row">
    <div class="col-12 col-md-9">
        <h4 style="font-weight: bold;">Listado</h4>
      </div>
  </div>

  <div class="row">
    <div class="container box">
      <div class="box-body">
          <table id="example" class="table table-striped table-bordered table-hover table-responsive-sm table-responsive-md" style="width:100%">
          <thead>
              <tr>
                <th scope="col">Cargo</th>
                <th scope="col">Id empleado</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nit</th>
                <th scope="col" style="text-align: center;">Opciones</th>
              </tr>
          </thead>
          <tbody>
            <?php  if(!empty($empleados)):?>
          <?php  foreach($empleados as $xRenglon):?>
              <?php //controla el estado de los botones
              $classButton = "";
              $classIcon = "";
              $buttonsStatus = "";

                if ($xRenglon->status == '1') {
                  $classIcon = 'class="fas fa-minus-circle"';
                  $classButton = 'class="btn btn-danger"';
              }else {
                $classIcon = 'class="fas fa-check"';
                $classButton = 'class="btn btn-success"';
                $buttonsStatus = 'disabled';
              }//----------------------
              ?>
                <tr>
                  <td><?php echo "Residentes ".$xRenglon->cargo; ?></td>
                    <td><?php echo $xRenglon->id_Empleado?></td>
                    <td><?php echo $xRenglon->nombre; $nombre = $xRenglon->nombre; ?></td>
                    <td><?php echo $xRenglon->nit;?></td>
                    <td>
                      <button type="button" data-toggle="modal" data-target="#imprimir" data-whatever="@mdo" <?=$buttonsStatus?> class="btn btn-primary"><i class="fas fa-print"></i></button>
                      <button type="button"  <?=$buttonsStatus?> class="btn btn-success"><i class="fas fa-user-edit"></i></button>
                      <button id="baja" type="button" onclick="DarBaja(<?php echo $xRenglon->id_Empleado.','.$xRenglon->status?>)" <?=$classButton?>>
                        <i id="icon" <?=$classIcon?>></i>
                      </button>
                    </td>
                </tr>
              <?php  endforeach;?>
          <?php  endif;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<br>
<!-- inicio del formulario emergente para iimprimir-->
<div class="modal fade" id="imprimir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos de la Impresión</h5>
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
          <button  onclick="nuevoColor()" data-dismiss="modal" class="btn btn-primary" name="imprimir" value="Imprimir" style="color:white;">Imprimir</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Fin ventana emergente-->
</body>
</html>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {
    var groupColumn = 0;
    var table = $('#example').DataTable({
      "language": {
            "lengthMenu": "_MENU_",
            "zeroRecords": "Ningún registro",
            "searchPlaceholder": "Buscar",
            "info": "_TOTAL_ registro(s)",
            "infoEmpty": "Ningun registro",
            "infoFiltered": "(Busqueda en _MAX_ registros)",
            "search": "",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        },
        "columnDefs": [
            { "visible": false, "targets": groupColumn }
        ],
        "order": [[ groupColumn, 'asc' ]],
        "displayLength": 10,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;

            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group" style="font-weight: bold;"><td colspan="6">'+group+'</td></tr>'
                    );

                    last = group;
                }
            } );
        }
    } );



    // Order by the grouping
    $('#example tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[3];
        if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
            table.order( [ groupColumn, 'desc' ] ).draw();
        }
        else {
            table.order( [ groupColumn, 'asc' ] ).draw();
        }
    } );
} );

  function classBtnEdit(){

  }

  var DarBaja = function(id_empleado,status) {
//busca en la BD el estatus del empleado

    var request = $.ajax({
      method: "POST",
      url: "<?=$base_url?>/Main/cambiarStatus",
      data: {
        id: id_empleado,
        status: status
      }
    });
    request.done(function(resultado) {
        if (status == "1") {
          swal.fire(resultado);
          location.reload();
        }else if (status == "0") {
          swal.fire(resultado);
          location.reload();
        }
    });
  }

</script>
<br>
  </div>
</div>
