
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistema de gestion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>"></link>
</head>
<body >
       
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #004359;">
    
    <a class="navbar-brand ml-5" href="./index.php">
        <img src="./assets/images/naviorca.png" width="80" height="80" alt=" ">
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    

<div class="user-cart">
    <button type="button" class="btn btn-primary" style="background: #fff;">
            Alertas <span class="badge badge-light">4</span>
        </button>


        <?php           
        if(isset($_SESSION['user_id'])){
          ?>
          <a href="" style="text-decoration:none;">
            <img width="30" height="30" src="https://img.icons8.com/fluency/30/emergency-exit.png" alt="emergency-exit"/>
         </a>
          <?php
        } else {
            ?>
            <a href="" style="text-decoration:none;">
            <img width="40" height="40" src="https://img.icons8.com/fluency/40/emergency-exit.png" alt="emergency-exit"/>
            </a>

            <?php
        } ?>
    
    </div> 
</nav>
<script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
