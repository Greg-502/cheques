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
              <p class="text-primary">Quetzaltenango <?php echo $fecha->format('d-m-Y H:i:s')?></p>
              <p style="margin-top: -15px;"><?php echo $key->nombre?></p>
              <p style="margin-top: -15px"><?php echo "Q ".$key->monto." - ".$key->monto_letras; ?></p>
              <p style="margin-top: -15px; font-weight: bold">Pagado por: <?php echo $key->admin?></p>
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
