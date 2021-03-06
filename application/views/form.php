<style type="text/css">
  .acepto{
    display: inline-block;
  	width: 20px;
  	height: 20px;
  	margin: -1px 4px 0 0;
  	vertical-align: middle;
  	background: url(<?php echo base_url();?>/assets/image/checkEmpty.png);
  	background-size: cover;
  	cursor: pointer;
  }
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
  @media (max-width: 767px) {
    .pisto{
      text-align: left;
    }
}

/* ------------------ */
.demo input[type="checkbox"] {
	display: none;
}
.demo input[type="checkbox"] + label span {
	display: inline-block;
	width: 20px;
	height: 20px;
	margin: -1px 4px 0 0;
	vertical-align: middle;
	background: url(<?php echo base_url();?>/assets/image/checkEmpty.png);
	background-size: cover;
	cursor: pointer;
}
.demo input[type="checkbox"]:checked + label span {
	background: url(<?php echo base_url();?>/assets/image/checkFill.png);
	background-size: cover;
}
</style>
<br><br>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php if ($numeral == 4  ) {?>
        <h4 style="font-weight: bold;">Fecha de impresión</h4>
        <form class="form-inline">
          <input class="form-control col-2 mr-3" type="date" id="date-input" onchange="dates()">
        </form>
        <hr class="my-4">
      <?php    } ?>

      <?php if ($numeral == 3  ) {?>
        <h4 style="font-weight: bold">Filtrar por..</h4>
        <form id="impresion_lote_form" method="POST" action="<?php echo base_url();?>Main/listarImpresion" autocomplete="off">


        <div class="form-row">
          <div class="col-md-2 mb-3">
            <select id="combo_cargo" name="listarCargo" class="custom-select" required>
              <option value="">Cargo</option>
              <option value="1">Residente I</option>
              <option value="2">Residente II</option>
              <option value="3">Residente III</option>
              <option value="4">Residente IV</option>
              <option value="5">Residente EPS</option>
             </select>
          </div>
          <!-- <div class="col-md-2">
            <input class="btn btn-primary hvr-icon-fade"  role="button" type="submit" name="imprimir" value="imprimir">
          </div> -->
        </form>

        <div class="col-md-12">
        <hr class="my-4">
                <h4 style="font-weight: bold;">Fecha de impresión</h4>
        <form class="form-inline">
          <input class="form-control col-2 mr-3" type="date" id="date-input" onchange="dates()">
        </form>
        <br>
      <?php    } ?>
      <div class="row">
        <div class="col-9">
          <h4 style="font-weight: bold;">Listado</h4>
        </div>
        <div class="col-3">
          <!--btn para imprimir por lote-->
          <?php if ($numeral == 4 and !empty($empleados)): ?>
              <button style="float: right;" onclick="imprimirLote()" class="btn btn-primary hvr-icon-fade pisto">Imprimir</button>
              <button style="float: right;" onclick="nomina('<?php echo $listar?>')" class="btn btn-outline-success pisto mr-3">Nomina PDF</button>
          <?php endif; ?>
          <!--Fin-->
        </div>
      </div><br>
      <?php if ($numeral == 4) {?>
        <a style="text-decoration: none;" href="javascript:seleccionar_todo()">Marcar todos</a> |
        <a style="text-decoration: none;" href="javascript:deseleccionar_todo()">Desmarcar</a>
      <?php } ?>

      <form name="checkboxForm" action="<?php echo base_url();?>XLote/boxCheques" method="post">
          <table id="example" class="table table-striped table-bordered table-hover table-responsive-sm table-responsive-md" style="width:100%">
          <thead>
              <tr>
                <th scope="col">Cargo</th>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nit</th>
                <th scope="col" style="display: none;">Cargo</th>
                <?php if (($numeral == 3) || ($numeral == 8)) {?>
                  <th scope="col" style="text-align: center;">Opciones</th>
                <?php } ?>
              </tr>
          </thead>
          <tbody>
            <?php  if(!empty($empleados)):?>

          <?php $cont = 1; //contador para el correlativo
              foreach($empleados as $xRenglon):?>
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
                <tr id="fila<?=$xRenglon->id_Empleado?>"><!--concatena para tener filas unicas-->
                    <td><?php echo $xRenglon->cargo; ?></td>
                    <td class="text-center">
                      <?php if ($numeral == 4) {?>
                        <div class="demo">
                            <input type="checkbox" id="acepto<?=$xRenglon->id_Empleado?>" name="acepto" value="<?=$xRenglon->id_Empleado?>">
                            <label for="acepto<?=$xRenglon->id_Empleado?>"><span></span></label>
                        </div>
                      <?php }else {?>
                          <?php echo "   ".$cont?>
                          <input type="hidden" name="" value="<?=$xRenglon->id_Empleado?>">
                    <?php  }?>
                    </td>
                    <input type="hidden" id="status<?=$xRenglon->id_Empleado?>" value="<?=$xRenglon->status?>">
                    <td><?php echo $xRenglon->nombre;?></td>
                    <td><?php echo $xRenglon->nit;?></td>
                    <td style="display: none;"><?php echo $xRenglon->id_cargo;?></td>
                    <?php if (($numeral == 3) || ($numeral == 8)) {?>
                    <td class="text-center">
                      <button title="Imprimr" type="button" <?=$buttonsStatus?> onclick="datos_empleado('<?php echo $xRenglon->nombre?>',<?=$xRenglon->monto?>,'<?=$xRenglon->monto_letras?>',<?=$xRenglon->id_Empleado?>)" data-toggle="modal" data-target="#imprimir" data-whatever="@mdo" class="btn btn-primary"><i class="fas fa-print"></i></button>
                      <button title="Editar" type="button" <?=$buttonsStatus?> class="btn btn-success EditBTN"><i class="fas fa-user-edit"></i></button>
                      <button title="Dar de baja" id="baja" type="button" <?=$classButton?>>
                        <i id="icon" <?=$classIcon?>></i>
                      </button>
                    </td>
                  <?php };?>
                </tr>
              <?php $cont++; endforeach;?>
          <?php  endif;?>

          </tbody>
        </table>
      </form>

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
            <div class="col-9">
              <p id="fecha"></p>
            </div>
            <div style="text-align: right" class="col-3">
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

        <form autocomplete="off" id="formResidenteEdit" method="POST" action="<?php echo base_url();?>Edit/residente">
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
        </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color:white;">Cerrar</button>
          <button type="button" class='btn btn-primary btnEditar'>Editar</button>
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
var input_date, glob_nombre,glob_monto,glob_monto_Q, glob_fecha, glob_fecha_footer;//variables globales con datos del empleado

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
      id = parseInt(fila.find('input:eq(0)').val());
      nombre = fila.find('td:eq(1)').text();
      nit = fila.find('td:eq(2)').text();
      cargo_id = parseInt(fila.find('td:eq(3)').text());
      $("#idRe").val(id);
      $("#nombreRE").val(nombre);
      $("#nitRE").val(nit);
      $("#cargo_residente").val(cargo_id);
      $("#filaRE").val(fila);
      $("#editaResidente").modal("show");
    });
  });
//funcion editar-------------------------------
$(document).on("click", ".btnEditar", function(){
    var idRe = parseInt($("#idRe").val())
    var nombre = $("#nombreRE").val()
    var nit = $("#nitRE").val()
    var id_cargo = $("#cargo_residente").val()
    var fila = $("#fila"+idRe).closest("tr");
    var cargo_id_table = parseInt(fila.find('td:eq(3)').text());//variable que servirá para comparar si hubo cambio en cargo

    var request = $.ajax({
      method: "POST",
      url: "<?php echo base_url();?>Edit/residente",
      data: {
        idRe: idRe,
        nombreRE: nombre,
        nitRE: nit,
        cargoRE: id_cargo
      }
    });
    request.done(function(resultado) {
      if (resultado == "1") {
        if (id_cargo == cargo_id_table) {
          Swal.fire(
            'Excelente!',
            '¡Los datos fueron editados exitosamente!',
            'success'
          )
          fila.find('td:eq(2)').text(nit)
          fila.find('td:eq(1)').text(nombre)
          $("#editaResidente").modal("hide");
          $('#fila'+idRe).addClass('alert alert-primary')
          $(setTimeout(function(){$('#fila'+idRe).removeClass('alert alert-primary')},7000))
        }else {
          location.reload();
        }
      }else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Ha ocurrido un error!'
        })
      }
    });
});

  //funcion dar de baja------------------------
    var fila;
    $(document).on("click", "#baja", function(){
        fila = $(this);
        id = parseInt($(this).closest("tr").find('input:eq(0)').val());
      Swal.fire({
        title: '¿Realizar cambio?',
        text: "Puede revertir esta acción posteriormente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Aceptar'
      }).then((result) => {
      if (result.value) {
        var status = $("#status"+id).val()
        var request = $.ajax({
          method: "POST",
          url: "<?=$base_url?>/Main/cambiarStatus",
          data: {
            id: id,
            status: status
          }
        });
        request.done(function(resultado) {
          //$("#fila"+id).remove();
          window.location.reload(true); 
        });
        /*Swal.fire(
          'Hecho!',
          'El cambio ha sido realizado.',
          'success'
        )*/
      }
    })
    });

    //funcion obtener datos del empleado----------------------------
function datos_empleado(nombre,monto,montoEnLetras,id_empleado){
  var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
  var input_date=new Date($('#date-input').val());
  var dia = input_date.getUTCDate();
  var fecha = dia + " de " + meses[input_date.getUTCMonth()] +' '+ input_date.getUTCFullYear();
  var mes_foter = input_date.getUTCMonth()  //obtiene el mes para luego restarlo
  // mes_foter == 0 ? mes_foter = 11 : mes_foter= mes_foter - 1;//operacion terniaria para el mes de Diciembre
  var fecha_footer = meses[mes_foter] +' '+ input_date.getUTCFullYear();//obtiene la fecha para imprimirlo
  var monto_decimal = monto.toFixed(2);
  glob_id_empleado = id_empleado
  glob_nombre = nombre;
  glob_monto = monto_decimal;
  glob_monto_Q = montoEnLetras;
  glob_fecha = fecha;
  glob_fecha_footer = fecha_footer;

  $(function(){
    $("#fecha").text('Quetzaltenango, '+ fecha+ '.----');
    $("#monto").text('Q.'+monto_decimal);
    $("#nombre").text(nombre);
    $("#monto_letras").text(montoEnLetras);
  });
}
//function imprimir------------------------------
    function imprimir(){
    var head = '<div style="margin-left: 114px;margin-bottom: 17px;"><b>NO NEGOCIABLE</b></div>'
    var fecha = '<div style="float:left;margin-bottom: 7px;margin-right: 160px;">Quetzaltenango, '+ glob_fecha +'.----</div>';
    var monto = '<div style="margin-bottom: 7px;">'+glob_monto+'</div>'
    var nombre = '<div style="margin-bottom: 8px;"><b>'+glob_nombre+'</b></div>';
    var monto_letras = '<div style="margin-bottom: 8px;">'+glob_monto_Q+'</div>';
    var footer = '<div style="font-size: 12px;padding-left: 52px;padding-top: 10px;">bono de </div>'
    var footer_2 = '<div style="font-size: 12px;padding-left: 42px;margin-top: -2px;">'+glob_fecha_footer+'</div>'

    var pw = window.open('', '', 'height=400,width=800');
    pw.document.write('<head>' +head+ '</head><body style="margin-left: 170px;margin-top: 27px;">');
    pw.document.write(fecha);
    pw.document.write(monto);
    pw.document.write(nombre);
    pw.document.write(monto_letras);
    pw.document.write(footer);
    pw.document.write(footer_2);
    pw.document.write('</body>');
    console.log('imprimir')
    pw.print();
    pw.close();
    //guarda el cheque se recien se imprimio
  var request = $.ajax({
    method: "POST",
    url: "<?=$base_url?>/Main/guardarcheque",
    data: {
      id: glob_id_empleado,
      monto: glob_monto,
      monto_letras: glob_monto_Q
    }
  });
  request.done(function(resultado) {
    console.log(resultado)
  });
}
//function seleccionar rango----------------------------
function rango(){
  var desde = $("#rangoDesde").val();
  var desde_int = parseInt(desde,10)
  desde_int += 1;
  $("#rangoHasta").attr('min',desde_int).attr('value', desde_int).attr('max', desde_int + 8);
}
//funcion imprimir por rangos---------------------------
<?php //serializar elementos para utilñizarlos en javascript
 $nombre = array();
 $monto = array();
 $monto_letras = array();
 $id_empleado = array();

 foreach ($empleados as $key) {
  $nombre[] = $key->nombre;
  $monto[] = $key->monto;
  $monto_letras[] = $key->monto_letras;
  $id_empleado[] = $key->id_Empleado;
 }

 $nombreJson = json_encode($nombre);
 $montoJson = json_encode($monto);
 $monto_letrasJson = json_encode($monto_letras);
 $id_empleadoJson = json_encode($id_empleado);
 ?>
function imprimirLote(){

  var nombreJS=<?php echo $nombreJson;?>;
  var montoJS=<?php echo $montoJson;?>;
  var monto_letrasJS=<?php echo $monto_letrasJson;?>;
  var id_empleadoJS=<?php echo $id_empleadoJson;?>;

  var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
  var input_date=new Date($('#date-input').val());
  var dia = input_date.getUTCDate();
  var mes_foter = input_date.getUTCMonth()  //obtiene el mes para luego restarlo
  //mes_foter == 0 ? mes_foter = 11 : mes_foter= mes_foter - 1;//operacion terniaria para el mes de Diciembre
  var fecha = dia + " de " + meses[mes_foter] +' '+ input_date.getUTCFullYear();
  var fecha_footer = meses[mes_foter] +' '+ input_date.getUTCFullYear();//obtiene la fecha para imprimirlo en la Ref: en la parte inferior izquierda
  var head = '<div style="margin-left: 114px;margin-bottom: 17px;"><b>NO NEGOCIABLE</b></div>'
  var fecha = '<div style="float:left;margin-bottom: 7px;margin-right: 160px;">Quetzaltenango, '+ fecha +'.----</div>';
  var footer = '<div style="font-size: 12px;padding-left: 52px;padding-top: 10px;">bono de </div>'


  for(var i=0;i<nombreJS.length;i++)
  {

    var fila = $("#fila"+id_empleadoJS[i]).closest("tr");//obtiene la fila que empezará a imprimir
    var Verif_checkbox = fila.find('input:eq(0)').prop('checked')

    if (Verif_checkbox) {
      var monto = parseInt(montoJS[i]);
      var monto_decimal = monto.toFixed(2);
      var monto = '<div style="margin-bottom: 8px;">'+monto_decimal+'</div>'
      var nombre = '<div style="margin-bottom: 8px;"><b>'+nombreJS[i]+'</b></div>';
      var monto_letras = '<div style="margin-bottom: 8px;">'+monto_letrasJS[i]+'</div>';
      var footer_2 = '<div style="font-size: 12px;padding-left: 42px;margin-top: -2px;">'+fecha_footer+'</div>'

      var pw = window.open('', '', 'height=400,width=800');
      pw.document.write('<head>' +head+ '</head><body style="margin-left: 170px;margin-top: 27px;">');
      pw.document.write(fecha);
      pw.document.write(monto);
      pw.document.write(nombre);
      pw.document.write(monto_letras);
      pw.document.write(footer);
      pw.document.write(footer_2);
      pw.document.write('</body>');
      console.log('imprimir')
      pw.print();
      pw.close();
      //guarda el cheque se recien se imprimio
      var request = $.ajax({
        method: "POST",
        url: "<?=$base_url?>/Main/guardarcheque",
        data: {
          id: id_empleadoJS[i],
          monto: monto_decimal,
          monto_letras:monto_letrasJS[i]
        }
      });
      request.done(function(resultado) {
        console.log(resultado)
      });
    }else {
      console.log('no se imprimió')
    }
  }
}
//-----------funciones para seleccionar checkbox
  function seleccionar_todo(){
     for (i=0;i<document.checkboxForm.elements.length;i++)
        if(document.checkboxForm.elements[i].type == "checkbox")
           document.checkboxForm.elements[i].checked=1
  }
  function deseleccionar_todo(){
     for (i=0;i<document.checkboxForm.elements.length;i++)
        if(document.checkboxForm.elements[i].type == "checkbox")
           document.checkboxForm.elements[i].checked=0
  }

//-----------submit form onchange
  $("#combo_cargo").change(function() {
       this.form.submit();
  });

function nomina(nomina){
  var nomina = nomina;
  window.open('<?=$base_url?>Nomina/pdf/'+nomina);
}
</script>
