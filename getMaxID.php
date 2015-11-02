<?php
require 'silentconnect.php';
$search = $db->prepare("SELECT * FROM links");
$r = $search->execute();
$search->store_result();
echo $search->num_rows;
$search->close();
?>