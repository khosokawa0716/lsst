<?php
require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/head.php');
require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/header.php');
auth();
?>
    <div class="container px-5 my-auto">
    <div class="px-3">
      <h1>軸数選択</h1>
    </div>
    <div class="card-deck my-5 px-3">
      <div class="card shadow-sm col-sm">
        <img src="https://htmlcssjavascript0716.com/lsst/slider_img/axis1.png" class="card-img-top" alt="1軸">
        <div class="card-body text-center">
          <a href="https://htmlcssjavascript0716.com/lsst/axis/axis1.php" class="btn btn-outline-primary btn-block">1軸</a>
      </div>
      </div>
      <div class="card shadow-sm col-sm">
        <img src="https://htmlcssjavascript0716.com/lsst/slider_img/axis2_soon.png" class="card-img-top" alt="2軸">
        <div class="card-body text-center">
          <a href="#top" class="btn btn-dark btn-block">2軸</a>
        </div>
      </div>
      <div class="card shadow-sm col-sm">
        <img src="https://htmlcssjavascript0716.com/lsst/slider_img/axis3_soon.png" class="card-img-top" alt="3軸">
        <div class="card-body text-center">
          <a href="#top" class="btn btn-dark btn-block">3軸</a>
        </div>
      </div>
    </div>
    <div class="row">
    <div class="px-3 col-sm-4">
      <button class="btn btn-secondary btn-block mb-5 mt-4 mx-3" type="button" onclick="history.back()">前のページへ戻る</button>
    </div>
    </div>
    </div>
<?php require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/footer.php'); ?>