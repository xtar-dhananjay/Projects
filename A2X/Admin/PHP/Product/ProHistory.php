<?php

    include '../Config.php';

    if (isset($_GET['EditID'])) {
        $EditID = $_GET['EditID'];
    
        $SelectQuery = " SELECT * FROM product Where Pro_ID = :EditID";
        $Statement = $Con -> prepare($SelectQuery);
        $Statement -> bindParam(":EditID", $EditID);
        $Statement -> execute();
    
        $OutPut = [];
    
        if ($Statement -> rowCount() > 0) {
    
            while ($Data = $Statement -> fetch(PDO::FETCH_ASSOC)) {
                $OutPut['ProData'][]= $Data;  
            }
    
        }else{
            $OutPut['ProData'] = ['Empty'];
        }
    
        $SelectQuery1 = " SELECT * FROM category ";
        $Statement1 = $Con -> prepare($SelectQuery1);
        $Statement1 -> execute();
    
        if ($Statement1 -> rowCount() > 0) {
    
            while ($CData = $Statement1 -> fetch(PDO::FETCH_ASSOC)) {
                $OutPut['Category'][] = $CData;  
            }
    
        }else{
            $OutPut['Category'] = ['Empty'];
        }
    
        echo json_encode($OutPut);

    }

?>