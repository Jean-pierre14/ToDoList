<?php
    
    require_once "./db.config.php";

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
        if($_POST['action'] == 'read'){}
        
        // Search
        if($_POST['action'] == 'search'){}
        
        // Update
        if($_POST['action'] == 'update'){}
        
        // Delete By Id 
        if($_POST['action'] == 'delete'){}
        
        // Delete All
        if($_POST['action'] == 'deleteAll'){}
    }