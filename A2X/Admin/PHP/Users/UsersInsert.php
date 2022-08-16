<?php

    include '../Config.php';

    // Get User Inputs
    $Name = $_POST['1Name'];
    $UserName = $_POST['1Username'];
    $Password = $_POST['1Poassword'];
    $Role = $_POST['1Role'];
    $File = $_FILES['1File'];

    // Incript Password
    $IncPassword = md5($Password);

    // Let's Work on Img
    $FileName = $File['name'];
    $FileTmp = $File['tmp_name'];
    $FileExtan = pathinfo($FileName, PATHINFO_EXTENSION);
    $NewFileName = rand().'_'.date("Y-m-d").'_'. $FileName;
    $ValidExtan = array('jpeg', 'png', 'jpg');
    $UploadPath = '../../../Img/'.$NewFileName;

    $SelectQuery1 = " SELECT * FROM `users` Where Username = :Username1";
    $Statement1 = $Con -> prepare($SelectQuery1);
    $Statement1 -> bindParam(":Username1", $UserName);
    $Statement1 -> execute();

    if($Statement1 -> rowCount() > 0){
        echo json_encode(array('Status' => 'Username Problem'));

    }else{
        // Check This file is image or not
        if (in_array($FileExtan, $ValidExtan)) {
            
            // Move File on server
            if (move_uploaded_file($FileTmp, $UploadPath)) {
                
                // Save Data Into database
                $InsertQuery = "INSERT INTO `users`(`Name`, `Username`, `Password`, `Role`, `Img`) VALUES (:Name, :Username, :Password, :Role, :Img)";
                $Statement = $Con -> prepare($InsertQuery);
                $Statement -> bindParam(":Name", $Name);
                $Statement -> bindParam(":Username", $UserName);
                $Statement -> bindParam(":Password", $IncPassword);
                $Statement -> bindParam(":Role", $Role);
                $Statement -> bindParam(":Img", $NewFileName);
    
                if ($Statement -> execute()) {
                    echo json_encode(array('Status' => 'Success'));
                }else{
                    echo json_encode(array('Status' => 'Error'));
                }
            }
    
        }else{
            echo json_encode(array('Status' => 'Extanstion Problem'));
        }
    }

    

    // echo json_encode(array('Name' => $Name, 'UserName' => $UserName, 'Password' => $Password, 'Role' => $Role, 'File' => $File));
    
    
    
    
    

?>