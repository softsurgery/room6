<?php
function connect(){
    $com = new mysqli("localhost", "root", "", "Monitor");
    if ($com->error == null) {
        // echo "<script>console.log('DB connected')</script>";
        return $com;
    } else echo "<script>console.log('DB failed')</script>";
    return null;
}

?>