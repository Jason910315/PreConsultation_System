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
    //$password = password_hash($_GET['password'], PASSWORD_DEFAULT);
  }
  

  $sql_findID1 ="SELECT * FROM patient WHERE ssid = '".$_POST['ssid']."'";
   $data = mysqli_query($db_link, $sql_findID1);
  $patient = mysqli_fetch_assoc($data);
  

  $sql_findID2 = "SELECT * FROM symptom WHERE symptom_ssid = '".$_POST['ssid']."'";
  $data = mysqli_query($db_link, $sql_findID2);
  $symptom = mysqli_fetch_assoc($data);
  $_SESSION['symptom1'] = $symptom['symptom1'];
  
  $sql_findID3 = "SELECT * FROM record WHERE sssid = '".$_POST['ssid']."'";
  $data = mysqli_query($db_link, $sql_findID3);
  $symptom = mysqli_fetch_assoc($data);
  
  $sql_findID4 = "SELECT * FROM predict WHERE symptom_name = '".$_SESSION['symptom1']."'";
  $data = mysqli_query($db_link, $sql_findID4);
  $predict = mysqli_fetch_assoc($data);
  
  //session_start();
  $_SESSION['ssid'] = $patient['ssid'];
  $_SESSION['name'] = $patient['name'];
  $_SESSION['department'] = $patient['department'];
  $_SESSION['predict'] = $record['predict'];
  $_SESSION['No'] = $patient['No'];
  
  $_SESSION['symptom2'] = $symptom['symptom2'];
  $_SESSION['symptom3'] = $symptom['symptom3'];
  $_SESSION['symptom4'] = $symptom['symptom4'];
  $_SESSION['symptom5'] = $symptom['symptom5'];
  $_SESSION['symptom6'] = $symptom['symptom6'];
  $_SESSION['prediction'] = $predict['prediction'];
  //header('Location: welcome.php');
  header('Location: result.php');
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://pyscript.net/latest/pyscript.css" />
<script defer src="https://pyscript.net/latest/pyscript.js"></script>
<title>預問診系統-2022 </title>
<style>
        html {
            height: 100%;
        }

        body {
            background-image: url(background_create.jpg);
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

body {
  /*background-image: url(images/bg02.gif);*/
  margin-left: 35px;
  margin-right: 35px;
}
-->
</style>
</head>
</html>
 
<body><center><br>
<p class="fw-bold fs-1 text-darkcyan"> 預問診系統 - 2022 </p></center>
<!-- 圖示網站：https://www.w3schools.com/icons/fontawesome_icons_webapp.asp -->
<b><div class="navbar"><center>
  <a href="home.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="input.php"><i class="fa fa-pencil-square-o"></i> 症狀填答</a>
  <a href="show.php"><i class="fa fa-id-card-o"></i> 候診看版</a>
  <a class="active" href="finish.php"><i class="fa fa-calendar-check-o"></i> 診斷結果</a>
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
<html>
<body>
<form action="symptom.php" method="POST" id="symptom">
 <div style="font-size:30px;margin-top:-30px;color:#D68B00;">
    肺炎
    <div style="font-size:30px;margin-bottom:5px;margin-top:-10px;color:#D68B00;">
        Pneumonia
    </div>
</div>
  <table class="table-bordered" style="border:3px #009E9E solid;" border="3"  cellpadding="4" width="38%" >
    <tr>
      <td><h4 style="margin-top:10px;"><center><b>相關衛教資訊</b></center></h4></td>
    </tr>
    <tr>
    <td>
    <h4 style="color:blue;"><b>1.常見原因</b></h4>
    <p><b>是下呼吸道被細菌或病毒入侵，引起肺泡發炎造成各種症狀的疾病</b></p>
    <h4 style="color:blue;"><b>2.肺炎分類</b></h4>
    <p><b> <span style="color:#9F4D95;">a.細菌性肺炎:</span>
            最常見的肺炎，細菌在肺臟快速繁殖，病人會出現寒顫高燒、劇烈咳嗽、咳膿痰、呼吸喘、胸痛
            ，有時症狀不明顯。初期症狀和感冒、流感很像，且肺炎的病程進展快又短，常常幾天之內擊潰病人身體。<br><br>
            <span style="color:#9F4D95;">b.病毒性肺炎:</span>
            台灣病毒性肺炎以A型流感病毒最常見，其他還有呼吸道融合病毒、腺病毒等，2019-2020年開始流行的新冠肺炎也是屬於此類。<br><br>
            <span style="color:#9F4D95;">c.典型肺炎:</span>
            典型肺炎的症狀包括發燒、寒顫、持久的咳嗽，痰液中可能會有血絲，並出現單邊胸痛、深呼吸或咳嗽時胸痛甚至呼吸困難。<br><br>
            <span style="color:#9F4D95;">d.非典型肺炎:</span>
            往往是漸進式的，可能會出現類似上呼吸道感染的症狀，如乾咳、鼻塞、喉嚨痛、頭痛、發燒、腹瀉、噁心、嘔吐等，倘若未妥善治療則可能併發肺積水
           、菌血症、敗血症，甚至死亡。<br>
           </p></b>
    <h4 style="color:blue;"><b>3.治療</b></h4>
    <p><b>
    <span style="color:#9F4D95;">a.藥物治療：</span> 
    常見藥物包括抗生素、祛痰劑、支氣管擴張劑、解熱劑等，肺炎的主流治療方式即以藥物治療為主。<br><br>
     <span style="color:#9F4D95;">b.氧氣治療：</span>  
     當病患有需要時可以輔以氧氣治療維持病患呼吸道的通暢。<br>
     </p></b>
    <h4 style="color:blue;"><b>4.注意事項</b></h4>
    <p><b>飲食方面採用高蛋白、高熱量飲食可增加身體抵抗力。
           每天應攝取水份 3000 至 4000c.c。
            應攝取足夠的水果、青菜，養成規則的排便習慣。
            如發生痰量增加、顏色變黃、變黏稠、發燒、咳嗽、呼吸困難加劇、意識混亂、或嗜睡等肺部感染之症狀，應立即就醫。
            肺炎的高危險病人，可以在醫師指示下施打流感及肺炎雙球菌疫苗。</p></b>
    </td>


    </tr>
</table>
</form>
<br>
</body>
</html>


