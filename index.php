<!-- front controller ou routeur qui indique quel controlleur appeler -->
<!-- ici le routeur est directement dans index.php, dans certains cas on l'appelle ici  -->
<?php

if(isset($_GET['new'])){
    require_once(__DIR__.'/controllers/newController.php');
}else if(isset($_GET['update'])){
    require_once(__DIR__.'/controllers/updateController.php');
}else if(isset($_GET['delete'])){
    require_once(__DIR__.'/controllers/deleteController.php');
}else{
    require_once(__DIR__.'/controllers/listController.php');
}
?>

