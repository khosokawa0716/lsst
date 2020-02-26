<header class="navbar navbar-expand navbar-dark bg-dark">
<ul class="navbar-nav">

<?php
//session_cache_limiter('private_no_expire');
// XSEVERにアップすると以下ワーニングが出るためコメント化
// : session_cache_limiter(): Cannot change cache limiter when session is active in/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/header.php on line5
//session_start();
require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/function.php');
if(isset($_SESSION['email_s'])){
  $email = $_SESSION['email_s'];
  $userInfo = getUser($email);
?>

<li class="nav-item"><span class="navbar-text">
<?php echo $userInfo['name']."様" ?>
</span></li>
<li class="nav-item"><a class="nav-link" href="https://htmlcssjavascript0716.com/lsst/common/logout.php">ログアウト</a></li>
  
<?php }elseif($_SERVER["REQUEST_URI"] === "/lsst/login.php"){ ?>
 
<li class="nav-item"><a class="nav-link" href="signup.php">ユーザー登録</a></li>
  
<?php }else{ ?>

<li class="nav-item"><a class="nav-link" href="https://htmlcssjavascript0716.com/lsst/login.php">HOME</a></li>
  
<?php } ?>
</ul>
</header>