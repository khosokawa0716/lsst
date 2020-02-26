<?php 

function dbConnect(){
$dsn = 'mysql:dbname=xxx;host=xxx;charset=utf8';
$user = 'xxx';
$password = 'xxx';
$options = array(
        // SQL実行失敗時に例外をスロー
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        // デフォルトフェッチモードを連想配列形式に設定
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // バッファードクエリを使う(一度に結果セットをすべて取得し、サーバー負荷を軽減)
        // SELECTで得た結果に対してもrowCountメソッドを使えるようにする
        PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
    );
// PDOオブジェクト生成
$dbh = new PDO($dsn, $user, $password, $options);
return($dbh);
}

define("ERR01", "入力されていません");
define("ERR02", "入力文字数が上限を超えています");
define("ERR03", "入力文字数が下限を下回っています");
define("ERR04", "Emailの形式ではありません");
define("ERR05", "そのEmailはすでに使用されています");
define("ERR06", "半角英数字以外の値が入力されています");
define("ERR07", "パスワードが正しくありません");
define("ERR08", "Emailかパスワードが正しくありません");
define("ERR09", "加速時間が位置決め時間の1/2を超えています。");
define("ERR10", "条件に一致する製品がありませんでした。");

function validEmpty($key, $str) {
  if($str && $str !== "") {
  return true; //今は使わないけれど、テストコードで使うかも
  } else {
    global $errMsg;
    $errMsg[$key] = ERR01;
    
    return false; //今は使わないけれど、テストコードで使うかも
  }
}

function validStrMaxLen($key,$str,$max) {
  if(mb_strlen($str) <= $max) {
    return true;
  } else {
    global $errMsg;
    $errMsg[$key] = ERR02;
    return false;
  }
}

function validStrMinLen($key,$str,$min) {
  if(mb_strlen($str) >= $min) {
    return true;
  } else {
    global $errMsg;
    $errMsg[$key] = ERR03;
    return false;
  }
}

function validEmail($email) {
  if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return true;
  } else {
    global $errMsg;
    $errMsg['email'] = ERR04;
    return false;
  }
}

function validDupEmail($email) {
  $dbh = dbConnect();
  $query = $dbh->prepare('SELECT * FROM users WHERE email = :email limit 1');
  $query->execute(array(':email' => $email));
  $result = $query->fetch();
  
  if($result === false) {
    return true;
  } else {
    global $errMsg;
    $errMsg['email'] = ERR05;
    return false;
  }
}

function validAlnum($key,$str) {
  if(ctype_alnum($str) && strlen($str) === mb_strlen($str, 'UTF-8')) {
    return true;
  } else {
    global $errMsg;
    $errMsg[$key] = ERR06;
    return false;
  }
}

function validPassRe($key,$pass,$passre) {
  if($pass === $passre) {
    return true;
  } else {
    global $errMsg;
    $errMsg[$key] = ERR07;
    return false;
  }
}

function loginCheck($key,$email,$pass ) {
  
  global $errMsg;
  $dbh = dbConnect();
  $query = $dbh->prepare('SELECT password FROM users WHERE email = :email');
  $query->execute(array(':email' => $email));
  $result = $query->fetch(PDO::FETCH_ASSOC);
  
  if($result === false) {
    $errMsg[$key] = ERR08;
    return false;
  } else if($pass === $result['password']) {
    return true;
  } else {
    $errMsg[$key] = ERR08;
    return false;
  }
}

function getUser($email) {
  $dbh = dbConnect();
  $query = $dbh->prepare('SELECT * FROM users WHERE email = :email limit 1');
  $query->execute(array(':email' => $email));
  $result = $query->fetch();
  return $result;
}

function auth(){
  if(!isset($_SESSION['email_s'])) {
  header("Location: https://htmlcssjavascript0716.com/lsst/login.php");
  }
}

function validAccTime($key,$posTime,$accTime){
  if($accTime <= $posTime / 2){
    return true;
  } else {
    global $errMsg;
    $errMsg[$key] = ERR09;
    return false;
  }
}

function searchProducts($key,$voltage,$manufacturer,$stroke,$start,$display ) {
  // product_name,stroke,trust,payload,max_speed
  global $errMsg;
  $dbh = dbConnect();
  $query = $dbh->prepare('SELECT product_id,product_name,stroke,trust,payload,max_speed FROM spec WHERE voltage = :voltage AND manufacturer = :manufacturer AND stroke = :stroke LIMIT '.$start.','.$display.'');
  $query->execute(array(':voltage' => $voltage, ':manufacturer' => $manufacturer, ':stroke' => $stroke));
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
//  var_dump($result);
  
  if($result === false) {
    $errMsg[$key] = ERR10;
    var_dump($errMsg);
    return false;
  } else {
//    var_dump($result);
    return $result;
  }
}

function jadgeItem($condition, $spec ) {
  if($condition <= $spec){
      return '<h5 class="d-inline"><span class="badge badge-success">&#9654;&nbsp;OK</span></h5>';
    } else {
      return '<h5 class="d-inline"><span class="badge badge-danger">&#9654;&nbsp;NG</span></h5>';
    }
}

function jadgeItems($condition1, $spec1, $condition2, $spec2, $condition3, $spec3 ) {
  if($spec1 >= $condition1 && $spec2 >= $condition2 && $spec3 >= $condition3){
      return '<span class="badge badge-success">OK</span>';
    } else {
      return '<span class="badge badge-danger">NG</span>';
    }
}

function getProduct($product_id) {
  $dbh = dbConnect();
  $query = $dbh->prepare('SELECT * FROM spec WHERE product_id = :product_id');
  $query->execute(array(':product_id' => $product_id));
  $result = $query->fetch();
  return $result;
}