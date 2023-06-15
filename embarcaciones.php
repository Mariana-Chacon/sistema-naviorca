<?php
include "./cabeceraadmin.php";
include "./sidebar.php";
include "config/conexion.php"
?>

<div class="cards">
    <div class="card-items">
      <img src="assets/images/aramaya.jpeg" alt="grand canyon" class="img-embarcacion">

      <div class="content">
      <?php
            $sql = "SELECT * from embarcaciones";
            $embarcaciones = $conexion->query($sql);

            $embarcacionesResult = $embarcaciones->fetchAll(PDO::FETCH_ASSOC);

            foreach ($embarcacionesResult as $embarcacionesData) {
            ?>
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
            <div class="card-items">
      <img src="assets/images/aramaya.jpeg" alt="grand canyon" class="img-embarcacion">

      <div class="content">
      <?php
            $sql = "SELECT * from embarcaciones";
            $embarcaciones = $conexion->query($sql);

            $embarcacionesResult = $embarcaciones->fetchAll(PDO::FETCH_ASSOC);

            foreach ($embarcacionesResult as $embarcacionesData) {
            ?>
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
            <div class="card-items">
      <img src="assets/images/aramaya.jpeg" alt="grand canyon" class="img-embarcacion">

      <div class="content">
      <?php
            $sql = "SELECT * from embarcaciones";
            $embarcaciones = $conexion->query($sql);

            $embarcacionesResult = $embarcaciones->fetchAll(PDO::FETCH_ASSOC);

            foreach ($embarcacionesResult as $embarcacionesData) {
            ?>
              <h2 class="card-title"><?php echo $embarcacionesData['nombre']; ?></h2>
        
            <p>Matricula: <?php echo $embarcacionesData['matricula_id']; ?></p>
            <p>Tipo: <?php echo $embarcacionesData['tipo']; ?></p>
            <p>Fecha de construccion: <?php echo $embarcacionesData['fecha_construccion']; ?></p>
            <button onclick="window.open('assets/fichas/ficha aramaya.pdf', '_blank')">Ver ficha comercial </button> 
      </div>
    </div>
            <?php
            }
            ?> 
            <div class="card-items">
      <img src="assets/images/aramaya.jpeg" alt="grand canyon" class="img-embarcacion">

      <div class="content">
      <?php
            $sql = "SELECT * from embarcaciones";
            $embarcaciones = $conexion->query($sql);

            $embarcacionesResult = $embarcaciones->fetchAll(PDO::FETCH_ASSOC);

            foreach ($embarcacionesResult as $embarcacionesData) {
            ?>
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
            <div class="card-items">
      <img src="assets/images/aramaya.jpeg" alt="grand canyon" class="img-embarcacion">

      <div class="content">
      <?php
            $sql = "SELECT * from embarcaciones";
            $embarcaciones = $conexion->query($sql);

            $embarcacionesResult = $embarcaciones->fetchAll(PDO::FETCH_ASSOC);

            foreach ($embarcacionesResult as $embarcacionesData) {
            ?>
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
            <div class="card-items">
      <img src="assets/images/aramaya.jpeg" alt="grand canyon" class="img-embarcacion">

      <div class="content">
      <?php
            $sql = "SELECT * from embarcaciones";
            $embarcaciones = $conexion->query($sql);

            $embarcacionesResult = $embarcaciones->fetchAll(PDO::FETCH_ASSOC);

            foreach ($embarcacionesResult as $embarcacionesData) {
            ?>
              <h2 class="card-title"><?php echo $embarcacionesData['nombre']; ?></h2>
        
            <p>- Matricula: <?php echo $embarcacionesData['matricula_id']; ?></p>
            <p>- Tipo: <?php echo $embarcacionesData['tipo']; ?></p>
            <p>-Fecha de construccion: <?php echo $embarcacionesData['fecha_construccion']; ?></p>
            <button onclick="window.open('assets/fichas/ficha aramaya.pdf', '_blank')">Ver ficha comercial </button> 
      </div>
    </div>
            <?php
            }
            ?> 
</div>
<br>
 

	<div class="container">
		<div class="row">
			<div class="col-sm-6 text-left">
        <a href=""><button class="btn btn-primary mr-auto"><img width="30" height="30" src="https://img.icons8.com/color/30/pdf-2--v1.png" alt="pdf-2--v1"/>Generar reporte</button></a>	
			</div>
			<div class="col-sm-6 text-right">
      <a href=""><button class="btn btn-primary mr-auto"><img width="30" height="30" src="https://img.icons8.com/color/30/add--v1.png" alt="add--v1"/>Añadir equipo</button></a>	
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
    </tr>
  </thead>
  <tbody>
            <?php
            $sql = "SELECT * from equipos";
            $equipos = $conexion->query($sql);

            $equiposResult = $equipos->fetchAll(PDO::FETCH_ASSOC);

            foreach ($equiposResult as $equiposData)
            
            {
            ?>
                <tr>
                <td><?php echo $equiposData['equipo_id']; ?></td>
                    <td><?php echo $equiposData['tipo_equipo_id']; ?></td>
                    <td><?php echo $equiposData['marca']; ?></td>
                    <td><?php echo $equiposData['modelo']; ?></td>
                    <td><?php echo $equiposData['serial']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>




