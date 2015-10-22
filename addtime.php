<?php
require 'silentconnect.php';
$href = htmlspecialchars($_GET["href"]);
$time = htmlspecialchars($_GET["time"]);
$update = $db->prepare("UPDATE links SET timeSpent = timeSpent+".$time." WHERE href ='".$href."'");
$result = $update->execute();
if (!$result) {
	throw new Exception($db->error);
}
?>