<?php
    $fs = true;
    $a = 0;
    $b = 0;

    do {
        if ($fs) {
            fwrite(STDOUT, '請輸入兩個數字:');
            $fs = false;
        }
        else {
            fwrite(STDOUT, '請重新輸入');
        }
        $num = trim(fgets(STDIN));
        $arr = explode(" ", $num);
        $a = $arr[0];
        $b = $arr[1];
    } while ($a === 0 || $b === 0);

    for ($i=1;$i<$a+1;$i++){
        for ($j=1;$j<$b+1;$j++){
            if ($i*$j>=10) {
                echo $i." x ".$j." = ".$i*$j." | ";
            } else {
                echo $i." x ".$j." = "." ".$i*$j." | ";
            } 
        };
        print(PHP_EOL);
    };

    ?>