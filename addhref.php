<?php
require 'silentconnect.php';
$Url = 'https://www.reddit.com/r/wikipedia';
$link = htmlspecialchars($_GET["href"]);
if(strpos($link,'wikipedia.org/wiki/')){
	if(strpos($link,'m.wikipedia') === false)
        $link = substr_replace($link,'.m',strpos($link,'.wikipedia'),0);
    if ($search = $db->prepare("SELECT * FROM links WHERE href = ?;")) {
        $search->bind_param('s',$link);
    }
    $result = $search->execute();
    $search->store_result();
    if (!$result) {
        throw new Exception($db->error);
    }
    if( $search->num_rows == 0 ){
        //mysqli_report(MYSQLI_REPORT_ALL);
        if ($insert = $db->prepare("INSERT INTO links (ID, href, count, timeSpent) values (NULL,?,0,0);")) {
            $insert->bind_param('s',$link);
        }else{
            echo '<br> prep failedd <br>';
        }
        $result = $insert->execute();
        $insert->store_result();
        if (!$result) {
            throw new Exception($db->error);
        }else{
            echo 'inserted <br>';
        }
    
    }else{
        echo 'already found <br>';
    }
}

?>