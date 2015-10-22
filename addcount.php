<?php
require 'silentconnect.php';
$href = htmlspecialchars($_GET["href"]);
$update = $db->prepare("UPDATE links SET count = count+1 WHERE href ='".$href."'");
$result = $update->execute();
if (!$result) {
	throw new Exception($db->error);
}
?>