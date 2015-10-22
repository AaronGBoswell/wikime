<?php
require 'connect.php';
$id = htmlspecialchars($_GET["ID"]);
if ($search = $db->prepare("SELECT href FROM links WHERE id = ?;")) {
	$search->bind_param('i',$id);
}
$r = $search->execute();
$search->bind_results($href);
while($search->fetch()){
	echo $href;
}
$search->close();

}
?>