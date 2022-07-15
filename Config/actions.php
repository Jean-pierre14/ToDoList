<?php
    
    require_once "./db.config.php";

    $datas = [];

    if(isset($_POST['action'])){

        /**
         * Un simple CRUD
         */

        // Create
        if($_POST['action'] == 'create'){

            $title = htmlentities(mysqli_real_escape_string($con, $_POST['title']));
            $description = htmlentities(mysqli_real_escape_string($con, $_POST['description']));

            // Checking of errors
            if(empty($title)) {array_push($errors, "Le titre est vide");}
            if(empty($description)) {array_push($errors, "La description est vide");}

            // Checking of the array
            if (count($errors) == 0) {
                
                $sql = mysqli_query($con, "INSERT INTO todoList_tb(title, `desc`) VALUES('.$title.', '.$description.')");
                
                if ($sql){

                    $output = 'success';
                
                } else {
                
                    $output = 'error';
                
                }

            } else {

                $output = 'error';
            
            }

        }
        
        // Read
        if($_POST['action'] == 'read'){
            
            $action = 'SelectAll';

            $sql = mysqli_query($con, "SELECT * FROM todoList_tb ORDER BY id DESC");

            if(@mysqli_num_rows($sql) > 0){
                $output = '
                <div class="container">
                    <div class="row-center">
                ';
                $output .= '
                <div class="box">
                    <div class="wrapper">
                        <div class="header">
                            <h2 class="heading">Tasts zero</h2>
                            <small class="date">Date</small>
                            <span class="status on">
                                status on
                            </span>
                        </div>
                        <div class="description">
                            <p>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quia corporis eum reiciendis veniam facere amet tempora labore fugit, natus itaque iusto dolores in eveniet ea quam ullam nesciunt ut earum.
                            </p>
                        </div>
                        <div class="verification">
                            <button class="on" type="button">Done</button>
                        </div>
                    </div>
                </div>
                ';
                $output = '
                    </div>
                </div>
                ';
            }else{
                $output = '<p class="alert alert-warning">Vous n\'avez pas des donnees :(</p>';
            }
        }
        
        // Search
        if($_POST['action'] == 'search'){}
        
        // Update
        if($_POST['action'] == 'update'){}
        
        // Delete By Id 
        if($_POST['action'] == 'delete'){}
        
        // Delete All
        if($_POST['action'] == 'deleteAll'){}
    }

if(isset($_GET['actions'])){

    if($_GET['actions'] == 'selectAll'){
        
        $datas = ["One", "Two"];

        echo json_encode($datas);

    }
}
