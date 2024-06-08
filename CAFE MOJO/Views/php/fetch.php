<?php

include "connection/connection.php";

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$recordsPerPage = 8;
$offset = ($page - 1) * $recordsPerPage;

$category = isset($_GET['category']) ? $_GET['category'] : 'food';

$sql = "SELECT COUNT(*) as count FROM menus WHERE menu_category='$category'";
$result = $conn->query($sql);
$totalRecords = $result->fetch_assoc()['count'];
$totalPages = ceil($totalRecords / $recordsPerPage);

$sql = "SELECT * FROM menus WHERE menu_category='$category' ORDER BY menu_name ASC LIMIT $offset, $recordsPerPage";
$result = $conn->query($sql);

$records = array();
while ($row = $result->fetch_assoc()) {
    $records[] = $row;
}

echo json_encode(array(
    'totalPages' => $totalPages,
    'records' => $records
));

$conn->close();
?>
