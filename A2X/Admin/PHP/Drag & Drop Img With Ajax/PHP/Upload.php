<?php

    include 'Connection.php';

    $File = $_FILES['file'];

    // print_r(json_encode($File));

    if ($File['name'] != '') {

        $FileNames = '';

        // Get total file
        $Total = count($File['name']);

        for ($i=0; $i < $Total; $i++) { 

            $Fname = $File['name'][$i];

            $FileExt = pathinfo($Fname, PATHINFO_EXTENSION);

            $ValidExt = array('jpg', 'png', 'jpeg');
            
            if (in_array($FileExt, $ValidExt)) {
                
                $NewName = rand(). '_' .$Fname;
                $Path = 'Upload/' . $NewName;

                move_uploaded_file($File['tmp_name'][$i], $Path);
                
                $FileNames .= $NewName . ' , ';

            }else{
                echo json_encode(array('Status' => 'Image Not Uploaded'));
            }
            
        }

        $InserQuery = "INSERT INTO `img`(`Img`) VALUES (:FileNames)";
        $Statement = $Con -> prepare($InserQuery);
        $Statement -> bindParam(':FileNames', $FileNames);

        // Once Data Submit on the DataBase then
        if ($Statement -> execute()) {
            echo json_encode(array('Status' => 'Image Successfully Uploaded'));
        }else{
            echo json_encode(array('Status' => 'Image Not Uploaded : DataBase Problem'));

        }


    }else{
        echo json_encode(array('Status' => 'This file Extensions not Allowed'));
    }







?>