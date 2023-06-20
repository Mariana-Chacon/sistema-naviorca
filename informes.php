<?php
include "./cabeceraadmin.php";
include "./sidebar.php";
include "./config/conexion.php"
?> 
<div class="container">
    <a href="#" class="btn btn-warning"><img width="30" height="30" src="https://img.icons8.com/color/30/add--v1.png" alt="add--v1" />Agregar</a>
</div>
<div class="informes">
    <div class="informes_card">
        <div class="items_box">
            <h3>hola hola </h3>
        </div>
    </div>
    <div class="informes_card">
        <div class="items_box">
            <h3>hola hola </h3>
        </div>
    </div>
</div>

<style>
    .informes{
        display: flex;
        justify-content: center; 

}
    .informes_card{
        width: 30%;
        height: 450px;
        background: #004359;;
        margin: 40px;
        border-radius: 30px;    
}
</style>