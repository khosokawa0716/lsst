<?php
require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/head.php');
require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/header.php');
$errMsg = array();


if ($_POST) {

$name = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$passre = $_POST['retype'];
$created_date = date("Y-m-d H:i:s",time());

// 未入力でなければ、正しい値なのかをチェックする
if(validEmpty("name",$name)){
  validStrMaxLen("name",$name,10);
}

if(validEmpty("email",$email)) {
  validEmail($email);
  validDupEmail($email);
}

if(validEmpty("pass",$pass)) {
  validAlnum("pass",$pass);
  validStrMaxLen("pass",$pass,20);
  validStrMinLen("pass",$pass,6);
}

// 再入力は、パスワードが一致しているかどうかだけ
validPassRe("passre",$pass,$passre);

// var_dump($errMsg);

if (!$errMsg) {
$dbh = dbConnect();
// SQL文（クエリー）作成
$stmt = $dbh->prepare('INSERT INTO users (name,email,password,created_date) VALUES (:name,:email,:pass,:created_date)');

// プレースホルダに値をセット
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
$stmt->bindParam(':created_date', $created_date, PDO::PARAM_STR);

// SQL文実行
$stmt->execute();
$_SESSION['email_s'] = $email;
header("Location: ./selectAxis.php");
}  // close_if_!$errMsg
}  // close_if_$_POST

?>
<div class="container px-5 my-auto">
<form action="" method="POST" class="form-signin">
<img src="https://htmlcssjavascript0716.com/lsst/slider_img/logo.png" alt="ロゴ" width="100" class="d-block mx-auto">
  <div class="form-group mt-5">
    <label>お名前（10文字以内）<span class="err"><?php if(array_key_exists('name', $errMsg)){ echo $errMsg['name']; } ?></span>
     </label>
    <input class="form-control" type="text" name="username" value="<?php if($_POST){echo $name;} ?>">
  </div>
  <div class="form-group">
    <label>メールアドレス<span class="err"><?php if(array_key_exists('email', $errMsg)){ echo $errMsg['email']; } ?></span>
    </label>
    <input class="form-control" type="text" name="email" value="<?php if($_POST){echo $email;} ?>">
  </div>
  <div class="form-group">
    <label>パスワード<span class="err"><?php if(array_key_exists('pass', $errMsg)){ echo $errMsg['pass']; } ?></span>
    </label>
    <input class="form-control" type="password" name="password" placeholder="6〜20文字 半角英数字">
  </div>
    <p><span class="err"><?php if(array_key_exists('passre', $errMsg)){ echo $errMsg['passre']; } ?></span></p>
     <div class="form-group">
      <input class="form-control" type="password" name="retype" placeholder="再入力">
      </div>
      <button class="btn btn-lg btn-primary btn-block mt-4 mb-5" type="submit" name="submit">ユーザー登録</button>
    </form>
</div>
<?php require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/footer.php'); ?>