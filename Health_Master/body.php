<?php session_start(); ?>

<html>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>預問診系統-2022 </title>
<body>
<?php
if (! (empty($_POST['ssid']))) {
  include('connectMySQL.php');
    
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ssid = $_POST['ssid'];
   
  }
  
  $sql = "SELECT * FROM patient 
            WHERE ssid ='$ssid'";
}
?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
        html {
            height: 100%;
        }

        body {
            background-image: url(background_input.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }
</style>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

.navbar {
  width: 100%;
  background-color: #008F8F;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 8;
  color: white;
  text-decoration: none;
  font-size: 30px;
}

.navbar a:hover {
  background-color: #00CCCC;
}

.active {
  background-color: #FFC14F;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}
</style>

<style type="text/css">
<!--
.style1 {
  font-size: 15px;
  color: #FF0000;
  font-family: "正黑體";
  font-weight: bold;
}

.style2 {
  font-family: Arial, Helvetica, sans-serif;
}

.style3 {
  color: #008080;
  font-family: "正黑體";
}

body{
  /*background-image: url(images/bg02.gif);*/
  margin-left: 35px;
  margin-right: 35px;
}
-->
</style>
</head>
 
<body><center><br>
<p class="fw-bold fs-1 text-darkcyan"> 預問診系統 - 2022 </p></center>
<!-- 圖示網站：https://www.w3schools.com/icons/fontawesome_icons_webapp.asp -->
<b><div class="navbar"><center>
  <a href="home.php" href="#"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a class="active"><i class="fa fa-pencil-square-o"></i> 症狀填答</a>
  <a href="show.php"><i class="fa fa-id-card-o"></i> 候診看版</a>
  <a href="finish.php"><i class="fa fa-calendar-check-o"></i> 診斷結果</a>
</center></div></b>
<br>
<center><b><div id="show_time">  
<script>  
//這裡程式碼多了幾行，但是不會延遲顯示，速度比較好，格式可以自定義，是理想的時間顯示
setInterval("fun(show_time)",1);
function fun(timeID){ 
var date = new Date();  //建立物件  
var y = date.getFullYear();     //獲取年份  
var m =date.getMonth()+1;   //獲取月份  返回0-11  
var d = date.getDate(); // 獲取日  
var w = date.getDay();   //獲取星期幾  返回0-6   (0=星期天) 
var ww = ' 星期'+'日一二三四五六'.charAt(new Date().getDay()) ;//星期幾
var h = date.getHours();  //時
var minute = date.getMinutes()  //分
var s = date.getSeconds(); //秒
var sss = date.getMilliseconds() ; //毫秒
if(m<10){
m = "0"+m;
}
if(d<10){
d = "0"+d;
}
if(h<10){
h = "0"+h;
}
if(minute<10){
minute = "0"+minute;
}
if(s<10){
s = "0"+s;
}
if(sss<10){
sss = "00"+sss;
}else if(sss<100){
sss = "0"+sss;
}
document.getElementById(timeID.id).innerHTML =  y+"-"+m+"-"+d+"   "+h+":"+minute+":"+s+"  "+ww;
//document.write(y+"-"+m+"-"+d+"   "+h+":"+minute+":"+s);  
}

</script>  
</div>

<br><br>

<form action="symptom3.php" method="POST" id="formAdd">
  <table class="table-bordered" style="border:3px #009E9E solid;" border="5" align="center" cellpadding="4" width="50%" >
    <tr>
      <td bgcolor='#FFFFF2'><font size="5"><b><center>身分證號</center></td>
      <td bgcolor='#FFFFF2'><font size="5"><b><input type="hidden" name="ssid" id="ssid" value="<?php echo $ssid; ?>" maxlength="10"><?php echo $ssid; ?></b></td>
    </tr>
    <tr>
    <td bgcolor='#FFFFF2' width="130px"><font size="4"><b><center>症狀填寫</center></td>
    <td bgcolor='#FFFFF2'><font size="4">
    <label><b>請勾選您的症狀：</label><br>
        
 
    
    <!-- email -->
    <div class="form-group" align="left">
    <br><label><b>心臟：</label><br>
    <input type="checkbox" name="symptom3[]" value="發冷"/>發冷
    <input type="checkbox" name="symptom3[]" value="顫抖"/>顫抖
    <input type="checkbox" name="symptom3[]" value="心跳加快"/>心跳加快
    <input type="checkbox" name="symptom3[]" value="胸痛"/>胸痛<br>
    <input type="checkbox" name="symptom3[]" value="心悸"/>心悸 (註：感覺到心臟不正常跳動，可能出現呼吸困難)<br>
    <br><label>胃腸道：</label><br>
    <input type="checkbox" name="symptom3[]" value="胃痛"/>胃痛
    <input type="checkbox" name="symptom3[]" value="胃痙攣"/>胃痙攣
    <input type="checkbox" name="symptom3[]" value="胃脹氣"/>胃脹氣
    <input type="checkbox" name="symptom3[]" value="胃腸道出血"/>胃腸道出血<br>
    <input type="checkbox" name="symptom3[]" value="消化不良"/>消化不良 (註：飯後腹脹不適)<br>
    <input type="checkbox" name="symptom3[]" value="胃酸過多"/>胃酸過多 (註：胸口有灼熱感，時常胃痛)<br>
    <input type="checkbox" name="symptom3[]" value="腹部脹氣/>腹部脹氣
    <input type="checkbox" name="symptom3[]" value="腹部脹大"/>腹部脹大
    <input type="checkbox" name="symptom3[]" value="腹痛"/>腹痛
    <input type="checkbox" name="symptom3[]" value="腹瀉"/>腹瀉
    <input type="checkbox" name="symptom3[]" value="便秘"/>便秘
    <input type="checkbox" name="symptom3[]" value="肛門疼痛"/>肛門疼痛
    <input type="checkbox" name="symptom3[]" value="血便"/>血便
    <input type="checkbox" name="symptom3[]" value="脫水"/>脫水<br>
    <br><label>泌尿部：</label><br>
    <input type="checkbox" name="symptom3[]" value="排尿灼熱"/>排尿灼熱
    <input type="checkbox" name="symptom3[]" value="尿液顏色深黃"/>尿液顏色深黃<br>
    <input type="checkbox" name="symptom3[]" value="頻尿"/>頻尿
    <input type="checkbox" name="symptom3[]" value="點尿"/>點尿 (註：排尿困難，且尿量減少)<br>
    <br><label>其他：</label><br>
    <input type="checkbox" name="symptom3[]" value="疲勞"/>疲勞
    <input type="checkbox" name="symptom3[]" value="食慾不振"/>食慾不振
    <input type="checkbox" name="symptom3[]" value="食慾增加"/>食慾增加<br>
    <input type="checkbox" name="symptom3[]" value="背痛"/>背痛
    <input type="checkbox" name="symptom3[]" value="全身肌肉痠痛"/>全身肌肉痠痛
    <input type="checkbox" name="symptom3[]" value="失去平衡"/>失去平衡 (註：感到暈眩，身體不穩)<br>
    <input type="checkbox" name="symptom3[]" value="體重減輕"/>體重減輕
    <input type="checkbox" name="symptom3[]" value="體重增加"/>體重增加
    <input type="checkbox" name="symptom3[]" value="肥胖"/>肥胖 (註：體重增加，且身型改變)<br>
    </div></form></table>
    <br>
    <!-- 送出按鈕 -->
    <input type="submit" name="button" id="button" value="送出" style="width:100px;height:30px;font-size:20px;border:none;font-weight:bold;color:white;background-color:#008F8F;">
    <br><br>


</body>
</html>