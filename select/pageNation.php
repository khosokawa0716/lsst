<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">
<?php 

if($_GET) {

$page = (int)$page; //GETで取ってきたパラメータはstring型なので、int型にしてから使う

// 現在のページが2以上だったら
if($page > 1){
?>
<li class="page-item">
<a class="page-link" href="axis1.php?voltage=<?php echo $voltage; ?>&manufacturer=<?php echo $manufacturer; ?>&page=1">&laquo;</a>
</li>
<li class="page-item">
<a class="page-link" href="axis1.php?voltage=<?php echo $voltage; ?>&manufacturer=<?php echo $manufacturer; ?>&page=<?php print($page -1); ?>">&lsaquo;</a>
</li>

<?php }
//$maxpageはpageが0にならないように最小1としている。
//$maxpageExist0は、純粋なページ数。検索結果が0なら0が入っている。int型にしてある
//リストの数を最大で5つにしたいので、ページ数が0,1,2,3,4,5以上の6caseに分ける
switch ($maxPageExist0) {
    case 0:
      echo '<li class="page-item"></li>';
      break;
      
    case 1:
      echo '<li class="page-item"></li>';
      break;
      
    case 2:
      if ($page === 1) {
        for ($i = 1; $i <= 2; $i++) {
          $pageNation = $page - 1 + $i;
          if ($i === 1) {
                      echo '<li class="page-item active" aria-current="page"><a class="page-link" href="#">'.$pageNation.'<span class="sr-only">(current)</span></a></li>';
                      } else {
                      echo '<li class="page-item"><a class="page-link" href='.'axis1.php?voltage='.$voltage.'&manufacturer='.$manufacturer.'&page='.$pageNation.'>'.$pageNation.'</a></li>';
                      }
          } //for
      } elseif ($page === 2){
        for ($i = 1; $i <= 2; $i++) {
          $pageNation = $page - 2 + $i;
          if ($i === 2) {
                      echo '<li class="page-item active" aria-current="page"><a class="page-link" href="#">'.$pageNation.'<span class="sr-only">(current)</span></a></li>';
                      } else {
                      echo '<li class="page-item"><a class="page-link" href='.'axis1.php?voltage='.$voltage.'&manufacturer='.$manufacturer.'&page='.$pageNation.'>'.$pageNation.'</a></li>';
                      }
          } //for
      }
      break;
      
    case 3:
      if ($page === 1) {
        for ($i = 1; $i <= 3; $i++) {
          $pageNation = $page - 1 + $i;
          if ($i === 1) {
                      echo '<li class="page-item active" aria-current="page"><a class="page-link" href="#">'.$pageNation.'<span class="sr-only">(current)</span></a></li>';
                      } else {
                      echo '<li class="page-item"><a class="page-link" href='.'axis1.php?voltage='.$voltage.'&manufacturer='.$manufacturer.'&page='.$pageNation.'>'.$pageNation.'</a></li>';
                      }
          } //for
      } elseif ($page === 2){
        for ($i = 1; $i <= 3; $i++) {
          $pageNation = $page - 2 + $i;
          if ($i === 2) {
                      echo '<li class="page-item active" aria-current="page"><a class="page-link" href="#">'.$pageNation.'<span class="sr-only">(current)</span></a></li>';
                      } else {
                      echo '<li class="page-item"><a class="page-link" href='.'axis1.php?voltage='.$voltage.'&manufacturer='.$manufacturer.'&page='.$pageNation.'>'.$pageNation.'</a></li>';
                      }
          } //for
      } elseif ($page === 3){
        for ($i = 1; $i <= 3; $i++) {
          $pageNation = $page - 3 + $i;
          if ($i === 3) {
                      echo '<li class="page-item active" aria-current="page"><a class="page-link" href="#">'.$pageNation.'<span class="sr-only">(current)</span></a></li>';
                      } else {
                      echo '<li class="page-item"><a class="page-link" href='.'axis1.php?voltage='.$voltage.'&manufacturer='.$manufacturer.'&page='.$pageNation.'>'.$pageNation.'</a></li>';
                      }
          } //for
      }
      break;
      
    case 4:
      if ($page === 1) {
        for ($i = 1; $i <= 4; $i++) {
          $pageNation = $page - 1 + $i;
          if ($i === 1) {
                      echo '<li class="page-item active" aria-current="page"><a class="page-link" href="#">'.$pageNation.'<span class="sr-only">(current)</span></a></li>';
                      } else {
                      echo '<li class="page-item"><a class="page-link" href='.'axis1.php?voltage='.$voltage.'&manufacturer='.$manufacturer.'&page='.$pageNation.'>'.$pageNation.'</a></li>';
                      }
          } //for
      } elseif ($page === 2){
        for ($i = 1; $i <= 4; $i++) {
          $pageNation = $page - 2 + $i;
          if ($i === 2) {
                      echo '<li class="page-item active" aria-current="page"><a class="page-link" href="#">'.$pageNation.'<span class="sr-only">(current)</span></a></li>';
                      } else {
                      echo '<li class="page-item"><a class="page-link" href='.'axis1.php?voltage='.$voltage.'&manufacturer='.$manufacturer.'&page='.$pageNation.'>'.$pageNation.'</a></li>';
                      }
          } //for
      } elseif ($page === 3){
        for ($i = 1; $i <= 4; $i++) {
          $pageNation = $page - 3 + $i;
          if ($i === 3) {
                      echo '<li class="page-item active" aria-current="page"><a class="page-link" href="#">'.$pageNation.'<span class="sr-only">(current)</span></a></li>';
                      } else {
                      echo '<li class="page-item"><a class="page-link" href='.'axis1.php?voltage='.$voltage.'&manufacturer='.$manufacturer.'&page='.$pageNation.'>'.$pageNation.'</a></li>';
                      }
          } //for
      } elseif ($page === 4){
        for ($i = 1; $i <= 4; $i++) {
          $pageNation = $page - 4 + $i;
          if ($i === 4) {
                      echo '<li class="page-item active" aria-current="page"><a class="page-link" href="#">'.$pageNation.'<span class="sr-only">(current)</span></a></li>';
                      } else {
                      echo '<li class="page-item"><a class="page-link" href='.'axis1.php?voltage='.$voltage.'&manufacturer='.$manufacturer.'&page='.$pageNation.'>'.$pageNation.'</a></li>';
                      }
          } //for
      }
      break;
      
    case $maxPageExist0 >= 5: //5ページ以上のときの処理
      if ($page === 1) {
//        var_dump("pageが1のときの処理に入っている");
        for ($i = 1; $i <= 5; $i++) {
          $pageNation = $page - 1 + $i;
          if ($i === 1) {
                      echo '<li class="page-item active" aria-current="page"><a class="page-link" href="#">'.$pageNation.'<span class="sr-only">(current)</span></a></li>';
                      } else {
                      echo '<li class="page-item"><a class="page-link" href='.'axis1.php?voltage='.$voltage.'&manufacturer='.$manufacturer.'&page='.$pageNation.'>'.$pageNation.'</a></li>';
                      }
          } //for
      } elseif ($page === 2){
        for ($i = 1; $i <= 5; $i++) {
          $pageNation = $page - 2 + $i;
          if ($i === 2) {
                      echo '<li class="page-item active" aria-current="page"><a class="page-link" href="#">'.$pageNation.'<span class="sr-only">(current)</span></a></li>';
                      } else {
                      echo '<li class="page-item"><a class="page-link" href='.'axis1.php?voltage='.$voltage.'&manufacturer='.$manufacturer.'&page='.$pageNation.'>'.$pageNation.'</a></li>';
                      }
          } //for
      } elseif ($page >= 3 && $page < $maxPageExist0 - 1 ){
        for ($i = 1; $i <= 5; $i++) {
          $pageNation = $page - 3 + $i;
          if ($i === 3) {
                      echo '<li class="page-item active" aria-current="page"><a class="page-link" href="#">'.$pageNation.'<span class="sr-only">(current)</span></a></li>';
                      } else {
                      echo '<li class="page-item"><a class="page-link" href='.'axis1.php?voltage='.$voltage.'&manufacturer='.$manufacturer.'&page='.$pageNation.'>'.$pageNation.'</a></li>';
                      }
          } //for
      } elseif ($page === $maxPageExist0 - 1 ){
        for ($i = 1; $i <= 5; $i++) {
          $pageNation = $page - 4 + $i;
          if ($i === 4) {
                      echo '<li class="page-item active" aria-current="page"><a class="page-link" href="#">'.$pageNation.'<span class="sr-only">(current)</span></a></li>';
                      } else {
                      echo '<li class="page-item"><a class="page-link" href='.'axis1.php?voltage='.$voltage.'&manufacturer='.$manufacturer.'&page='.$pageNation.'>'.$pageNation.'</a></li>';
                      }
          } //for
      } elseif ($page === $maxPageExist0 ){
        for ($i = 1; $i <= 5; $i++) {
          $pageNation = $page - 5 + $i;
          if ($i === 5) {
                      echo '<li class="page-item active" aria-current="page"><a class="page-link" href="#">'.$pageNation.'<span class="sr-only">(current)</span></a></li>';
                      } else {
                      echo '<li class="page-item"><a class="page-link" href='.'axis1.php?voltage='.$voltage.'&manufacturer='.$manufacturer.'&page='.$pageNation.'>'.$pageNation.'</a></li>';
                      }
          } //for
      }
      break;
}

if($page < $maxPage){ ?>
<li class="page-item">
<a class="page-link" href="axis1.php?voltage=<?php echo $voltage; ?>&manufacturer=<?php echo $manufacturer; ?>&page=<?php print($page +1); ?>">&rsaquo;</a>
</li>
<li class="page-item">
<a class="page-link" href="axis1.php?voltage=<?php echo $voltage; ?>&manufacturer=<?php echo $manufacturer; ?>&page=<?php echo $maxPage; ?>">&raquo;</a>
</li>
<?php 
}
} // if ($_GET)
?>
</ul></nav>