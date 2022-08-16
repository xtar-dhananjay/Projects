<?php

    include '../Config.php';

    // Get User Inputs
    $CategoryName = $_POST['UpCategoryName'];
    $EditID = $_POST['EditID'];


    $SelectQuery1 = " SELECT * FROM `category` Where Category_Name = :Category_Name1";
    $Statement1 = $Con -> prepare($SelectQuery1);
    $Statement1 -> bindParam(":Category_Name1", $CategoryName);
    $Statement1 -> execute();

    if($Statement1 -> rowCount() > 0){
        echo json_encode(array('Status' => 'Category Name have a already'));

    }else{

        // Save Data Into database
        $InsertQuery = "UPDATE `category` SET `Category_Name`=:CategoryName WHERE Category_ID = :EditID";
        $Statement = $Con -> prepare($InsertQuery);
        $Statement -> bindParam(":CategoryName", $CategoryName);
        $Statement -> bindParam(":EditID", $EditID);

        if ($Statement -> execute()) {
            echo json_encode(array('Status' => 'Success'));
        }else{
            echo json_encode(array('Status' => 'Error'));
        }
    }
    // echo json_encode(array('Name' => $Name, 'UserName' => $UserName, 'ID' => $UserID, 'OldImg' => $OldImg, 'Role' => $Role, 'File' => $File));
    
    
    
    
    

?>