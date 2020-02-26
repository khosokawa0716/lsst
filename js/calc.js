function clickCalcBtn(){

  // 運転速度の計算
  var distance = document.conditionForm.distance.value;
  var posTime = document.conditionForm.posTime.value;
  var accTime = document.conditionForm.accTime.value;
  var speed = distance / (posTime - accTime); //単位mm/s
  document.conditionForm.speed.value = speed.toFixed(2)
  
  // 加速度の計算 速度の単位はm/sにする
  var acceleration = (speed / 1000) / accTime; //単位m/s^2
  
  // 加速推力の計算
  var mass = document.conditionForm.mass.value;
  var accTrust = mass * acceleration; //単位N
  document.conditionForm.accTrust.value = accTrust.toFixed(2);
}
