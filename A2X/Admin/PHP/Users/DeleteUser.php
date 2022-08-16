<?php

    include '../Config.php';

    if (isset($_GET['DelteID'])) {
        $DeleteID = $_GET['DelteID'];

        $SelectQuery1 = " SELECT * FROM `users` Where ID = :GetIMG";
        $Statement1 = $Con -> prepare($SelectQuery1);
        $Statement1 -> bindParam(":GetIMG", $DeleteID, PDO::PARAM_INT);
        $Statement1 -> execute();
        $Data = $Statement1 -> fetch(PDO::FETCH_ASSOC);
        unlink('../../../Img/'. $Data['Img']);

    
        $SelectQuery = " DELETE FROM `users` Where ID = :DeleteID";
        $Statement = $Con -> prepare($SelectQuery);
        $Statement -> bindParam(":DeleteID", $DeleteID);
        if ($Statement -> execute()) {
            echo json_encode(array('Status' => 'Deleted'));
        }else{
            echo json_encode(array('Status' => 'Error'));
        }

    }

?>