<?php
include "./cabeceraadmin.php";
include "./sidebar.php";
include "./config/conexion.php"
?>

<form method="post" enctype="multipart/form-data" class="text-center">
  <div class="col-md-5 mx-auto">
    <div class="card-formulario" style="height: 300px;">
      <div class="card-header">
       AGREGAR UN NUEVO PERSONAL
      </div>
      <div class="card-body">
        <div class="form-row">
          <div class="form-group  ">
            <div class="form-group">
              <label>ID</label>
              <input type="text" class="form-control" name="equipo_id" id="equipo_id" placeholder="ID....">
            </div>
          </div>
         
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">Nombre</label>
              <input type="text" class="form-control" name="marca" id="marca">
            </div>
            
            <div class="form-group col-md-6">
            <label for="selectMantenimiento">Cargo</label>
            <select class="form-control" name="selectTipoEquipo" id="selectTipoEquipo">
              <option>Selecciona una opcion</option>
              <?php
              foreach ($tipoEquipoResult as $tipoEquipoData) {
              ?>
                <option value=<?php echo $tipoEquipoData["id"] ?>><?php echo $tipoEquipoData["nombre"] ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="btn-group" role="group" aria-label="">
    <button type="submit" class="btn btn-success">Agregar</button>
    <a href="personal.php"><button type="button" class="btn btn-info">Volver</button></a>
  </div>
</form>