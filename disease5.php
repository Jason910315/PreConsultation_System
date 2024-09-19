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
   胃食道逆流
    <div style="font-size:30px;margin-bottom:5px;margin-top:-10px;color:#D68B00;">
       GERD
    </div>
   
</div>

  <table class="table-bordered" style="border:3px #009E9E solid;" border="3"  cellpadding="4" width="35%" >
    <tr>
      <td><h4 style="margin-top:10px;"><center><b>相關衛教資訊</b></center></h4></td>
    </tr>
    <tr>
    <td>
    <h4 style="color:blue;"><b>1.疾病描述</b></h4><p><b>
   是一種影響到下食道括約肌的慢性消化性疾病，是導致胃灼熱或酸性消化不良最常見的消化系統問題
   。胃的內容物從胃中回流進食道，引起不適並可能導致食道黏膜受傷。
    </p></b>
    <h4 style="color:blue;"><b>2.常見原因</b></h4><p><b>
    嗜酒、喜歡吃高油脂、刺激性食物（如甜食、巧克力、咖啡、茶、碳酸飲料、辛辣食物）等，都會刺激胃酸分泌，
    增加胃部負擔。其他像是生活習慣不佳，例如餐後立刻平躺，亦可能使胃部的食物逆流至食道。
    <h4 style="color:blue;"><b>2.症狀</b></h4>
    <p><b>胸部有灼熱感、胸痛、吞嚥困難、乾咳、喉嚨嘶啞、喉嚨痛、食物或酸液回流、感覺喉嚨內部有腫塊。</p></b>
    <h4 style="color:blue;"><b>3.治療方法</b></h4>
    <p><b>制酸劑、胃爾達錠、健胃仙、嘉胃斯康、碳酸二羥鋁鈉、坦適含鈣胃錠，能快速舒緩症狀。</p></b>
    <h4 style="color:blue;"><b>4.注意事項</b></h4>
    <p><b>
   盡量別吃檸檬、柳丁、橘子這類高酸性的水果，會刺激胃酸分泌，致使胃酸往上湧入食道。
   另外，富含酵素的水果，比如：木瓜，空腹吃容易造成腸胃黏膜的刺激，建議飯後食用。
    細嚼慢嚥更健康， 用餐狼吞虎嚥也容易造成胃酸逆流。</p></b>
</td>
    </tr>

</table>
</form>
<br>
</body>
</html>


