<?php
require 'connect.php';
require 'simple_html_dom.php';
$Url = 'https://www.reddit.com/r/wikipedia';

$str = '';
foreach(range(1,100) as $i){
    echo 'here';
    echo $i*25;
    echo $Url . '<br>';
    $html = file_get_html($Url); 


    foreach($html->find('a') as $element){
        $link =  $element->href;
        if(strpos($link,'wikipedia.org/wiki/') !== false){
            if(strpos($link,'m.wikipedia') === false)
                $link = substr_replace($link,'.m',strpos($link,'.wikipedia'),0);
            echo $link;
            if ($search = $db->prepare("SELECT * FROM wikime.links WHERE href = ?;")) {
                $search->bind_param('s',$link);
            }
            $result = $search->execute();
            $search->store_result();
            if (!$result) {
                throw new Exception($db->error);
            }
            if( $search->num_rows == 0 ){
                //mysqli_report(MYSQLI_REPORT_ALL);
    
                if ($insert = $db->prepare("INSERT INTO wikime.links (ID, href, count, timeSpent) values (NULL,?,0,0);")) {
    
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
        } elseif (strpos($link,'www.reddit.com/r/wikipedia/')){
            echo $link;
            $Url = $link;
            echo $Url;
        } 
    }
}
?>