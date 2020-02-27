<style type="text/css">

  .detail{
    display: flex;
    flex-direction: row;
    height: 300px;
    border-radius: 0px 0px 40px 40px;
  }
  .detail__container{
    position: absolute;
    width: 450px;
    justify-content: space-between;
  }
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
      <?php
        if ($numeral != 8) {
          ?>
            <h4 style="font-weight: bold">Impresión</h4>
            <form method="POST" action="<?php echo base_url();?>XLote" autocomplete="off">
            <div class="form-row">
                <div class="col-md-2 mb-3">
                  <input id="rangoDesde" onchange="rango()" class="form-control" type="number" min="1" placeholder="Desde" name="from" required minlength="5" value="1">
                </div>

                <div class="col-md-2 mb-3">
                  <input id="rangoHasta" class="form-control" type="number" min="1" max="10" name="to" required minlength="5" value="1">
                </div>

              <div class="col-md-2">
                <button type="submit" class="btn btn-primary hvr-icon-fade">Imprimir</button>
              </div>
              </form>
            <div class="col-md-12">
            <hr class="my-4">
          <?php
        }
      ?>

        
      <h4 style="font-weight: bold;">Listado</h4>

          <table id="example" class="table table-striped table-bordered table-hover table-responsive-sm table-responsive-md" style="width:100%">
          <thead>
              <tr>
                <th scope="col">Cargo</th>
                <th scope="col">#Empleado</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nit</th>
                <th scope="col" style="display: none;">Cargo</th>
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
                  <td><?php echo $xRenglon->cargo; ?></td>
                    <td><?php echo $xRenglon->id_Empleado?></td>
                    <td><a style="color: black; text-decoration: none;" href="<?php base_url();?>Historial/index/<?php echo $xRenglon->id_Empleado;?>"><?php echo $xRenglon->nombre;?></a></td>
                    <td><?php echo $xRenglon->nit;?></td>
                    <td style="display: none;"><?php echo $xRenglon->id_cargo;?></td>
                    <td class="text-center">
                      <button type="button" <?=$buttonsStatus?> onclick="datos_empleado('<?php echo $xRenglon->nombre?>',<?=$xRenglon->monto?>,'<?=$xRenglon->monto_letras?>',<?=$xRenglon->id_Empleado?>)" data-toggle="modal" data-target="#imprimir" data-whatever="@mdo" class="btn btn-primary"><i class="fas fa-print"></i></button>
                      <button type="button" <?=$buttonsStatus?> class="btn btn-success EditBTN"><i class="fas fa-user-edit"></i></button>
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
        <div class="row">
      			<div class="col-10">
              <p id="fecha"></p>
      			</div>
      			<div class="col-2">
              <p id="monto"></p>
      			</div>
      	</div>
        <div class="row">
          <div class="col-10">
            <p><strong id="nombre"></strong></p>
          </div>
        </div>
        <div class="row">
          <div class="col-10">
            <p id="monto_letras"></p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color:white;">Cerrar</button>
          <button  onclick="imprimir()" data-dismiss="modal" class="btn btn-primary" name="imprimir" value="Imprimir" style="color:white;">Imprimir</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Fin ventana emergente-->
<!-- inicio del formulario emergente para editar-->
<div class="modal fade" id="editaResidente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form autocomplete="off" id="formResidente">
        <div class="form-row">
          <div class="col-12 mb-3">
               <input type="hidden" id="idRe" name="idRe">
          </div>
          <div class="col-12 mb-3">
               <input class="form-control" type="text" id="nombreRE" name="nombreRE">
          </div>
          <div class="col-12 mb-3">
               <input class="form-control" type="text" id="nitRE" name="nitRE">
          </div>

            <div class="col-12 mb-3">
                <select name="cargoRE" class="custom-select" required id="cargo_residente">
                  <option value="">Cargo</option>
                  <option value="1">Residente I</option>
                  <option value="2">Residente II</option>
                  <option value="3">Residente III</option>
                  <option value="4">Residente IV</option>
                  <option value="5">Residente (Jefe)</option>
                 </select>
            </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color:white;">Cerrar</button>
          <button class='btn btn-primary btnEditar'>Editar</button>
        </div>
        </form>
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
var glob_nombre,glob_monto,glob_monto_Q, glob_fecha, glob_fecha_footer;//variables globales con datos del empleado

$(document).ready(function() {
    var groupColumn = 0;
    tableDT = $('#example').DataTable({
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

    var fila;
    $(document).on("click", ".EditBTN", function(){
      
      fila = $(this).closest("tr");
      id = parseInt(fila.find('td:eq(0)').text());
      nombre = fila.find('td:eq(1)').text();
      nit = fila.find('td:eq(2)').text();
      cargo_id = parseInt(fila.find('td:eq(3)').text());

      $("#idRe").val(id);
      $("#nombreRE").val(nombre);
      $("#nitRE").val(nit);
      $("#cargo_residente").val(cargo_id);
      $("#editaResidente").modal("show");
    });

  $("#formResidente").submit(function(e){
    //e.preventDefault();    
    nombre = $.trim($("#nombreRE").val());
    nit = $.trim($("#nitRE").val());
    cargo = $.trim($("#cargo_residente").val());
    $.ajax({
        url: "<?php echo base_url(); ?>Edit/residente",
        type: "POST",
        dataType: "json",
        data: {nombre:nombre, nit:nit, cargo:cargo, id:id},
        success: function(datos){  
            console.log(datos);
            id = datos[0].id;            
            nombre = datos[0].nombre;
            nit = datos[0].nit;
            cargo = datos[0].cargo;
            tableDT.row(fila).datos([id,nombre,nit,cargo]).draw();           
        }
    });
    $("#editaResidente").modal("hide");
    });
} );

//funcion dar de baja------------------------
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
          //swal.fire(resultado);
          location.reload();
        }else if (status == "0") {
          //swal.fire(resultado);
          location.reload();
        }
    });
  }
//funcion obtener datos del empleado----------------------------
function datos_empleado(nombre,monto,montoEnLetras,id_empleado){
  var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
  var f=new Date();
  var fecha = f.getDate() + " de " + meses[f.getMonth()] +' '+ f.getFullYear();
  var fecha_footer = meses[f.getMonth()] +' '+ f.getFullYear();//obtiene la fecha para imprimirlo
  glob_id_empleado = id_empleado
  glob_nombre = nombre;
  glob_monto = monto;
  glob_monto_Q = montoEnLetras;
  glob_fecha = fecha;
  glob_fecha_footer = fecha_footer;

  $(function(){
    $("#fecha").text('Quetzaltenango, '+ fecha+ '.----');
    $("#monto").text('Q.'+monto);
    $("#nombre").text(nombre);
    $("#monto_letras").text(montoEnLetras);
  });
}
//function imprimir------------------------------
function imprimir(){
    var head = '<div style="margin-left: 114px;margin-bottom: 17px;"><b>NO NEGOCIABLE</b></div>'
    var fecha = '<div style="float:left;margin-bottom: 8px;margin-right: 120px;">Quetzaltenango, '+ glob_fecha +'.----</div>';
    var monto = '<div style="margin-bottom: 8px;">'+glob_monto+'</div>'
    var nombre = '<div style="margin-bottom: 8px;"><b>'+glob_nombre+'</b></div>';
    var monto_letras = '<div style="margin-bottom: 8px;">'+glob_monto_Q+'</div>';
    var footer = '<div style="font-size: 12px;padding-left: 39px;padding-top: 4px;">bono de </div>'
    var footer_2 = '<div style="font-size: 12px;padding-left: 30px;">'+glob_fecha_footer+'</div>'

    var pw = window.open('', '', 'height=400,width=800');
    pw.document.write('<head>' +head+ '</head><body style="margin-left: 150px;margin-top: 50px;">');
    pw.document.write(fecha);
    pw.document.write(monto);
    pw.document.write(nombre);
    pw.document.write(monto_letras);
    pw.document.write(footer);
    pw.document.write(footer_2);
    pw.document.write('</body>');
    console.log('imprimir')
  //  pw.print();
    pw.close();
    //guarda el cheque se recien se imprimio
  var request = $.ajax({
    method: "POST",
    url: "<?=$base_url?>/Main/guardarcheque",
    data: {
      id: glob_id_empleado
    }
  });
  request.done(function(resultado) {
    console.log(resultado)
  });
}
//function seleccionar rango----------------------------
function rango(){
//  debugger
  var desde = $("#rangoDesde").val();
  var desde_int = parseInt(desde,10)
  desde_int += 1;
  //console.log(desde)
  $("#rangoHasta").attr('min',desde_int).attr('value', desde_int).attr('max', desde_int + 8);
}
//funcion imprimir por rangos---------------------------
function imprimirRango(){

}
</script>
