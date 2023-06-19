<?php
include "./cabeceraadmin.php";
include "./sidebar.php";
include "./config/conexion.php"
?>
<form method="post" enctype="multipart/form-data" class="text-center">
  <div class="col-md-5 mx-auto">
    <div class="card-formulario">
      <div class="card-header">
        AÑADIR UN NUEVO EQUIPO
      </div>
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6">
                <div class="form-group">
                <label>ID equipo:</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="equipo">
                </div>
              </div>
              <div class="form-group col-md-6">
            <label for="selectMantenimiento">Tipo de equipo</label>
            <select class="form-control" name="selectMantenimiento" id="selectEquipo">
            <option>Selecciona una opcion</option>
              <?php
              foreach ($tipoMantenimientoResult as $tipoMantenimientoData) {
              ?>
                <option value=<?php echo $tipoMantenimientoData["id"] ?>><?php echo $tipoMantenimientoData["nombre"] ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Marca</label>
      <input type="text" class="form-control" id="marca">
    </div>
    <div class="form-group col-md-4">
      <label>Modelo</label>
      <input type="text" class="form-control" placeholder="modelo">
    </div>
    <div class="form-group col-md-2">
      <label>Serial</label>
      <input type="text" class="form-control" id="serial">
    </div>
  </div>
      </div>
    </div>
    <div class="form-group">
  <input type="file" class="form-control-file" id="archivo" style="color:white;">
</div>
            </div>
          </div>
          <div class="btn-group" role="group" aria-label="">
          <button type="submit" class="btn btn-success">Agregar</button>
          <a href="embarcaciones.php"><button type="button" class="btn btn-info">Volver</button></a>
        </div>    
</form>