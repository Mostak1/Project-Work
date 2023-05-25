<?php
require 'connection.php';
if (isset($_GET['term'])){
	

	$sql = "SELECT id,name FROM products WHERE name LIKE '%" . $_GET['term'] . "%'";
	$return_arr = array();
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
		$return_arr[] = array(
			'label' => $row['name'],
			'value' => $row['name'],
			'id' => $row['id'],
			
		);
	}
    echo json_encode($return_arr);
}
?>