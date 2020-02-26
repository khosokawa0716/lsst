<?php
require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/head.php');
require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/header.php');
auth();
$product_id = $_GET["product_id"];
$productInfo = getProduct($product_id);
$product_name = $productInfo["product_name"];
$voltage = $productInfo["voltage"];
switch ($productInfo["manufacturer"]) {
  case 1:
    $manufacturer = "オリエンタルモーター";
    break;
  case 2:
    $manufacturer = "SMC";
    break;
}
$stroke = $productInfo["stroke"];
$trust = $productInfo["trust"];
$payload = $productInfo["payload"];
$max_speed = $productInfo["max_speed"];

$install = $_SESSION['install'];
$stroke = $_SESSION['stroke_s'];
$mass = $_SESSION['mass_s'];
$speed = $_SESSION['speed_s'];
$accTrust = $_SESSION['accTrust'];
?>
<div class="container my-auto">
    <h1 class="mt-5">選定結果</h1>
    <small class="text-muted">お疲れさまでした。ここまで見ていただいてありがとうございます。</small>
    <h3 class="mt-5">製品の仕様</h3>
    <dl class="row ml-2">
      <dt class="col-sm-2">品名：</dt>
        <dd class="col-sm-10"><?php echo $product_name; ?></dd>
      <dt class="col-sm-2">電圧：</dt>
        <dd class="col-sm-10"><?php echo $voltage; ?>&nbsp;[V]</dd>
      <dt class="col-sm-2">メーカー：</dt>
        <dd class="col-sm-10"><?php echo $manufacturer; ?></dd>
      <dt class="col-sm-2">ストローク：</dt>
        <dd class="col-sm-10"><?php echo $stroke; ?>&nbsp;[mm]</dd>
      <dt class="col-sm-2">推力：</dt>
        <dd class="col-sm-10"><?php echo $trust; ?>&nbsp;[N]</dd>
      <dt class="col-sm-2">可搬質量：</dt>
        <dd class="col-sm-10"><?php echo $payload; ?>&nbsp;[kg]</dd>
      <dt class="col-sm-2">最大速度：</dt>
        <dd class="col-sm-10"><?php echo $max_speed; ?>&nbsp;[mm/s]</dd>
    </dl>
    
    <h3 class="mt-5">運転条件</h3>
      <dl class="row ml-2">
      <dt class="col-sm-2">加速推力：</dt>
        <dd class="col-sm-10"><?php echo $accTrust; ?>&nbsp;[N]</dd>
      <dt class="col-sm-2">質量：</dt>
        <dd class="col-sm-10"><?php echo $mass; ?>&nbsp;[kg]</dd>
      <dt class="col-sm-2">速度：</dt>
        <dd class="col-sm-10"><?php echo $speed; ?>&nbsp;[mm/s]</dd>
    </dl>
    
    <h3 class="mt-5">判定</h3>
    <ul class="list-group">
    <li class="list-group-item">加速推力：<?php echo $accTrust; ?>&nbsp;[N]&nbsp;
    <h5 class="d-inline"><span class="badge badge-info">&nbsp;&#8806;&nbsp;</span></h5>
    &nbsp;推力：<?php echo $trust; ?>&nbsp;[N]&nbsp;<?php echo jadgeItem($accTrust,$trust); ?></li>
    <li class="list-group-item">質量：<?php echo $mass; ?>&nbsp;[kg]&nbsp;
    <h5 class="d-inline"><span class="badge badge-info">&nbsp;&#8806;&nbsp;</span></h5>
    &nbsp;可搬質量：<?php echo $payload; ?>&nbsp;[kg]&nbsp;<?php echo jadgeItem($mass,$payload); ?></li>
    <li class="list-group-item">速度：<?php echo $speed; ?>&nbsp;[mm/s]&nbsp;
    <h5 class="d-inline"><span class="badge badge-info">&nbsp;&#8806;&nbsp;</span></h5>
    &nbsp;最大速度：<?php echo $max_speed; ?>&nbsp;[mm/s]&nbsp;<?php echo jadgeItem($speed,$max_speed); ?></li>
    </ul>

    <div class="row">
      <div class="px-3 col-sm-4">
        <button class="btn btn-secondary btn-block mb-5 mt-4" type="button" onclick="history.back()">前のページへ戻る</button>
      </div>
      <div class="px-3 col-sm-4">
        <button class="btn btn-secondary btn-block mb-5 mt-4" type="button" onclick="location.href='https://htmlcssjavascript0716.com/lsst/selectAxis.php'">軸数選択へ戻る</button>
      </div>
      </div>
    </div>
<?php require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/footer.php'); ?>