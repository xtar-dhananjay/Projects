<?php

    include '../Config.php';

    // Get User Inputs
    $CategoryName = $_POST['CategoryName'];
    $Posts = 0;

    $SelectQuery1 = " SELECT * FROM `category` Where Category_Name = :Category_Name1";
    $Statement1 = $Con -> prepare($SelectQuery1);
    $Statement1 -> bindParam(":Category_Name1", $CategoryName);
    $Statement1 -> execute();

    if($Statement1 -> rowCount() > 0){
        echo json_encode(array('Status' => 'Category Name have a already'));

    }else{

        // Save Data Into database
        $InsertQuery = "INSERT INTO `category`(`Category_Name`, `Posts`) VALUES (:CategoryName, :Posts)";
        $Statement = $Con -> prepare($InsertQuery);
        $Statement -> bindParam(":CategoryName", $CategoryName);
        $Statement -> bindParam(":Posts", $Posts);

        if ($Statement -> execute()) {
            echo json_encode(array('Status' => 'Success'));
        }else{
            echo json_encode(array('Status' => 'Error'));
        }
    }

    

    // echo json_encode(array('Name' => $Name, 'UserName' => $UserName, 'Password' => $Password, 'Role' => $Role, 'File' => $File));
    
    
    
    
    

?>