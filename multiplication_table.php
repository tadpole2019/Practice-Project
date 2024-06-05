<?php

for ($i=1;$i<10;$i++){
    for ($j=1;$j<10;$j++){
        if ($i*$j>=10) {
            echo $i." x ".$j." = ".$i*$j." | ";
        } else {
            echo $i." x ".$j." = "." ".$i*$j." | ";
        } 
    };
    print(PHP_EOL);
};

?>