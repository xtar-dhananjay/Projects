<?php

    include '../Config.php';

    if (isset($_GET['CategoryID'])) {
        $CategoryID = $_GET['CategoryID'];
        
        $SelectQuery = " SELECT * FROM product WHERE Pro_Category = :CategoryID ORDER BY Pro_ID DESC ";
        $Statement = $Con -> prepare($SelectQuery);
        $Statement -> bindparam(':CategoryID', $CategoryID);
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
    }



?>