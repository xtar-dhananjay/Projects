<?php

    include '../Config.php';

    // Get User Inputs
    $Name = $_POST['Name'];
    $UserName = $_POST['Username'];
    $Role = $_POST['Role'];
    $UserID = $_POST['ID'];
    $OldImg = $_POST['Img'];
    $File = $_FILES['2File'];
    
    $Uploaded = false;
    $ExVe = true;
    
    if ($File['name'] !== '') {
        // Let's Work on Img
        $FileName = $File['name'];
        $FileTmp = $File['tmp_name'];
        $FileExtan = pathinfo($FileName, PATHINFO_EXTENSION);
        $NewFileName = rand().'_'.date("Y-m-d").'_'. $FileName;
        $ValidExtan = array('jpeg', 'png', 'jpg');
        $UploadPath = '../../../Img/'.$NewFileName;

        // Check This file is image or not
        if (in_array($FileExtan, $ValidExtan)) {
            
            // Move File on server
            if (move_uploaded_file($FileTmp, $UploadPath)) {
                $Uploaded = true;
            }

        }else{
            $ExVe = false;
        }

    }


    if($ExVe == true){
            
        // Save Data Into database
        $InsertQuery = "UPDATE `users` SET `Name`=:Name,`Username`=:Username,`Role`=:Role,`Img`=:Img WHERE ID = :ID";
        $Statement = $Con -> prepare($InsertQuery);
        $Statement -> bindParam(":Name", $Name);
        $Statement -> bindParam(":ID", $UserID);
        $Statement -> bindParam(":Username", $UserName);
        $Statement -> bindParam(":Role", $Role);
        if ($Uploaded == true) {
            $Statement -> bindParam(":Img", $NewFileName);
            unlink('../../../Img/'.$OldImg);
        }else{
            $Statement -> bindParam(":Img", $OldImg);
        }
    
        if ($Statement -> execute()) {
            echo json_encode(array('Status' => 'Updated'));
        }else{
            echo json_encode(array('Status' => 'Error'));
        }

    }else{
        echo json_encode(array('Status' => 'Extanstion Problem'));
    }

    // echo json_encode(array('Name' => $Name, 'UserName' => $UserName, 'ID' => $UserID, 'OldImg' => $OldImg, 'Role' => $Role, 'File' => $File));
    
    
    
    
    

?>