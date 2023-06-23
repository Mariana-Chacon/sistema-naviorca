<?php
include "./cabeceraadmin.php";
include "./sidebar.php";
include "./config/conexion.php"
?> 
<h2>CONFIGURACIONES</h2>
<br>
<div class="container">
  <h2>Configuraciones de cuenta</h2>
  <form method="post">
    <div class="form-group">
      <label for="nombre">Nombre:</label>
      <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
    </div>
    <div class="form-group">
      <label for="email">Correo electrónico:</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="form-group">
      <label for="password">Contraseña:</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Guardar cambios</button>
  </form>
</div>