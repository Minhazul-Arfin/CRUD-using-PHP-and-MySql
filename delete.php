<?php
    if(isset($_GET['id'])){
        $id = $_GET["id"];

        // Connecting to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "crud";

        // creating connection
        $connection = new mysqli($servername, $username, $password, $database);

        $sql = "delete from clients where id = $id";
        $connection -> query($sql);
    }

    header("location:/index.php");
    exit;

?>