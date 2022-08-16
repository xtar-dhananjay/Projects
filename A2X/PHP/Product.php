<?php

    include '../Config.php';
    $Limit = 4;
    if (isset($_GET['Page'])) {
        $Page = $_GET['Page'];
        if ($Page == '') {
            $Page = 0;
        }
            
        $SelectQuery = " SELECT * FROM product ORDER BY Pro_ID DESC LIMIT $Page, $Limit ";
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
    
  

    }

?>