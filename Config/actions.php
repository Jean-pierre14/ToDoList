<?php
    
    require_once "./db.conf.php";

    $datas = [];

    

    if(isset($_POST['action'])){

        /**
         * Un simple CRUD
         */

        // Create
        if($_POST['action'] == 'create'){

            $title = htmlentities(mysqli_real_escape_string($con, $_POST['title']));
            $description = htmlentities(mysqli_real_escape_string($con, $_POST['desc']));

            // Checking of errors
            if(empty($title)) {array_push($errors, "Le titre est vide");}
            if(empty($description)) {array_push($errors, "La description est vide");}

            // Checking of the array
            if (count($errors) == 0) {
                
                $sql = mysqli_query($con, "INSERT INTO todoList_tb(title, `desc`, event_status) VALUES('$title', '$description', 1)");
                
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

            sleep(1.5);
            
            $action = 'SelectAll';

            $sql = mysqli_query($con, "SELECT * FROM todoList_tb WHERE event_status = 1 ORDER BY id DESC");
            
            if(@mysqli_num_rows($sql) > 0) {
                
                while($row = mysqli_fetch_array($sql)){
                    $output .= '
                        <div class="box">
                            <div class="wrapper">
                                <div class="header">
                                    <h2 class="heading">'.$row['title'].'</h2>
                                    <small class="date">'.$row['created_at'].'</small>
                                    ';
                                    if($row['status'] == 1){
                                        $output .= '
                                            <span class="status on">
                                            Done
                                        </span>';
                                    }else{
                                        $output .= '
                                        <span class="status off">
                                            In process
                                        </span>
                                        ';
                                    }
                                    $output.= '
                                    
                                </div>
                                <div class="description">
                                    <p>
                                        '.$row['desc'].'
                                    </p>
                                </div>
                                ';
                                if($row['status'] == 1){
                                    $output .= '
                                    <div class="verification">
                                        <button class="delete danger" id="'.$row['id'].'" type="button">Delete</button>
                                    </div>
                                    ';
                                }else{
                                    $output .= '
                                    <div class="verification">
                                        <button class="on done" id="'.$row['id'].'" type="button">Done</button>
                                        <button class="edit primary" id="'.$row['id'].'" type="button">Edit</button>
                                        <button class="delete danger" id="'.$row['id'].'" type="button">Delete</button>
                                    </div>
                                    ';
                                }
                                $output .= '
                            </div>
                        </div>
                        ';
                }

            }else{
                
                $output = '<p class="alert alert-warning">Vous n\'avez pas des donnees :(</p>';
            
            }

            print $output;
        }

        // Done Event
        if($_POST['action'] == 'done'){

            $Id = mysqli_real_escape_string($con, $_POST['Id']);
            $sql = mysqli_query($con, "UPDATE todoList_tb SET `status` = '1' WHERE id = $Id");

            if($sql){
                print "success ". $Id;
            }else{
                print "Error";
            }
        }
        // Delete Event
        if($_POST['action'] == 'delete'){

            $Id = mysqli_real_escape_string($con, $_POST['Id']);
            $sql = mysqli_query($con, "UPDATE todoList_tb SET event_status = 0 WHERE id = $Id");

            if($sql){
                print "success ";
            }else{
                print "Error";
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



// My APis

