<?php
if($_POST){
     header("Location:index.php");
  }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistema de gestion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
</br></br></br></br></br></br></br></br>
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                     <form method="POST">
                     <div class = "form-group">
                     <label>Usuario</label>
                     <input type="text" class="form-control" name="usuario"placeholder="Ingrese Usuario">
                     </div>
                     <div class="form-group">
                     <label>Contraseña</label>
                     <input type="password" class="form-control" name="contraseña" placeholder="Contraseña">
                     </div>
                     <button type="submit" class="btn btn-primary">Entrar al sistema</button>
                     </form>
                </div>
            </div>
        </div>
        
    </div>
</div>


    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
