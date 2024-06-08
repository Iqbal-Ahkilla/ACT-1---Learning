<?php

include "connection/connection.php";

$sql = "SELECT * FROM best_sellers ORDER BY number_of_sales DESC LIMIT 3 ";
$resultSql = mysqli_query($conn, $sql);

$data = [];

if($resultSql->num_rows > 0){
    while($row = $resultSql->fetch_assoc()){
        $menu_id = $row["menu_id"];
        $nos = $row["number_of_sales"];

        $sqlMenus = "SELECT * FROM menus WHERE id = $menu_id";
        $resultMenus = mysqli_query($conn, $sqlMenus);

        if($resultMenus->num_rows > 0){
            while($r = $resultMenus->fetch_assoc()){
                $data[] = $r;
            }
        }

    }
}

echo json_encode($data);

$conn->close();

?>