<?php
require 'silentconnect.php';
$id = htmlspecialchars($_GET["ID"]);
$id = ($id-1)*10 + 1;
if ($search = $db->prepare("SELECT href FROM links WHERE ID = ?;")) {
	$search->bind_param('i',$id);
}
$r = $search->execute();
$search->bind_result($href);
while($search->fetch()){
	echo $href;
}
$search->close();
?>