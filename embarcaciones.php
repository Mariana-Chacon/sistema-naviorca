<?php
include "./cabeceraadmin.php";
include "./sidebar.php";
include "config/conexion.php"
?>


<div class="col-md-7">
    <a href="formato_orden.php"><button type="button" class="btn btn-warning">Nuevo equipos</button></a>
    <br> <br>
    <table class="table table-border">
        <thead>
            <tr>
                <th> Matricula</th>
                <th> Nombre</th>
                <th> Tipo</th>
                <th> Fecha de construccion</th>
                <th> Ficha comercial</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * from embarcaciones";
            $embarcaciones = $conexion->query($sql);

            $embarcacionesResult = $embarcaciones->fetchAll(PDO::FETCH_ASSOC);

            foreach ($embarcacionesResult as $embarcacionesData) {
            ?>
                <tr>
                    <td><?php echo $embarcacionesData['matricula_id']; ?></td>
                    <td><?php echo $embarcacionesData['nombre']; ?></td>
                    <td><?php echo $embarcacionesData['tipo']; ?></td>
                    <td><?php echo $embarcacionesData['fecha_construccion']; ?></td>
                    <td><?php echo $embarcacionesData['ficha_comercial']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>