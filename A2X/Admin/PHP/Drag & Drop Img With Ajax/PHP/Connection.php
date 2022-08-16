<?php

    
    $Server = 'localhost';
    $Username = 'root';
    $Password = '';
    $DB = 'ajax';

    // Build Connection with Database
    $Mysql = "mysql:host={$Server};dbname={$DB}";
    $Con = new PDO($Mysql, $Username, $Password);


?>