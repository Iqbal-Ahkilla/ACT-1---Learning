<?php

include "php/connection/connection.php";

$sql = "SELECT * FROM tables";
$result = mysqli_query($conn, $sql);

$data = [];

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/table.css">
    <link rel="shortcut icon" href="../Resources/Icons/Java icon bg white.png" type="image/x-icon">
    <title>CAFE MOJO | Book Table</title>
</head>
<body>
    <div class="container">
        <a href="index.php" class="back">Back</a>
        <!-- <a href="design.html" class="order">Order</a> -->
        <h1>BOOK A TABLE</h1>
        <p class="title">__choose the table__</p>
        <div class="table__wrapper">
            <?php foreach($data AS $table) : ?>
                <a href="design.php?table=<?= $table["table_name"] ?>">
                    <div class="table">
                        <div class="table__icon">
                            <img src="../Resources/Icons/restaurant.png" alt="">
                        </div>
                        <h3><?= $table["table_name"] ?></h3>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>