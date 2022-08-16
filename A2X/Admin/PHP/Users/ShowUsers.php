<?php

    include '../Config.php';

    $SelectQuery = " SELECT * FROM users ";
    $Statement = $Con -> prepare($SelectQuery);
    $Statement -> execute();

    $OutPut = [];

    if ($Statement -> rowCount() > 0) {

        while ($Data = $Statement -> fetch(PDO::FETCH_ASSOC)) {
            $OutPut[]= $Data;  
        }

    }else{
        $OutPut['Empty'] = ['Empty'];
    }

    echo json_encode($OutPut);

?>