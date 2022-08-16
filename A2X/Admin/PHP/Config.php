<?php
        
    $Server = 'localhost';
    $Username = 'root';
    $Password = '';
    $DB = 'a2x';

    // Build Connection with Database
    $Mysql = "mysql:host={$Server};dbname={$DB}";
    $Con = new PDO($Mysql, $Username, $Password);

?>