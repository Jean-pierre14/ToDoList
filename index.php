<?php 
    require_once "./Config/db.conf.php";
    require_once "./includes/header.php";
?>

<?php if($con):?>
<?php 
    
    require_once "./includes/nav.php";
    require_once "./includes/container.php";
    require_once "./includes/add.php";
    require_once "./includes/footer.php";
?>
<?php else:?>
    <div class="container">
        <div class="box">
            <div class="wrapper p-5">
            <h2>Error...</h2>
            <p>
                Vous n'etes pas connecter a la base de donnees...
            </p>
            <h1>Veillez patiente...</h1>
            </div>
        </div>
    </div>

<?php endif;?>


    

    