<?php
include "./cabeceraadmin.php";
include "./sidebar.php";
include "./config/conexion.php"
?>
<main class="table_personal">
    <section class="table__header">
        <h1>personal del area de mantenimiento de cvg naviorca</h1>
    </section>
    <section class="table__body">
        <table>
            <thead>
                <tr>
                    <th> Id</th>
                    <th> Nombre</th>
                    <th> Cargo</th>
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
                        <td><?php echo $personalData['personal_id']; ?></td>
                        <td><?php echo $personalData['nombre']; ?></td>
                        <td><?php echo $personalData['cargo']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
</main>
</div>
</body>

</html>