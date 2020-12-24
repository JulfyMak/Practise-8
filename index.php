<?php
$n = 5;
$m = 10;
$arr = array();

for($i=0;$i<$n;$i++){
    $arr[$i] = array();
    for($j=0; $j<$m; $j++){
        $arr[$i][$j]=rand(0,10);
    }
}

echo '<table border="5" cellpadding="10"  align ="center" width="60%" height="60%">';

    for($i=0;$i<$n;$i++){
        echo "<tr>";
        for($j=0; $j<$m; $j++){
	        echo '<td align ="center">'.$arr[$i][$j].'</td>'; 
        }
    echo "</tr>";
    }
echo '</table>';

?>