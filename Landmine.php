<?php

//隨機產生40個從1 ~ 100個炸彈
for($i = 0; $i < 40; $i ++) {  //產生40個
    $bomb = rand(1,100);  //產生1~100的亂數
    for($j = 0; $j <= $i; $j ++) {  //檢查重覆
        if ($bomb == $bombNum[$j]){
            $bomb = rand(1,100);  //如果重覆，重新產生亂數
            $j = 0;
        }
    }
    $bombNum[$i] = $bomb;  //寫入陣列
}

//產生陣列
$frame = [];
for ($i = 0; $i < 100; $i ++) {
    $frame[] = "0";
}

//放入炸彈
for ($i = 0; $i < 40; $i ++) {
    $where = $bombNum[$i];
        if ($frame[$where] == "0") {
            $frame[$where] = "M";
    }
}

//轉成二微陣列
$landmine = array_chunk($frame,10);

//判斷上下左右
for ($m = 0; $m < 10; $m ++){
    for ($n = 0; $n < 10; $n ++){
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
for ($m = 0; $m < 10; $m ++){
    for ($n = 0; $n < 10; $n ++){
        echo $landmine[$m][$n];
    }
    if ($m < 9) {
        echo "N";
    }
}
