<?php

    include '../Config.php';

    $About1 = $_POST['About1'];
    $File1 = $_FILES['File1'];
    $About2 = $_POST['About2'];
    $File2 = $_FILES['File2'];
    $OldFile1 = $_POST['OldFile1'];
    $OldFile2 = $_POST['OldFile2'];

    $ExValid = true;
    $Uploaded1 = false;
    $Uploaded2 = false;
    if ($File1['name'] !== '') {
        // Let's Work on Img
        $FileName = $File1['name'];
        $FileTmp = $File1['tmp_name'];
        $FileExtan = pathinfo($FileName, PATHINFO_EXTENSION);
        $NewFileName = rand().'_'.date("Y-m-d").'_'. $FileName;
        $ValidExtan = array('jpeg', 'png', 'jpg');
        $UploadPath = '../../../Img/'.$NewFileName;

        // Check This file is image or not
        if (in_array($FileExtan, $ValidExtan)) {
            
            // Move File on server
            if (move_uploaded_file($FileTmp, $UploadPath)) {
                $Uploaded1 = true;
            }

        }else{
            $ExValid = false;
        }
    }

    
    if ($File2['name'] !== '') {
        // Let's Work on Img
        $FileName1 = $File2['name'];
        $FileTmp1 = $File2['tmp_name'];
        $FileExtan1 = pathinfo($FileName1, PATHINFO_EXTENSION);
        $NewFileName1 = rand().'_'.date("Y-m-d").'_'. $FileName1;
        $ValidExtan1 = array('jpeg', 'png', 'jpg');
        $UploadPath1 = '../../../Img/'.$NewFileName1;

        // Check This file is image or not
        if (in_array($FileExtan1, $ValidExtan1)) {
            
            // Move File on server
            if (move_uploaded_file($FileTmp1, $UploadPath1)) {
                $Uploaded2 = true;
            }

        }else{
            $ExValid = false;
        }
    }
        
    if ($ExValid == true) {            
        // Save Data Into database
        $UpdateQuery = "UPDATE `homeabout` SET `About1`=:About1,`AboutImg1`=:File1,`About2`=:About2,`AboutImg2`=:File2 WHERE HA_ID = 1";
        $Statement = $Con -> prepare($UpdateQuery);
        $Statement -> bindParam(":About1", $About1);
        $Statement -> bindParam(":About2", $About2);

        if ($Uploaded1 == true) {
            $Statement -> bindParam(":File1", $NewFileName);
        }else{
            $Statement -> bindParam(":File1", $OldFile1);
        }  
        
        if ($Uploaded2 == true) {
            $Statement -> bindParam(":File2", $NewFileName1);
        }else{
            $Statement -> bindParam(":File2", $OldFile2);
        }
        
        if ($Statement -> execute()) {
            if ($Uploaded1 == true) {
                unlink('../../../Img/'.$OldFile1);    
            }
            if ($Uploaded2 == true) {
                unlink('../../../Img/'.$OldFile2);
            }
            echo json_encode(array('Status' => 'Updated'));
        }else{
            echo json_encode(array('Status' => 'Error'));
        }
        
    }else{
        echo json_encode(array('Status' => 'Please Choose png, jpeg, jpg format'));
    }
    
    // echo json_encode(array('Status' => $_POST, 'Files' => $_FILES));
    
    
?>