<?php 
require 'includes/connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the DELETE statement using PDO syntax
    $stmt = $conn->prepare("DELETE FROM tbl_admin WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
        header('Location:manage-admin.php');
        exit();
    } else {
        echo "Error deleting record: " . $stmt->errorInfo()[2];
    }
}
?>
