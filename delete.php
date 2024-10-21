<?php
    include "connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $sql = "DELETE FROM `events` WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        if($stmt->affected_rows > 0){
            header('location: home.php');
            exit;
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $stmt->close();
    }
    header('location: home.php');
    exit;
?>