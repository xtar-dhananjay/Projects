<?php

    include '../Config.php';

    // Get The All Data
    $Title = $_POST['Title'];
    $Price = $_POST['Price'];
    $Category = $_POST['Category'];
    $Desc = $_POST['Description'];
    $TableTitle = $_POST['TableTitle'];
    $TableDesc = $_POST['TableDesc'];
    $File = $_FILES['file'];
    
    // This is for Checking
    $ValidImg = true;
    
    if ($File['name'] != '') {

        // Get total file
        $Total = count($File['name']);

        for ($i=0; $i < $Total; $i++) { 

            $Fname = $File['name'][$i];

            $FileExt = pathinfo($Fname, PATHINFO_EXTENSION);

            $ValidExt = array('jpg', 'png', 'jpeg');

            if ($ValidImg == true) {

                if (in_array($FileExt, $ValidExt)) {
                    $ValidImg == true;
                }else{
                    $ValidImg = false;
                    echo json_encode(array('Status' => 'File Extantion Problem'));
                    die();

                }
                
            }else{
                echo json_encode(array('Status' => 'File Extantion Problem'));
                die();
            }
            
        }
    }

    if ($ValidImg == true) {

        $FileNames = '';
        $UploadStatus = true;

        for ($i=0; $i < $Total; $i++) { 

            $Fname = $File['name'][$i];
            $NewName = 'Pro'. '_' .rand(). '_'. date("Y-m-d"). '_' .$Fname;
            $Path = '../../../Img/' . $NewName;
        
            if ($UploadStatus == true) {
                if (move_uploaded_file($File['tmp_name'][$i], $Path)) {
                    $FileNames .= $NewName . ',';
                }else{
                    $UploadStatus = false;
                }
                
            }else{
                echo json_encode(array('Status' => 'Img Not Moved'));
                die();
            }
        }

        if ($UploadStatus == true) {
            
            // Save Data Into database
            $InsertQuery = "INSERT INTO `product`(`Pro_Title`, `Pro_Price`, `Pro_Category`, `Pro_Desc`, `Pro_Img`, `Pro_TTitle`, `Pro_TDesc`) VALUES (:Title,:Price,:Category,:Desc,:FileNames,:TableTitle,:TableDesc);";
            $InsertQuery .= "UPDATE category SET Posts = Posts+1 WHERE Category_ID = :Category";
            $Statement = $Con -> prepare($InsertQuery);
            $Statement -> bindParam(":Title", $Title);
            $Statement -> bindParam(":Price", $Price);
            $Statement -> bindParam(":Category", $Category);
            $Statement -> bindParam(":Desc", $Desc);
            $Statement -> bindParam(":TableTitle", $TableTitle);
            $Statement -> bindParam(":TableDesc", $TableDesc);
            $Statement -> bindParam(":FileNames", $FileNames);

            if ($Statement -> execute()) {
                echo json_encode(array('Status' => 'Success'));
            }else{
                echo json_encode(array('Status' => 'Error'));
            }

        }

    }











    // echo json_encode(array('Title' => $Title, 'Price' => $Price, 'File' => $File, 'Category' => $Category, 'Description' => $Desc, 'TableTitle' => $TableTitle, 'TableDesc' => $TableDesc));


?>