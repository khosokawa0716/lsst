<?php
require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/head.php');
require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/header.php');
auth();
$errMsg = array();
//var_dump($errMsg);

$install = $_GET["install"];
//var_dump($install);

if($_POST){

$stroke = $_POST['stroke'];
$mass = $_POST['mass'];
$distance = $_POST['distance'];
$posTime = $_POST['posTime'];
$accTime = $_POST['accTime'];
$speed = $_POST['speed'];
$accTrust = $_POST['accTrust'];

validEmpty('empty', $stroke);
validEmpty('empty', $mass);
validEmpty('empty', $distance);
validEmpty('empty', $posTime);
validEmpty('empty', $accTime);
validEmpty('empty', $speed);
validEmpty('empty', $accTrust);

validAccTime('accTime',$posTime,$accTime);

  if(!$errMsg){
    $_SESSION['install'] = $install;
    $_SESSION['stroke_s'] = $stroke;
    $_SESSION['mass_s'] = $mass;
    $_SESSION['distance_s'] = $distance;
    $_SESSION['posTime'] = $posTime;
    $_SESSION['accTime_s'] = $accTime;
    $_SESSION['speed_s'] = $speed;
    $_SESSION['accTrust'] = $accTrust;
    header("Location: https://htmlcssjavascript0716.com/lsst/select/axis1.php");
  }
} // close_if_$_POST['
?>
<div class="container my-auto">
  <h1>運転条件入力</h1>
    
  <form action="" method="post" name="conditionForm">
    <label><span class="err"><?php if(array_key_exists('empty', $errMsg)){ echo $errMsg['empty']; } ?></span></label>
      
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">ストローク:</label>
      <div class="col-sm-4">
        <input class="form-control text-right" type="number" step="50" min="50" max="300" value="<?php echo array_key_exists('stroke', $_POST) ? $stroke : 300 ?>" name="stroke">
      </div>
      <label class="col-sm-2 col-form-label">mm</label>
    </div>
      
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">ワークの質量:</label>
      <div class="col-sm-4">
        <input class="form-control text-right" type="number" step="0.01" min="0" max="50" value="<?php echo array_key_exists('mass', $_POST) ? $mass : 10 ?>" name="mass">
      </div>
      <label class="col-sm-2 col-form-label">kg</label>
    </div>
      
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">位置決め距離:</label>
      <div class="col-sm-4">
        <input class="form-control text-right" type="number" step="1" min="1" max="100" value="<?php echo array_key_exists('distance', $_POST) ? $distance : 100 ?>" name="distance">
      </div>
      <label class="col-sm-2 col-form-label">mm</label>
    </div>
      
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">位置決め時間:</label>
      <div class="col-sm-4">
        <input class="form-control text-right" type="number" step="0.01" min="0.2" max="10" value="<?php echo array_key_exists('posTime', $_POST) ? $posTime : 1.2 ?>" name="posTime">
      </div>
      <label class="col-sm-2 col-form-label">s</label>
    </div>
      
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">加減速時間:</label>
      <div class="col-sm-4">
        <input class="form-control text-right" type="number" step="0.01" min="0.1" max="5" value="<?php echo array_key_exists('accTime', $_POST) ? $accTime : 0.1 ?>" name="accTime">
      </div>
      <label class="col-sm-2 col-form-label">s</label>
      <small class="form-text err"><?php if(array_key_exists('accTime', $errMsg)){ echo $errMsg['accTime']; } ?></small>
      <small class="form-text text-muted">加減速時間は、位置決め時間の1/2以下にしてください。</small>
    </div>
      
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">速度:</label>
      <div class="col-sm-4">
        <input class="form-control text-right" type="text" readonly name="speed" value="<?php echo array_key_exists('speed', $_POST) ? $speed : 0 ?>">
      </div>
      <label class="col-sm-2 col-form-label">mm/s</label>
    </div>
      
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">加速推力:</label>
      <div class="col-sm-4">
        <input class="form-control text-right" type="text" readonly name="accTrust" value="<?php echo array_key_exists('accTrust', $_POST) ? $accTrust : 0 ?>">
      </div>
      <label class="col-sm-2 col-form-label">N</label>
    </div>
    <div class="row">
      <div class="px-3 col-sm-4">
        <button class="btn btn-secondary btn-block mb-1 mb-sm-5 mt-4" type="button" onclick="history.back()">前のページへ戻る</button>
      </div>
      <div class="px-3 col-sm-4">
        <button class="btn btn-info btn-block mb-1 mb-sm-5 mt-1 mt-sm-4" type="button" onclick="clickCalcBtn()">計算</button>
      </div>
      <div class="px-3 col-sm-4">
        <button class="btn btn-primary btn-block mb-5 mt-1 mt-sm-4" type="submit" name="submit">次へ</button>
      </div>
    </div>
    </form>
</div>
<?php require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/footer.php'); ?>