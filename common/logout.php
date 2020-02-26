<?php
require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/head.php');
require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/header.php');

$_SESSION = array();
session_destroy();

?>
<div class="container px-5 m-auto">
  <h3 class="text-center mb-5">ログアウトしました</h3>
  <div class="text-center">
    <a class="btn btn-outline-secondary btn-lg" href="https://htmlcssjavascript0716.com/lsst/login.php" role="button">ログイン画面へ</a>
  </div>
</div>
<?php require('footer.php'); ?>