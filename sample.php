<?php
    //変数resultの中身を「無し」にする
    $result = '無し';
    
    //post配列のactという箱に値が入っていれば，omikuji()関数を呼び出してその返り値をresultに代入する
    if (array_key_exists('act', $_POST)) {
        $result = omikuji();
    }
    
    //omikuji関数を定義
    function omikuji() {
        //fortuneという配列に各値を入れておく
        $fortune = ["大吉", "吉", "中吉", "小吉", "末吉", "凶"];
        //random_int($min, $max)は$min 以上 $max 以下のランダムな整数を返す関数（PHPがすでに持っている関数)
        //$fortune[]の[]内は，配列の何番目の値を取り出すかに上記関数を使っている
        //最上の値が0で最大の値が，$fortuneの配列の個数-1である。
        //これらをランダムで選び返り値として返す
        return $fortune[random_int(0, count($fortune) - 1)];
    }
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>おみくじ</title>
    </head>
    <body>
        
        <!--POST配列のact箱にdrawが入っている確認-->
        <?php //print_r($_POST['act']); ?>
        
        <h1>おみくじ</h1>
        <!--おみくじの結果とし$resultを表示-->
        <p>おみくじの結果：<?php print htmlspecialchars($result, ENT_QUOTES, "UTF-8"); ?></p>
        <form action="sample.php" method="POST">
            <!--このボタンを押すことで，POST配列のact箱にdrawが入る-->
            <button type="submit" name="act" value="draw">おみくじをひく！</button>
        </form>
    </body>
</html>