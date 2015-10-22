<?php
require 'connect.php';
require 'simple_html_dom.php';
$id = htmlspecialchars($_GET["ID"])
if ($search = $db->prepare("SELECT * FROM links WHERE id = ?;")) {
	$search->bind_param('i',$id);
}
$r = $search->execute();
if (!$r) {
	throw new Exception($db->error);
}
$result->get_result();

echo $result[0][0]
}
?>