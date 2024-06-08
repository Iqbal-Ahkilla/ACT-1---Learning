<?php
// checkout.php

include "connection/connection.php";

// Get the raw POST data
$data = json_decode(file_get_contents("php://input"), true);
$cartData = $data['cartData'];
$tableName = $data['table'];

$findTable = "SELECT id FROM tables WHERE table_name = '$tableName'";
$tableResult = mysqli_query($conn, $findTable);

if($tableResult->num_rows > 0){
    $row = $tableResult->fetch_assoc();
    $tableId = $row["id"];

    $sqlOrder = "INSERT INTO orders (table_id) VALUES ($tableId)";
    if(mysqli_query($conn, $sqlOrder)){
        $orderId = $conn->insert_id;

        foreach( $cartData AS $item ){
            $menu_id = $item["id"];
            $menu_quantity = $item["quantity"];

            $sqlItem = "INSERT INTO order_items (order_id, menu_id, quantity) VALUES ('$orderId', '$menu_id', '$menu_quantity')";
            mysqli_query($conn, $sqlItem);

            $sqlCheckBS = "SELECT * FROM best_sellers WHERE menu_id = $menu_id";
            $resultCheckBS = mysqli_query($conn, $sqlCheckBS);

            if($resultCheckBS->num_rows > 0){
                $sqlUpdateBestSeller = "UPDATE best_sellers SET number_of_sales = number_of_sales + $menu_quantity WHERE menu_id = $menu_id";
                mysqli_query($conn, $sqlUpdateBestSeller);
            } else{
                $sqlBestSeller = "INSERT INTO best_sellers (menu_id, number_of_sales) VALUES ('$menu_id', $menu_quantity)";
                mysqli_query($conn, $sqlBestSeller);
            }

        }

    }
}

$conn->close();
?>