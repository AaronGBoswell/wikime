<?php
require 'silentconnect.php';
$search = $db->prepare("SELECT * FROM interestingLinks");
$r = $search->execute();
$search->store_result();
echo $search->num_rows;
$search->close();
?>