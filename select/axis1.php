<?php
require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/head.php');
require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/header.php');
auth();

$errMsg = array();

$install = $_SESSION['install'];
$stroke = $_SESSION['stroke_s'];
$mass = $_SESSION['mass_s'];
$speed = $_SESSION['speed_s'];
$accTrust = $_SESSION['accTrust'];

//echo "設置方法：".$install."<br>";
//echo "ストローク：".$stroke."[mm]<br>";
//echo "ワークの質量：".$mass."[kg]<br>";
//echo "運転速度：".$speed."[mm/s]<br>";
//echo "加速推力：".$accTrust."[N]";

$display = 5; //1ページあたりに表示する件数。GETで検索をおこなう前に空のテーブルを生成するためにif ($_GET)の外に出した

//var_dump($_GET);

if ($_GET) {

$voltage = $_GET['voltage'];
$manufacturer = $_GET['manufacturer'];

// ページングの処理
$page = $_GET['page'];
if($page == ''){
  $page = 1;
}
$page = max($page, 1); // 1より小さければ、1が返る

// 最終ページを取得する
$dbh = dbConnect();
$query = $dbh->prepare('SELECT COUNT(*) AS cnt FROM spec WHERE voltage = :voltage AND manufacturer = :manufacturer AND stroke = :stroke');
$query->execute(array(':voltage' => $voltage, ':manufacturer' => $manufacturer, ':stroke' => $stroke));
$result = $query->fetch();
//var_dump("result_cnt",$result['cnt']);
if ($result['cnt'] === "0") { //文字列型の0であることに注意する
  $maxPageCount = 1; 
  } else {
  $maxPageCount =  $result['cnt'];
  }
//var_dump("maxPageCount",$maxPageCount);
$maxPage = ceil($maxPageCount / $display);

$page = min($page, $maxPage);
//var_dump($page);

//$maxpageはpageが0にならないように最小1としている。
$maxPageExist0 = (int)ceil($result['cnt'] / $display);

$start = ($page - 1) * $display;//SQL文のOFFSET

$dbSearchResult = searchProducts("noProduct",$voltage,$manufacturer,$stroke,$start,$display );

} // if ($_GET)

?>
<div class="container my-auto">
  <h1 class="mt-5">スライダ選択</h1>
  <h3 class="mt-5">製品分類</h3>
  <form method="get" name="" action="" class="mt-3">
    <div class="form-group row">
      <label class="col-sm-1 col-form-label">電圧:</label>
        <div class="col-sm-4">
          <select name="voltage" class="form-control">
            <option value="">選択してください</option>
              <option value="AC100V" <?php if($_GET['voltage'] === "AC100V" ){echo "selected";} ?>>AC100V</option>
              <option value="DC24V" <?php if($_GET['voltage'] === "DC24V" ){echo "selected";} ?>>DC24V</option>
          </select>
        </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-1 col-form-label">メーカー:</label>
        <div class="col-sm-4">
          <select name="manufacturer" class="form-control">
            <option value="">選択してください</option>
            <option value="1" <?php if($_GET['manufacturer'] === "1" ){echo "selected";} ?>>オリエンタルモーター</option>
            <option value="2" <?php if($_GET['manufacturer'] === "2" ){echo "selected";} ?>>SMC</option>
          </select>
        </div>
    </div>
    <div class="row">
      <div class="col-4 px-3">
        <button class="btn btn-primary btn-block mb-5 mt-1" type="submit">検索</button>
      </div>
    </div>
<!--      <input type="submit" value="検索">-->
      <h3 class="mt-3">検索結果：
      <?php if($_GET){ echo $result['cnt']; }else{echo "-"; } ?>
      件</h3>
      <p>品名をクリックすると、選定結果が表示されます。</p>
<div class="table-responsive-md">
<table class="table table-striped table-bordered table-hover text-center">
<thead class="thead-dark">
  <tr>
    <th scope="col">品名</th>
    <th scope="col">ストローク</th>
    <th scope="col">推力</th>
    <th scope="col">可搬質量</th>
    <th scope="col">最大速度</th>
    <th scope="col">速度判定</th>
  </tr>
</thead>
<?php 
  if($_GET && $result['cnt'] !== "0"){
    foreach ($dbSearchResult as $value) {
      echo "<tr>\n";
        echo "<th class="."text-left"." scope="."row"."><a class="."text-decoration-none"." href="."https://htmlcssjavascript0716.com/lsst/resultCalc/axis1.php?product_id=".$value['product_id'].">".$value['product_name']."</a></th>\n";
        echo "<td>".$value['stroke']."</td>\n";
        echo "<td>".$value['trust']."</td>\n";
        echo "<td>".$value['payload']."</td>\n";
        echo "<td>".$value['max_speed']."</td>\n";
        echo "<td>".jadgeItems($accTrust,$value['trust'],$mass,$value['payload'],$speed,$value['max_speed'])."</td>\n";
      echo "</tr>\n";
      } // foreach
    } else {
    for ($i = 1; $i <= $display; $i++){
      echo "<tr><th scope="."row".">-</th><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>";
    }
    }// if ($_GET)
?>
</table>
</div>
<?php require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/select/pageNation.php'); ?>
    <div class="row">
      <div class="px-3 col-sm-4">
        <button class="btn btn-secondary btn-block mb-5 mt-4" type="button" onclick="history.back()">前のページへ戻る</button>
      </div>
      </div>
    </form>
</div>
<?php require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/footer.php'); ?>