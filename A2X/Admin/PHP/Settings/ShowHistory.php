<?php

    include '../Config.php';


    $SelectQuery = " SELECT * FROM contactinfo Where Cont_ID = 1 ";
    $Statement = $Con -> prepare($SelectQuery);
    $Statement -> execute();

    $OutPut = [];

    if ($Statement -> rowCount() > 0) {

        while ($Data = $Statement -> fetch(PDO::FETCH_ASSOC)) {
            $OutPut[]= $Data;  
        }
        echo json_encode($OutPut);
    }

?>