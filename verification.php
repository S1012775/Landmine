<?php

header("content-type: text/html; charset=utf-8");
$str = $_GET["map"];

echo "您輸入的字串:".$str . "<br>";
echo $msg =verificationStr($str) . "<br>";

// verificationCount($str);





function verificationStr($str)
{

    if(!is_string($str)) {
        $msg = "請輸入字串";
    }

    $a =explode("N",$str);
    for($i = 0; $i < 10; $i++) {
        $b = $a [$i];
    }

    if(substr_count("$str","N") !=9) {
        $msg =  "不是10*10的陣列2";
    }
    if(strlen($b) != 10) {
        $msg =  "不是10*10的陣列1";
    }

    if(substr_count("$str","M") !=40) {
        $msg =  "炸彈數目不正確";
    }
    else {
        $checkStr == true ;
        $msg = "字串符合條件";
    }

    return $msg;
}

// function verificationCount($str)
// {
    // if($checkStr == true ) {
        $replaceN = str_replace("N","","$str");//去掉N
        $frame = str_split($replaceN);
        $landmine = array_chunk($frame,10);  //轉成二維陣列

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
                   echo "<br>" . "[" . $m . " , " . $n . "]" . " 判斷錯誤，應該為" . $count . "<br>";
                }
                }
            }
        }
    // }
// }

