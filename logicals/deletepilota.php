<?php
    include 'includes/db_connect.php';

    $stmt = $conn->prepare('DELETE from pilota where az = :az');
    $stmt->execute(array(':az' => $_GET["id"]));

    echo "<script>window.location.href='index.php?oldal=tablazat';</script>";
        exit;
?>