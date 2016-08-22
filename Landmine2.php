<?php
$time1 = microtime(true);
$row = 60;
$col = 50;

//隨機產生40個從1 ~ 3000的炸彈
for($i = 0; $i < 1200; $i ++) {  //產生120個
    $bomb = rand(1,3000);  //產生1~3000的亂數
    for($j = 0; $j <= $i; $j ++) {  //檢查重覆
        if ($bomb == $bombNum[$j]){
            $bomb = rand(1,3000);  //如果重覆，重新產生亂數
            $j = 0;
        }
    }
    $bombNum[$i] = $bomb;  //寫入陣列
}

//產生陣列
$frame = [];
for ($i = 0; $i < 3000; $i ++) {
    $frame[] = "0";
}

//放入炸彈
for ($i = 0; $i < 1200; $i ++) {
    $where = $bombNum[$i];
        if ($frame[$where] == "0") {
            $frame[$where] = "M";
    }
}

//轉成二微陣列
$landmine = array_chunk($frame, $row);

//判斷上下左右
for ($m = 0; $m < $col; $m ++){
    for ($n = 0; $n < $row; $n ++){
        if ($landmine[$m][$n] === "M"){
            if ($landmine[$m][$n - 1] !== "M"){  //上
                $landmine[$m][$n - 1] ++;
            }
            if ($landmine[$m][$n + 1] !== "M"){  //下
                $landmine[$m][$n + 1] ++;
            }
            if ($landmine[$m - 1][$n] !== "M"){  //左
                $landmine[$m - 1][$n] ++;
            }
            if ($landmine[$m + 1][$n] !== "M"){  //右
                $landmine[$m + 1][$n] ++;
            }
            if ($landmine[$m - 1][$n - 1] !== "M"){  //左上
                $landmine[$m - 1][$n - 1] ++;
            }
            if ($landmine[$m - 1][$n + 1] !== "M"){  //左下
                $landmine[$m - 1][$n + 1] ++;
            }
            if ($landmine[$m + 1][$n - 1] !== "M"){  //右上
                $landmine[$m + 1][$n - 1] ++;
            }
            if ($landmine[$m + 1][$n + 1] !== "M"){ //右下
                $landmine[$m + 1][$n + 1] ++;
            }
        }
    }
}

//輸出
for ($m = 0; $m < $col; $m ++){
    for ($n = 0; $n < $row; $n ++){
        echo $landmine[$m][$n];
    }
    if ($m < $col - 1) {
        echo "N";
    }
}

echo "<hr>";
$time2 = microtime(true);
echo $time2 - $time1;
