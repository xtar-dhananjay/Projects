<?php

    include '../Config.php';

    $Facebook       =   $_POST['Facebook'];
    $Instagram      =   $_POST['Instagram'];
    $linkedin       =   $_POST['linkedin'];
    $Twitter        =   $_POST['Twitter'];
    $Whatspp        =   $_POST['Whatspp'];
    $Call           =   $_POST['Call'];
    $Email          =   $_POST['Email'];
    $Phone1         =   $_POST['Phone1'];
    $Phone2         =   $_POST['Phone2'];
    $WorkingTime    =   $_POST['WorkingTime'];
    $Address        =   $_POST['Address'];


    
    // Save Data Into database
    $UpdateQuery = "UPDATE `contactinfo` SET `Face`=:Facebook,`Insta`=:Instagram,`Linke`=:linkedin,`Twitter`=:Twitter,`Whats`=:Whatspp,`Phone`=:Call,`Email`=:Email,`Number1`=:Phone1,`Number2`=:Phone2,`WorkingTime`=:WorkingTime,`Address`=:Address WHERE 1";

    $Statement = $Con -> prepare($UpdateQuery);
    $Statement -> bindParam(':Facebook', $Facebook);
    $Statement -> bindParam(':Instagram', $Instagram);
    $Statement -> bindParam(':linkedin', $linkedin);
    $Statement -> bindParam(':Twitter', $Twitter);
    $Statement -> bindParam(':Whatspp', $Whatspp);
    $Statement -> bindParam(':Call', $Call);
    $Statement -> bindParam(':Email', $Email);
    $Statement -> bindParam(':Phone1', $Phone1);
    $Statement -> bindParam(':Phone2', $Phone2);
    $Statement -> bindParam(':WorkingTime', $WorkingTime);
    $Statement -> bindParam(':Address', $Address);

    if ($Statement -> execute()) {
        echo json_encode(array('Status' => 'Success'));
    }else{
        echo json_encode(array('Status' => 'Error'));
    }



?>