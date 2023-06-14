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
        
            <p>Matricula: <?php echo $embarcacionesData['matricula_id']; ?></p>
            <p>Tipo: <?php echo $embarcacionesData['tipo']; ?></p>
            <p>Fecha de construccion: <?php echo $embarcacionesData['fecha_construccion']; ?></p>
        <button class="button">Ver ficha comercial<?php echo $embarcacionesData['ficha_comercial']; ?></button>
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
        <button class="button">Ver ficha comercial<?php echo $embarcacionesData['ficha_comercial']; ?></button>
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
        <button class="button">Ver ficha comercial<?php echo $embarcacionesData['ficha_comercial']; ?></button>
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
        <button class="button">Ver ficha comercial<?php echo $embarcacionesData['ficha_comercial']; ?></button>
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
        <button class="button">Ver ficha comercial<?php echo $embarcacionesData['ficha_comercial']; ?></button>
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
        <button class="button">Ver ficha comercial<?php echo $embarcacionesData['ficha_comercial']; ?></button>
      </div>
    </div>
            <?php
            }
            ?> 
</div>
  <style>
  
 

  .cards {
    display: flex;
    flex-wrap: wrap;
	justify-content: center;
	flex-direction:  row;
	margin:5em;
  }
  .card-items {
    background: white;
    transition: 0.3s ease;
    background-color: white;
    border-radius: 0.25rem;
    box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
    width: 300px;
    height: 80vh;
  }

  .img-embarcacion {
    width: 300px;
    height: 300px;
  }
  
  .card-items .content h2 {
    font-size: 20px;
    padding-left: 10px;
  }
  .card-items .content p {
    padding-left: 10px;
    margin-left: 10px;
    font-size: 15px;
  }

  .card-items .content button {
    padding:  5px;
    background: rgba(138, 200, 255, 0.749);
    font-family: 'Poppins', sans-serif;
    color: #6893ff;
    font-size: 16px;
    border: none;
    outline: none;
    cursor: pointer;
    transition: 0.3s ease;
    border-radius: 5px;
    margin-left: 60px;

  }

  .card-items .content .button {
    text-align: center;
    padding-bottom: 10px;
  }

  .card-items .content button:hover {
    color: white;
    background: red;
     
  } 
</style>
<br>

    <a href="formato_orden.php"><button type="button" class="btn btn-warning">Nuevo equipos</button></a>
    <br> <br>
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




