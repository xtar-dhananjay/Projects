<?php

    include '../Config.php';

    // Paragraph with Img for About
    $AText1 = $_POST['AText1'];
    $AFile1 = $_FILES['AFile1'];
    $AText2 = $_POST['AText2'];
    $AFile2 = $_FILES['AFile2'];

    // Workers Img and Title
    $Worker1 = $_POST['Worker1'];
    $WFile1 = $_FILES['WFile1'];

    $Worker2 = $_POST['Worker2'];
    $WFile2 = $_FILES['WFile2'];

    $Worker3 = $_POST['Worker3'];
    $WFile3 = $_FILES['WFile3'];

    $Worker4 = $_POST['Worker4'];
    $WFile4 = $_FILES['WFile4'];

    $Worker5 = $_POST['Worker5'];
    $WFile5 = $_FILES['WFile5'];

    $Worker6 = $_POST['Worker6'];
    $WFile6 = $_FILES['WFile6'];
    
    // Old Imgs
    $OldImgA1 = $_POST['OldImgA1'];
    $OldImgA2 = $_POST['OldImgA2'];
    $OldImgW1 = $_POST['OldImgW1'];
    $OldImgW2 = $_POST['OldImgW2'];
    $OldImgW3 = $_POST['OldImgW3'];
    $OldImgW4 = $_POST['OldImgW4'];
    $OldImgW5 = $_POST['OldImgW5'];
    $OldImgW6 = $_POST['OldImgW6'];



    function CheckFile(&$File,&$CheckFile1,&$ExValid){
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
                    $CheckFile1 = true;

                    return $NewFileName;
                }
    
            }else{
                $ExValid = false;
            }
        }else{
            $CheckFile1 = false;
        }
    }

    $ExValid = true;
    $CheckAFile1 = true;
    $CheckAFile2 = true;

    $CheckWFile1 = true;
    $CheckWFile2 = true;
    $CheckWFile3 = true;
    $CheckWFile4 = true;
    $CheckWFile5 = true;
    $CheckWFile6 = true;

    $NewRName1 = CheckFile($AFile1,$CheckAFile1,$ExValid);
    $NewRName2 = CheckFile($AFile2,$CheckAFile2,$ExValid);

    $NewWName1 = CheckFile($WFile1,$CheckWFile1,$ExValid);
    $NewWName2 = CheckFile($WFile2,$CheckWFile2,$ExValid);
    $NewWName3 = CheckFile($WFile3,$CheckWFile3,$ExValid);
    $NewWName4 = CheckFile($WFile4,$CheckWFile4,$ExValid);
    $NewWName5 = CheckFile($WFile5,$CheckWFile5,$ExValid);
    $NewWName6 = CheckFile($WFile6,$CheckWFile6,$ExValid);


    if ($ExValid == true) {
        
        $UpdateQuery = "UPDATE `about` SET `About1`=:AText1,`AboutImg1`=:NewRName1,`About2`=:AText2,`AboutImg2`=:NewRName2,`WK1`=:Worker1,`WKImg1`=:NewWName1,`WK2`=:Worker2,`WKImg2`=:NewWName2,`WK3`=:Worker3,`WKImg3`=:NewWName3,`WK4`=:Worker4,`WKImg4`=:NewWName4,`WK5`=:Worker5,`WKImg5`=:NewWName5,`WK6`=:Worker6,`WKImg6`=:NewWName6 WHERE About_ID = 1";
        $Statement = $Con -> prepare($UpdateQuery);
        $Statement -> bindParam(":AText2", $AText2);
        $Statement -> bindParam(":AText1", $AText1);

        $Statement -> bindParam(":Worker1", $Worker1);
        $Statement -> bindParam(":Worker2", $Worker2);
        $Statement -> bindParam(":Worker3", $Worker3);
        $Statement -> bindParam(":Worker4", $Worker4);
        $Statement -> bindParam(":Worker5", $Worker5);
        $Statement -> bindParam(":Worker6", $Worker6);

        // ABoutImg
        // 1.
        if ($CheckAFile1 == true) {
            $Statement -> bindParam(":NewRName1", $CheckAFile1);
        }else{
            $Statement -> bindParam(":NewRName1", $OldImgA1);
        }

        // 2.
        if ($CheckAFile2 == true) {
            $Statement -> bindParam(":NewRName2", $NewRName2);
        }else{
            $Statement -> bindParam(":NewRName2", $OldImgA2);
        }

        // Worker
        // 1.
        if ($CheckWFile1 == true) {
            $Statement -> bindParam(":NewWName1", $NewWName1);
        }else{
            $Statement -> bindParam(":NewWName1", $OldImgW1);
        }
        // 2.
        if ($CheckWFile2 == true) {
            $Statement -> bindParam(":NewWName2", $NewWName2);
        }else{
            $Statement -> bindParam(":NewWName2", $OldImgW2);
        }
        // 3.
        if ($CheckWFile3 == true) {
            $Statement -> bindParam(":NewWName3", $NewWName3);
        }else{
            $Statement -> bindParam(":NewWName3", $OldImgW3);
        }
        // 4.
        if ($CheckWFile4 == true) {
            $Statement -> bindParam(":NewWName4", $NewWName4);
        }else{
            $Statement -> bindParam(":NewWName4", $OldImgW4);
        }
        // 5.
        if ($CheckWFile5 == true) {
            $Statement -> bindParam(":NewWName5", $NewWName5);
        }else{
            $Statement -> bindParam(":NewWName5", $OldImgW5);
        }
        // 6.
        if ($CheckWFile6 == true) {
            $Statement -> bindParam(":NewWName6", $NewWName6);
        }else{
            $Statement -> bindParam(":NewWName6", $OldImgW6);
        }        
        
        if ($Statement -> execute()) {
            if ($CheckWFile1 == true) {
                unlink('../../../Img/'.$OldImgW1);    
            }
            if ($CheckWFile2 == true) {
                unlink('../../../Img/'.$OldImgW2);    
            }
            if ($CheckWFile3 == true) {
                unlink('../../../Img/'.$OldImgW3);    
            }
            if ($CheckWFile4 == true) {
                unlink('../../../Img/'.$OldImgW4);    
            }
            if ($CheckWFile5 == true) {
                unlink('../../../Img/'.$OldImgW5);    
            }
            if ($CheckWFile6 == true) {
                unlink('../../../Img/'.$OldImgW6);    
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