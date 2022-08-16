<?php

    include '../Config.php';

    if (isset($_GET['EditID'])) {
        $EditID = $_GET['EditID'];
    
        $SelectQuery = " SELECT * FROM users Where ID = :EditID";
        $Statement = $Con -> prepare($SelectQuery);
        $Statement -> bindParam(":EditID", $EditID);
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