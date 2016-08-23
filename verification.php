<?php

header("content-type: text/html; charset=utf-8");
$str = $_GET["map"];

$standard = "/^([0-8MN]+)$/";

$replaceN = str_replace("N","", $str);//去掉N
$frame = str_split($replaceN); //存為陣列
$landmine = array_chunk($frame, 10);  //轉成二維陣列
$explodeN = explode("N", $str);
for($i = 0; $i < 10; $i++) {
    $strNoN = $explodeN [$i];
}

if(strlen($str) != 109) {
    echo "字串長度應為109，目前字串長度為" . strlen($str) ."。";
}

if(strlen($strNoN) != 10) {
    echo "不是10*10的陣列。";
}

if(substr_count("$str","N") !=9) {
    echo "N的數量應為9個，目前N數量為" . substr_count("$str","N") ."。";
}

if(substr_count("$str","M") !=40) {
    echo "炸彈數目應為40個，目前炸彈數目是" . substr_count("$str","M") . "個。";
}

if(mb_strlen($str) == 109 && substr_count("$str","M") ==40 && substr_count("$str","N") ==9){
       $checkStr = 109;
    }

if(!preg_match($standard, $str, $value)) {
    echo "格式不正確，出現M/N及0-8以外的字元。";
}

if($checkStr == 109 ) {
    for ($m = 0; $m < 10; $m ++) {
        for ($n = 0; $n < 10; $n ++) {
            $count = 0;
            if ($landmine[$m][$n] !== "M"){
                if ($landmine[$m][$n - 1] === "M") {  //上
                    $count ++;
                }
                if ($landmine[$m][$n + 1] === "M") {  //下
                    $count ++;
                }
                if ($landmine[$m - 1][$n] === "M") {  //左
                    $count ++;
                }
                if ($landmine[$m + 1][$n] === "M") {  //右
                    $count ++;
                }
                if ($landmine[$m - 1][$n - 1] === "M") {  //左上
                    $count ++;
                }
                if ($landmine[$m - 1][$n + 1] === "M") {  //左下
                    $count ++;
                }
                if ($landmine[$m + 1][$n - 1] === "M") {  //右上
                    $count++;
                    }
                if ($landmine[$m + 1][$n + 1] === "M") { //右下
                    $count ++;
                }
                if ($landmine[$m][$n] != $count){
               echo "座標[" . $m . " , " . $n . "]" . "應為" . $count ."。" ;
            }
            }
        }
    }
}

if(mb_strlen($str) == 109 && substr_count("$str","M") == 40 && substr_count("$str","N") == 9 && $landmine[$m][$n] === $count ){
       echo "符合" ;
    }