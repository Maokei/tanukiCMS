<?php
/**
* @author maokei
*/
session_start();
session_destroy();
header('Location: index.php');

?>
