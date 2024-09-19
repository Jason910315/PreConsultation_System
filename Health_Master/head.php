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


<form action="symptom1.php" method="POST" id="formAdd">
  <table class="table-bordered" style="border:3px #009E9E solid;" border="5" align="center" cellpadding="4" width="40%" >
    <tr>
      <td bgcolor='#FFFFF2'><font size="5"><b><center>身分證號</center></td>
      <td bgcolor='#FFFFF2'><font size="5"><b><input type="hidden" name="ssid" id="ssid" value="<?php echo $ssid; ?>" maxlength="10"><?php echo $ssid; ?></b></td>
    </tr>
    <tr>
    <td bgcolor='#FFFFF2' width="130px"><font size="5"><b><center>症狀填寫</center></td>
    <td bgcolor='#FFFFF2'><font size="4">
    <label><b>請勾選您的症狀：</label>
        
    <!-- email -->
    <div class="form-group" align="left">
    <input type="hidden" name="ssid" id="ssid" value="<?php echo $ssid;?>" maxlength="10">
    <br><label><b>頭：</label><br>
    <input type="checkbox" name="symptom1[]" value="頭暈"/>頭暈      
    <input type="checkbox" name="symptom1[]" value="頭痛"/>頭痛
    <input type="checkbox" name="symptom1[]" value="發燒"/>發燒
    <input type="checkbox" name="symptom1[]" value="意識模糊"/>意識模糊<br>
    <input type="checkbox" name="symptom1[]" value="嘔吐"/>嘔吐
    <input type="checkbox" name="symptom1[]" value="噁心想吐"/>噁心想吐
    <input type="checkbox" name="symptom1[]" value="昏睡"/>昏睡
    <input type="checkbox" name="symptom1[]" value="昏迷"/>昏迷<br>
    <br><label>口鼻：</label><br>
    <input type="checkbox" name="symptom1[]" value="呼吸急促"/>呼吸急促
    <input type="checkbox" name="symptom1[]" value="持續打噴嚏"/>持續打噴嚏
    <input type="checkbox" name="symptom1[]" value="鼻塞"/>鼻塞
    <input type="checkbox" name="symptom1[]" value="流鼻水"/>流鼻水<br>
    <input type="checkbox" name="symptom1[]" value="流鼻水"/>味覺喪失
    <input type="checkbox" name="symptom1[]" value="咳嗽"/>咳嗽
    <input type="checkbox" name="symptom1[]" value="口齒不清"/>口齒不清
    <input type="checkbox" name="symptom1[]" value="嘴唇乾燥刺痛"/>嘴唇乾燥刺痛<br>
    <input type="checkbox" name="symptom1[]" value="舌頭潰瘍"/>舌頭潰瘍<br>
    <input type="checkbox" name="symptom1[]" value="痰/>痰 (註：痰呈黏稠狀)
    <input type="checkbox" name="symptom1[]" value="血絲痰"/>血絲痰 (註：痰中有些許血絲)<br>
    <br><label>精神：</label><br>
    <input type="checkbox" name="symptom1[]" value="心神不定"/>心神不定
    <input type="checkbox" name="symptom1[]" value="注意力不集中"/>注意力不集中<br>
    <br><label>眼部：</label><br>
    <input type="checkbox" name="symptom1[]" value="視力模糊不佳"/>視力模糊不佳
    <input type="checkbox" name="symptom1[]" value="眼睛流淚"/>眼睛流淚
    <input type="checkbox" name="symptom1[]" value="眼白變黃"/>眼白變黃
    <input type="checkbox" name="symptom1[]" value="眼睛凹陷"/>眼睛凹陷<br>
    <input type="checkbox" name="symptom1[]" value="紅眼"/>紅眼
    <input type="checkbox" name="symptom1[]" value="眼睛腫脹"/>眼睛腫脹
    <input type="checkbox" name="symptom1[]" value="眼窩痛"/>眼窩痛 (註：眼球上方處疼痛)<br><br>
    </div></form></table>
    <br>
    <!-- 送出按鈕 -->
    <input type="submit" name="button" id="button" value="送出" style="width:100px;height:30px;font-size:20px;border:none;font-weight:bold;color:white;background-color:#008F8F;">
    <br><br>


</body>
</html>