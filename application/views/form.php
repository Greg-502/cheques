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
          <th scope="col">Nombre</th>
                <th scope="col">Departamento</th>
          <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
          <th scope="col">Placa</th>
          <th scope="col" style="text-align: center;">Área</th>
          <th scope="col" style="text-align: center;">Correlativo</th>
            </tr>
        </thead>
        <tbody>
          <?php  if(!empty($datos)):?>
        <?php  foreach($datos as $xRenglon):?>
              <tr>
                  <td><?php echo $xRenglon->nombre?></td>
                    <td scope="row"><?php echo $xRenglon->Expr1." ".$xRenglon->apellido; ?></td>
                  <td><?php echo $xRenglon->marca; ?></td>
                    <td><?php echo $xRenglon->modelo; ?></td>
                  <td>
                     <center>
                         <?php echo $xRenglon->placa; ?>
                     </center>   
                    </td>
                  <td>
                    <?php 
                        if ($xRenglon->area == 1) {
                            ?>
                            <center class="text-warning" style="font-weight: bold">
                                <?php
                                echo "Admon";
                                ?>
                            </center>
                            <?php
                        } else if ($xRenglon->area == 2) {
                            ?>
                            <center style="color: #ff00ff; font-weight: bold">
                                <?php
                                echo "Residente";
                                ?>
                            </center>
                            <?php
                        } else if ($xRenglon->area == 3) {
                            ?>
                            <center style="color: #cd853f; font-weight: bold">
                                <?php
                                echo "Interno";
                                ?>
                            </center>
                            <?php
                        } else if ($xRenglon->area == 4) {
                            ?>
                            <center style="color: #cd5c5c; font-weight: bold">
                                <?php
                                echo "Proveedor";
                                ?>
                            </center>
                            <?php
                        } else if ($xRenglon->area == 5) {
                            ?>
                            <center style="color: #00ff00; font-weight: bold">
                                <?php
                                echo "Operario";
                                ?>
                            </center>
                            <?php
                        } else if ($xRenglon->area == 6) {
                            ?>
                            <center style="color: #ffa500; font-weight: bold">
                                <?php
                                echo "Visita";
                                ?>
                            </center>
                            <?php
                        } else if ($xRenglon->area == 7) {
                            ?>
                            <center style="color: #ff0000; font-weight: bold">
                                <?php
                                echo "Enfermería";
                                ?>
                            </center>
                            <?php
                        } else if ($xRenglon->area == 8) {
                            ?>
                            <center style="color: #20b2aa; font-weight: bold">
                                <?php
                                echo "Médico";
                                ?>
                            </center>
                            <?php
                        }
                    ?></td>
                  <td>
                     <center>
                         <?php echo "#".$xRenglon->correlativo; ?>
                     </center>   
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
            "zeroRecords": "Ningún marbete",
            "searchPlaceholder": "Buscar",
            "info": "_TOTAL_ marbete(s)",
            "infoEmpty": "Ningún marbete",
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
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
            table.order( [ groupColumn, 'desc' ] ).draw();
        }
        else {
            table.order( [ groupColumn, 'asc' ] ).draw();
        }
    } );
} );
</script>
<br>
  </div>
</div>
