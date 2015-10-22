<?php
require 'connect.php';
$id = htmlspecialchars($_GET["ID"]);
echo 'searching';
$search = $db->prepare("SELECT href FROM links WHERE ID = ".$id.";");
echo 'searched';
$r = $search->execute();
echo 'results:'. $search->num_rows;
$search->bind_results($href);
while($search->fetch()){
	echo $href;
}
echo 'printed results';
$search->close();
?>