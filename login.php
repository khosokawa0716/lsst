<?php 
require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/head.php');
require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/header.php');
$errMsg = array();


if ($_POST) {

$email = $_POST['email'];
$pass = $_POST['password'];

//require('function.php');

// 未入力でなければ、正しい値なのかをチェックする
if(validEmpty("emailOrPass",$email) && validEmpty("emailOrPass",$pass)){
  loginCheck("emailOrPass",$email,$pass);
}

if (!$errMsg) {
$_SESSION['email_s'] = $email;
header("Location: https://htmlcssjavascript0716.com/lsst/selectAxis.php");
}  // close_if_!$errMsg
}  // close_if_$_POST

?>
<div class="container px-5 my-auto">
  <form action="" method="POST" class="form-login">
  <img src="https://htmlcssjavascript0716.com/lsst/slider_img/logo.png" alt="ロゴ" width="100" class="d-block mx-auto">
  <div class="form-group mt-3">
    <label><span class="err"><?php if($errMsg){ echo $errMsg['emailOrPass']; } ?></span></label>
      <input placeholder="メールアドレス" class="form-control" type="text" name="email" value="<?php if($_POST){echo $email;}else{echo "guestUser@gmail.com";} ?>">
  </div>
  <div class="form-group">
<!--    <label>パスワード</label>-->
      <input placeholder="パスワード" class="form-control" type="password" name="password" value="<?php if($_POST){echo $password;}else{echo "guestUser";} ?>">
  </div>
      <button class="btn btn-lg btn-primary btn-block mt-4 mb-5" type="submit" name="submit">ログイン</button>
  </form>
</div>
<?php require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/footer.php'); ?>