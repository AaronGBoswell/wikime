<?php
require 'connect.php';
$id = htmlspecialchars($_GET["ID"]);
echo 'searching: '.$id;
$search = $db->prepare("SELECT href FROM links WHERE ID = 1;");
echo 'searched';
$r = $search->execute();
echo 'results:'. $search->num_rows;
$search->bind_result($href);
while($search->fetch()){
	echo $href;
}
echo 'printed results';
$search->close();
?>