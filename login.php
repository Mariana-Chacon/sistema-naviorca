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
   
        <div class="wrapper">
	<div class="container">
    <img src="assets/imagenes/naviorca.png" alt="">
		<h1>Bienvenido</h1>
		<form method="POST">
        <input type="text" name="usuario"placeholder="Ingrese Usuario">
        <input type="password"name="contraseña" placeholder="Contraseña">
        <button type="submit" class="btn btn-primary">Entrar al sistema</button>
		</form> 
</div>
	</div>

   
</body>
</html>

<style>

.wrapper {
  background: #3051cc;
  position: absolute;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
}
.wrapper img{
  width: 200px;
  height: 200px;
}
.container {
  max-width: 600px;
  margin-top:20px;
  padding: 80px 0;
  height: 400px;
  text-align: center;
  color: #f5f7f9;
}
.container h1 {
  font-size: 40px;
  font-weight: 200;
}
form {
  padding: 20px 0;
  position: relative;
  z-index: 2;
}
form input {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  outline: 0;
  border: 1px solid rgba(255, 255, 255, 0.4);
  background-color: rgba(255, 255, 255, 0.2);
  width: 250px;
  border-radius: 3px;
  padding: 10px 15px;
  margin: 0 auto 10px auto;
  display: block;
  text-align: center;
  font-size: 18px;
  color: white;
  -webkit-transition-duration: 0.25s;
          transition-duration: 0.25s;
  font-weight: 300;
}
form input:hover {
  background-color: rgba(255, 255, 255, 0.4);
}
form input:focus {
  background-color: white;
  width: 300px;
  color: #3051cc;
}
form button {
  outline: 0;
  background-color: white;
  border: 0;
  padding: 10px ;
  color: #3051cc;
  border-radius: 3px;
  width: 250px;
  cursor: pointer;
  font-size: 18px;
  -webkit-transition-duration: 0.25s;
          transition-duration: 0.25s;
}
form button:hover {
  background-color: #f5f7f9;
}

</style>