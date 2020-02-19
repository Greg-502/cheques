<br><br>
<div class="container">

  <div class="row">
    <div class="col-md-12">
      <h4 style="font-weight: bold">Impresión</h4>
    </div>

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
                  <td><?php echo $xRenglon->nombre; ?></td>
                  <td><?php echo $xRenglon->nit;?></td>
                  <td>
                    <button type="button" <?=$buttonsStatus?> class="btn btn-primary"><i class="fas fa-print"></i></button>
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
