<?php
$conn->close();
if ($conn->connect_errno) {
    $msg = 'disconnection failed: ' . $conn->connect_error;
    echo "<script>console.log(".$msg.")</script>";
    
} else {
    echo "<script>console.log('Disconnected')</script>";
}
?>