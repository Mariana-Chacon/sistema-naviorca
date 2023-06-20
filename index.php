
        <?php
            include "./cabeceraadmin.php";
            include "./sidebar.php";
            include "config/conexion.php";
        ?>

    <div id="main-content" class="container py-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                <a href="personal.php"><img width="96" height="96" src="https://img.icons8.com/color/96/000000/person-male.png" alt="person-male"/></a>
                    <h4>PERSONAL</h4>
                    <h5>
                    <!---?php
                        $sql="SELECT * from personal where isAdmin=0";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?--></h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                <a href="mantenimiento.php"><img width="96" height="96" src="https://img.icons8.com/color/96/screwdriver.png" alt="screwdriver"/></a>
                    <h4>MANTENIMIENTO PREVENTIVO</h4>
                    <h5>
                    <!---?php
                       
                       $sql="SELECT * from category";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?-->
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="card">
            <a href="equipos.php"><img width="96" height="96" src="https://img.icons8.com/color/96/gear.png" alt="gear"/></a>
                    <h4>EQUIPOS</h4>
                    <h5>
                    <!---?php
                       
                       $sql="SELECT * from product";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?-->
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
               <a href="informes.php"><img width="96" height="96" src="https://img.icons8.com/color/96/business-report.png" alt="business-report"/></a>
                    <h4>INFORMES</h4>
                    <h5>
                    <!---?php
                       
                       $sql="SELECT * from orders";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?-->
                   </h5>
                </div>
            </div>
        </div>
        
    </div>
       
            
        <!---?php
            if (isset($_GET['category']) && $_GET['category'] == "success") {
                echo '<script> alert("Category Successfully Added")</script>';
            }else if (isset($_GET['category']) && $_GET['category'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
            if (isset($_GET['size']) && $_GET['size'] == "success") {
                echo '<script> alert("Size Successfully Added")</script>';
            }else if (isset($_GET['size']) && $_GET['size'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
            if (isset($_GET['variation']) && $_GET['variation'] == "success") {
                echo '<script> alert("Variation Successfully Added")</script>';
            }else if (isset($_GET['variation']) && $_GET['variation'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
        ?>


   