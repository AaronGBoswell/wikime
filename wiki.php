<?php
require 'connect.php';
require 'simple_html_dom.php';
$Url = 'https://www.reddit.com/r/wikipedia';

foreach(range(1,2) as $i){
    echo 'here';
    echo $i*25;
    echo $Url . '<br>';
    $html = file_get_html($Url); 
	echo $html;

    foreach($html->find('a') as $element){
        $link =  $element->href;
        echo $link . '<br>';
        if(strpos($link,'wikipedia.org/wiki/')){
            if(strpos($link,'m.wikipedia') === false)
                $link = substr_replace($link,'.m',strpos($link,'.wikipedia'),0);
            echo $link;
            echo "1";
            if ($search = $db->prepare("SELECT * FROM links WHERE href = ?;")) {
                $search->bind_param('s',$link);
            }
          	echo "2";

            $result = $search->execute();
            echo "3";

            $search->store_result();
            echo "4";

            if (!$result) {
                throw new Exception($db->error);
            }
            echo "5";

            if( $search->num_rows == 0 ){
            echo "6";
                //mysqli_report(MYSQLI_REPORT_ALL);
echo "7";
                if ($insert = $db->prepare("INSERT INTO links (ID, href, count, timeSpent) values (NULL,?,0,0);")) {
    
                    $insert->bind_param('s',$link);
                }else{
                    echo '<br> prep failedd <br>';
    
                }
                echo "8";
                $result = $insert->execute();
                echo "9";
                $insert->store_result();
    echo "10";
                if (!$result) {
                    throw new Exception($db->error);
                }else{
                    echo 'inserted <br>';
                }
                 echo "20";  
    
            }else{
                echo 'already found <br>';
            }
        } elseif (strpos($link,'www.reddit.com/r/wikipedia/')){
            $Url = $link;
            echo $Url.'<br>';
        }
    }
}
?>