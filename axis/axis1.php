<?php
require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/head.php');
require('/home/turedureblog/htmlcssjavascript0716.com/public_html/lsst/common/header.php');
auth();
?>
  <div class="container px-5 my-auto">
    <div class="px-3">
      <h1>設置方法選択</h1>
    </div>
    <div class="card-deck my-4 px-3">
      <div class="card shadow-sm col-sm">
        <img src="https://htmlcssjavascript0716.com/lsst/slider_img/horizontal.png" class="card-img-top" alt="水平">
        <div class="card-body text-center">
          <a href="https://htmlcssjavascript0716.com/lsst/condition/axis1.php?install=horizontal" class="btn btn-outline-primary btn-block">水平</a>
      </div>
      </div>
      <div class="card shadow-sm col-sm">
        <img src="https://htmlcssjavascript0716.com/lsst/slider_img/wallHanging.png" class="card-img-top" alt="壁掛け">
        <div class="card-body text-center">
          <a href="https://htmlcssjavascript0716.com/lsst/condition/axis1.php?install=wallHanging" class="btn btn-outline-primary btn-block">壁掛け</a>
        </div>
      </div>
      <div class="card shadow-sm col-sm">
        <img src="https://htmlcssjavascript0716.com/lsst/slider_img/vertical.png" class="card-img-top" alt="垂直">
        <div class="card-body text-center">
          <a href="https://htmlcssjavascript0716.com/lsst/condition/axis1.php?install=vertical" class="btn btn-outline-primary btn-block">垂直</a>
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