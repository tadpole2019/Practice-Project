<?php
    $fs = true;
    $a = [];

    do {
        if ($fs) {
            fwrite(STDOUT, '請輸入兩個數字:');
            $fs = false;
        }
        else {
            fwrite(STDOUT, '請重新輸入');
        }

        $a = trim(fgets(STDIN));

    } while ($a === 0 or $b === 0);

    echo [$a, $b];

    ?>