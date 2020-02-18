<br><br>
<div class="container">

  <div class="row">
    <div class="col-md-12 d-flex justify-content-center">
      <h4 style="font-weight: bold"></h4>
    </div>
  </div>

    <form method="GET" action="<?php echo base_url();?>Formulario/search" autocomplete="off">
      <div class="form-row d-flex justify-content-center">
          <div class="col-md-3 mb-3">
            <input id="monto" name="dpi" type="text" class="form-control" placeholder="Buscar empleado" aria-describedby="inputGroupPrepend2" required minlength="13">
          </div>

          <div class="col-md-1 mb-3">
          <button type="submit" class="btn btn-primary hvr-icon-fade">Buscar</button>
        </div>
      </div>
    </form>
</div>
            