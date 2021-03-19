<?php 

  try {
    $db = new PDO('mysql:host=localhost; dbname=ppe','root', '');
  }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
?>