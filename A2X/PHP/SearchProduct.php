<?php

    include '../Config.php';

    if (isset($_GET['SearchTerm'])) {
        $SearchTerm = $_GET['SearchTerm'];
    }


    $SelectQuery = " SELECT * FROM product WHERE Pro_Title LIKE '%' :Search_Term '%' OR Pro_Desc LIKE '%' :Search_Term '%' ORDER BY Pro_ID DESC ";
    $Statement = $Con -> prepare($SelectQuery);
    $Statement -> bindparam(':Search_Term', $SearchTerm);
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