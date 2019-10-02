<?php
//共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}
// DB接続
function db_conn(){
    try {
      //Password:MAMP='root',XAMPP=''
      //hostは本番レンタルサーバのアドレスに変更する=データベースサーバ（今は、自分のPC上なのでlocalhost。。）
      return new PDO('mysql:dbname=gs_hw;charset=utf8;host=localhost','root','root');
      // $pdo = new PDO('mysql:dbname=********;charset=utf8;host=localhost','******ユーザー名 MAMPは両方root','******パスワード');
      
    } catch (PDOException $e) {
      exit('DB Connection Error:'.$e->getMessage());
      // exit('********:'.$e->getMessage()); 接続設定が間違っているかの確認ができる exit()というのは止める関数'文字を入れられる'
    }
    }

//SQL error
 function sql_error(){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
    }

    // redirect関数
    function redirect($file_name){
        header("Location:".$file_name);  //:の後に半角入れる
        exit(); //止める
      }