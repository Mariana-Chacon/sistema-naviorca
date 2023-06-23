<?php
include "./cabeceraadmin.php";
include "./sidebar.php";
include "./config/conexion.php"
?> 
<h2>CONFIGURACIONES</h2>
<br>
<h3>Usuarios</h3>
<div class="container">
    <a href="agregar_usuario.php" class="btn btn-warning"><img width="30" height="30" src="https://img.icons8.com/color/30/add--v1.png" alt="add--v1" />Agregar</a>
</div>
<main class="table_personal">
    <section class="table__header">
    </section>
    <section class="table__body">
        <table>
            <thead>
                <tr>
                    <th> Nombre</th>
                    <th> Usuario</th>
                    <th> Contraseña</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * from personal";
                $personal = $conexion->query($sql);

                $personalResult = $personal->fetchAll(PDO::FETCH_ASSOC);

                foreach ($personalResult as $personalData) {
                ?>
                    <tr>
                        <td><?php echo $personalData['nombre']; ?></td>
                        <td><?php echo $personalData['usuario']; ?></td>
                        <td><?php echo $personalData['clave']; ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary edit-personal-modal" data-toggle="modal" data-id=<?= $personalData['personal_id'] ?> data-target="#exampleModal">Editar</button>
                            <br><br>
                            <button type="button" class="btn btn-danger delete-personal-modal" data-toggle="modal" data-id=<?= $personalData['personal_id'] ?> data-target="#staticBackdrop"><img width="30" height="30" src="https://img.icons8.com/color/30/delete.png" alt="delete" /></button>
                        </td>
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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-formulario">
                                <div class="card-header">
                                Configuraciones de usuarios
                                </div>
                                <div class="card-body">
                                    <div class="form-row">

    <div class="form-group">
    <label for="nombre">Usuario:</label>
      <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
    </div>
    </div>
    <div class="form-group">
      <label for="password">Contraseña:</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button id="update" type="submit" class="btn btn-primary">Guardar cambios</button>
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
                        ¿Estás seguro de que deseas eliminarlo de la lista de personal?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Atrás</button>
                        <button id="delete" type="button" class="btn btn-primary">Si</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script type="module" src="./assets/js/personal/handleEditData.js?v=<?php echo rand(); ?>"></script>