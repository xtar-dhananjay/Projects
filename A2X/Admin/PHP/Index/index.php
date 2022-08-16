<?php

    include '../Config.php';
    session_start();

    if (isset($_POST['Username']) and isset($_POST['Password'])) {
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];

        $SelectQuery = " SELECT * FROM `users` Where Username = :Username";
        $Statement = $Con -> prepare($SelectQuery);
        $Statement -> bindParam(":Username", $Username);
        $Statement -> execute();
        $Data = $Statement -> fetch(PDO::FETCH_ASSOC);
        if ($Statement -> rowCount() > 0) {

            
            if (md5($Password) == $Data['Password']) {
                $_SESSION['UserImg'] = $Data['Img'];
                $_SESSION['UserRole'] = $Data['Role'];
                echo json_encode(array('Status' => 'Loagin Successfully'));
            }else{
                echo json_encode(array('Status' => 'vaild details'));
            }

        }else{
            echo json_encode(array('Status' => 'vaild details'));
        }

    }

?>