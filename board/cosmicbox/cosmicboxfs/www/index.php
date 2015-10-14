<?php

/*
WARNING !
This web interface for the CosmicBox is a work in progress.
It's programmed by a PHP noobie in procedural style.

ATTENTION
Cet interface web pour la CosmicBox est un travail en cours.
Il est programmé par un noobie du PHP en style procédural.
*/

//on inclus les constantes de configurations
require ('interface/inc/config/config.php');
$host = $_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html>
<html>

<?php
include (PATH_INCLUDE.'/head.php');
?>

<body>

<?php
if (isset($_GET['reset'])){
    $reset = $_GET['reset'];
}

if (isset($custom)){
    include(PATH_INCLUDE.'/custom-form.php');
}
elseif (isset($reset)){
    include(PATH_INCLUDE.'/reset-form.php');
}
else{

}
    include (PATH_INCLUDE.'/header.php');
    include (PATH_INCLUDE.'/content.php');
    include (PATH_INCLUDE.'/footer.php');
?>



    <script type="text/javascript" src="<?php echo DIR_INTERFACE; ?>/js/jquery.min.js"></script>
<?php
if ((isset($custom))OR(isset($reset))){
    echo'
    <script type="text/javascript" src="'.DIR_INTERFACE.'/js/custom-form.min.js"></script>
    ';
}
else{
    echo'
    <script type="text/javascript" src="'.DIR_INTERFACE.'/js/onscroll.min.js"></script>
    ';
}
?>
    <script type="text/javascript" src="<?php echo DIR_INTERFACE; ?>/js/explorer.min.js"></script>

</body>

</html>
