<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=camagru;charset=utf8', 'root', 'root');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
