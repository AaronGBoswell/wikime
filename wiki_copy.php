<?php
require 'connect.php';
$id = htmlspecialchars($_GET["ID"]);
echo 'searching';
if ($search = $db->prepare("SELECT href FROM links WHERE id = ?;")) {
	$search->bind_param('i',$id);
}
echo 'searched';
$r = $search->execute();
$search->bind_results($href);
while($search->fetch()){
	echo $href;
}
echo 'printed results';
$search->close();
?>