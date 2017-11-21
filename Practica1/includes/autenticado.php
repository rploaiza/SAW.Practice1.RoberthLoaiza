<?php
// TODO 4 Comprobar si el usuario está autenticado 
if (!(isset($_SESSION) && array_key_exists('autenticado', $_SESSION) && ($_SESSION['autenticado'] === 'correcto'))) {
        header("Location:../NoAuth.php");
        exit;
}
?>