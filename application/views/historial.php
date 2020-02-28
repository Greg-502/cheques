<br><br>
<div class="container">
  <div class="row">
    <?php
      if (!$historia) {
        ?>
          <div class="col-12">
            <h4 style="font-weight: bold; color: gray;">Nada que mostrar</h4>
            <br>
          </div>
        <?php
      } else {
        ?>
          <div class="col-12">
            <h4 style="font-weight: bold">Historial</h4>
            <hr class="my-4">
          </div>
        <?php
        foreach ($historia as $key) {
          $fecha = new DateTime($key->fecha);
          ?>
            <div class="col-12">      
              <small class="text-primary">Quetzaltenango <?php echo $fecha->format('d-m-Y H:m:s')?></small>
              <p><?php echo $key->nombre?></p>
              <p style="margin-top: -15px"><?php echo "Q ".$key->monto." - ".$key->monto_letras; ?></p>
              <hr class="my-4">
            </div>
          <?php
        }
      }
    ?>
  </div>
</div>
</body>
</html>