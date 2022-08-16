<?php

    include '../Config.php';

    if (isset($_GET['DeleteID'])) {

        $DeleteID = $_GET['DeleteID'];

        $SelectQuery1 = " SELECT * FROM product Where Pro_ID = :DeleteImg";
        $Statement1 = $Con -> prepare($SelectQuery1);
        $Statement1 -> bindParam(":DeleteImg", $DeleteID);
        $Statement1 -> execute();
        $Data = $Statement1 -> fetch(PDO::FETCH_ASSOC);
        
        $CategoryID = $Data['Pro_Category'];
        $Img = explode(",",$Data['Pro_Img']);
        array_pop($Img);

        for ($i=0; $i < Count($Img); $i++) { 
            unlink('../../../Img/' .$Img[$i]);
        }
    
        $SelectQuery = " DELETE FROM `product` Where Pro_ID = :DeleteID;";
        $SelectQuery .= "UPDATE category SET Posts = Posts-1 WHERE Category_ID = :Category";
        $Statement = $Con -> prepare($SelectQuery);
        $Statement -> bindParam(":DeleteID", $DeleteID);
        $Statement -> bindParam(":Category", $CategoryID);
        if ($Statement -> execute()) {
            echo json_encode(array('Status' => 'Deleted'));
        }else{
            echo json_encode(array('Status' => 'Error'));
        }


    }










?>