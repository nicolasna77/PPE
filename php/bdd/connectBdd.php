<?php 

  try {
    $db = new PDO('mysql:host=localhost; dbname=ppe; charset=UTF8','root', '');
  }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
?>