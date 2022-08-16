<?php

    include '../Config.php';

    if (isset($_GET['DeleteID'])) {
        $DeleteID = $_GET['DeleteID'];
    
        $SelectQuery = " DELETE FROM `category` Where Category_ID = :DeleteID ";
        $Statement = $Con -> prepare($SelectQuery);
        $Statement -> bindParam(":DeleteID", $DeleteID);
        if ($Statement -> execute()) {
            echo json_encode(array('Status' => 'Deleted'));
        }else{
            echo json_encode(array('Status' => 'Error'));
        }

    }

?>