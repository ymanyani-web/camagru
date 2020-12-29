<?php
    try
    {
        $bdd = new PDO('mysql:host=database;dbname=camagru;charset=utf8', 'root', 'tiger');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
