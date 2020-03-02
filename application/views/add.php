<script type="text/javascript">
  function mayus(e) {
    e.value = e.value.toUpperCase();
}
</script>

<?php
  $y = 1;
?>

<br><br>
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <small>Añadir</small>
        <h4 style="font-weight: bold">Residentes</h4>
      </div>
    </div>
    <form method="POST" action="<?php echo base_url();?>Add/residente" autocomplete="off">
      <div class="form-row">
        <div class="col-md-3 mb-3">
                <select id="depto" name="cargo" class="custom-select" required>
                  <option value="">Cargo</option>
                  <?php
                  foreach($montos as $row)
                  {
                   echo '<option value="'.$row->id_cargo.'">'.$row->cargo.'</option>';
                  }
                  ?>
                 </select>
            </div>
          <div class="col-md-3 mb-3">
               <input class="form-control" type="text" placeholder="NIT" name="nit" required onkeyup="mayus(this);">
          </div>
          <div class="col-md-4 mb-3">
               <input class="form-control" type="text" placeholder="Nombres y Apellidos" name="nombres" required>
          </div>
      </div>
      <div class="row col-2 mb-3">
              <button type="submit" class="btn btn-primary hvr-icon-fade">Guardar</button>
          </div>
	</form>
	<br>

	<hr class="my-3">

	<br>

	<div class="row">
      <div class="col-md-12">
        <small>Actualizar</small>
        <h4 style="font-weight: bold">Bonos</h4>
      </div>
    </div>
    <form method="POST" action="<?php echo base_url();?>Add/monto" autocomplete="off">
      <div class="form-row">
        <div class="col-md-3 mb-3">
                <select id="cargo" name="cargo" class="custom-select" required>
                  <option value="">Cargo</option>
                  <?php
                  foreach($montos as $row)
                  {
                   echo '<option value="'.$row->id_cargo.'">'.$row->cargo.'</option>';
                  }
                  ?>
                 </select>
            </div>

          <div id="cantidad" class="col-md-3 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupPrepend2">Q</span>
                    </div>
                    <input id="monto" name="monto" type="text" class="form-control" placeholder="Monto" aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

          <div class="col-md-4 mb-3">
            <input id="inLetras" class="form-control" type="text" placeholder="En letras" name="letras" required>
        </div>
      </div>
      <div class="row col-md-1 mb-3">
            <button type="submit" class="btn btn-primary hvr-icon-fade">Guardar</button>
       </div>
	</form>
</div>

<script>
$(document).ready(function(){
  $("#monto").on({
    "focus": function(event) {
      $(event.target).select();
    },
    "keyup": function(event) {
      $(event.target).val(function(index, value) {
        return value.replace(/\D/g, "")
          .replace(/([0-9])([0-9]{2})$/, '$1.$2');
      });
    }
  });

  $('#cargo').change(function(){
    var cargo_re = $('#cargo').val();
    if(cargo_re != ''){
      $.ajax({
        url:"<?php echo base_url(); ?>Add/fetch",
        method:"POST",
        data:{cargo_re:cargo_re},
        success:function(data)
      {
        $("#monto").val(data);
      }
     });
    } else {
      $("#monto").val("Monto");
    }
  });

  $('#cargo').change(function(){
    var cargo_re = $('#cargo').val();
    if(cargo_re != ''){
      $.ajax({
        url:"<?php echo base_url(); ?>Add/fetch_le",
        method:"POST",
        data:{cargo_re:cargo_re},
        success:function(data)
      {
        $("#inLetras").val(data);
      }
     });
    } else {
      $("#inLetras").val("En letras");
    }
  });
});
</script>
