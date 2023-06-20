<?php
include "./cabeceraadmin.php";
include "./sidebar.php";
include "./config/conexion.php"
?>
<h2>EMBARCACIONES</h2>
<div class="cards">
  <?php
  $sql = "SELECT * from embarcaciones";
  $embarcaciones = $conexion->query($sql);

  $embarcacionesResult = $embarcaciones->fetchAll(PDO::FETCH_ASSOC);

  foreach ($embarcacionesResult as $embarcacionesData) {
  ?>
    <div class="card-items">
    <img class="img-embarcacion" height='100px' src='<?=$row["product_image"]?>'>
      
      <div class="content">

        <h2 class="card-title"><?php echo $embarcacionesData['nombre']; ?></h2>

        <p>- Matricula: <?php echo $embarcacionesData['matricula_id']; ?></p>
        <p>- Tipo: <?php echo $embarcacionesData['tipo']; ?></p>
        <p>- Fecha de construccion: <?php echo $embarcacionesData['fecha_construccion']; ?></p>
        <button onclick="window.open('assets/fichas/ficha aramaya.pdf', '_blank')">Ver ficha comercial </button>
      </div>
    </div>
    
  <?php
  }
  ?>
</div>

<div class="container">
  <h2>EQUIPOS <br> <small>(motogeneradores y maquina principal)</small></h2>
  <br> <br> <br>
  <div class="row">
    <div class="col-sm-6 text-left">
      <a href="fpdf/reporte_ordenes.php" target="_blank"><button class="btn btn-primary mr-auto"><img width="30" height="30" src="https://img.icons8.com/color/30/pdf-2--v1.png" alt="pdf-2--v1" />Exportar PDF</button></a>
    </div>
    <div class="col-sm-6 text-right">
      <a href="agregar_equipo.php"><button class="btn btn-warning mr-auto"><img width="30" height="30" src="https://img.icons8.com/color/30/add--v1.png" alt="add--v1" />Añadir equipo</button></a>
    </div>
  </div>
</div>
<table>
  <thead>
    <tr>
      <th> Id</th>
      <th> Tipo de equipo</th>
      <th> Marca</th>
      <th> Modelo</th>
      <th> Serial</th>
      <th> Imagen</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * from equipos";
    $equipos = $conexion->query($sql);

    $equiposResult = $equipos->fetchAll(PDO::FETCH_ASSOC);

    foreach ($equiposResult as $equiposData) {
    ?>
      <tr>
        <td><?php echo $equiposData['equipo_id']; ?></td>
        <td><?php echo $equiposData['tipo_equipo_id']; ?></td>
        <td><?php echo $equiposData['marca']; ?></td>
        <td><?php echo $equiposData['modelo']; ?></td>
        <td><?php echo $equiposData['serial']; ?></td>
        <td><?php echo $equiposData['serial']; ?></td>
        <td>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary edit-orden-modal" data-toggle="modal" data-target="#exampleModal">Editar</button>
          <br><br>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop"><img width="30" height="30" src="https://img.icons8.com/color/30/delete.png" alt="delete" /></button>
        <?php
      }
        ?>
  </tbody>
</table>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link">Anterior</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Siguiente</a>
    </li>
  </ul>
</nav>
<!-- Modal Editar-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      Editar información de equipo

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" >
          <div class="card-formulario">
            <div class="card-body">
              <div class="form-group">
                <label>Editar marca:</label>
                <input type="text" class="form-control" placeholder="Marca">
              </div>
              <div class="form-row">
                <div class="col">
                  <label>Editar modelo:</label>
                  <input type="text" class="form-control" placeholder="Modelo">
                </div>
                <div class="col">
                  <label>Editar serial:</label>
                  <input type="text" class="form-control" placeholder="Serial">
                </div>
              </div>
              <br>
              <div class="form-group">
  <input type="file" class="form-control-file" id="archivo" style="color:white;">
</div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>
<!---Modal Eliminar---->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Eliminar personal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de que deseas eliminar este equipo?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Atrás</button>
        <button type="button" class="btn btn-primary">Si</button>
      </div>
    </div>
  </div>
</div>