<?php
/**
* @author maokei
*/

    try{
        //$pdo =  new PDO('mysql:host=localhost;dbname=cms', '', '');
        //$pdo = new PDO('postgresql:host=localhost;dbname=cms', '', '');
        $pdo = new PDO('pgsql:host=localhost;dbname=cms;user=;password=');
        //$res = $pdo->exec('SET search_path TO public');
        /*if(!$res) {
            die('Failed to set schema: '  . $pdo->errorMsg());
        }*/
   }catch(PDOException $e){
       exit('Database error.');
   }
?>
