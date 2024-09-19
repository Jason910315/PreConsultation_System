<?php
  include("connectMysql.php");  
  $seldb = mysqli_select_db($db_link, "hospital")  
    or die("資料庫選擇失敗！");
  if (! (empty($_POST['ssid']))||empty($_POST['symptom3'])) {
  include('connectMySQL.php');
}
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ssid = $_POST['ssid'];
    $symptom3=$_POST['symptom3'];
    $symptom_arr = array();
    $symptom_arr = $_POST['symptom3'];
    $symptom3 = implode(',', $symptom_arr);
    //$password = password_hash($_GET['password'], PASSWORD_DEFAULT);
  }
  

  $sql_findID1 ="SELECT * FROM patient WHERE ssid = '".$_POST['ssid']."'";
   $data = mysqli_query($db_link, $sql_findID1);
  $patient = mysqli_fetch_assoc($data);
  

  $sql_findID2 = "SELECT * FROM symptom WHERE symptom_ssid = '".$_POST['ssid']."'";
  $data = mysqli_query($db_link, $sql_findID2);
  $symptom = mysqli_fetch_assoc($data);
  
    $sql_query = "UPDATE symptom SET symptom3=('$symptom3')  WHERE symptom_ssid='$ssid'";
  mysqli_query($db_link, $sql_query);
  
   
?>

<html>
<head>
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

body {
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
<br>
(可繼續填寫其他部位症狀，若已填寫完成點選新增掛號)

<br><br>

  <table class="table-bordered" style="border:3px #009E9E solid;" border="3"  cellpadding="4" width="30%" >
     
    <tr>
      <td bgcolor='#FFFFF2'><font size="5"><b><center>身分證號</center></td>
      <td bgcolor='#FFFFF2'><font size="5"><b><input type="hidden" name="ssid" id="ssid" value="<?php echo $ssid; ?>" maxlength="10"><?php echo $ssid; ?></b></td>
    </tr>
    <tr>
    <td bgcolor='#FFFFF2'><font size="5"><b><center>症狀填寫</center></td>
    <td bgcolor='#FFFFF2'><font size="5">
    <label>您感到不適的部位:</label><br><br>
     <form id="head" name="head" method="post" action="head.php">
            <input type="hidden" name="ssid" id="ssid" value="<?php echo $ssid; ?>" maxlength="10">
            <input type="hidden" name="action" value="add">
            <input type="submit" name="button" id="button" value="頭部" style="border-radius:10px;width:135px;height:50px;font-size:20px;border:none;font-weight:bold;color:white;background-color:#00CCCC;">
    </form>  
    <form  id="body" name="body" method="post" action="body.php">
            <input type="hidden" name="ssid" id="ssid" value="<?php echo $ssid; ?>" maxlength="10">
            <input type="hidden" name="action" value="add">
            <input type="submit" name="button" id="button" value="胸腹" style="border-radius:10px;width:135px;height:50px;font-size:20px;border:none;font-weight:bold;color:white;background-color:#00CCCC;">
    </form> 
    <form id="neck" name="neck" method="post" action="neck.php">
            <input type="hidden" name="ssid" id="ssid" value="<?php echo $ssid; ?>" maxlength="10">
            <input type="hidden" name="action" value="add">
            <input type="submit" name="button" id="button" value="脖子" style="border-radius:10px;width:135px;height:50px;font-size:20px;border:none;font-weight:bold;color:white;background-color:#00CCCC;">
    </form> 
    <form  id="limbs" name="limbs" method="post" action="limbs.php">
            <input type="hidden" name="ssid" id="ssid" value="<?php echo $ssid; ?>" maxlength="10">
            <input type="hidden" name="action" value="add">
            <input type="submit" name="button" id="button" value="四肢" style="border-radius:10px;width:135px;height:50px;font-size:20px;border:none;font-weight:bold;color:white;background-color:#00CCCC;">
    </form> 
    <form  id="skin" name="skin" method="post" action="skin.php">
            <input type="hidden" name="ssid" id="ssid" value="<?php echo $ssid; ?>" maxlength="10">
            <input type="hidden" name="action" value="add">
            <input type="submit" name="button" id="button" value="皮膚" style="border-radius:10px;width:135px;height:50px;font-size:20px;border:none;font-weight:bold;color:white;background-color:#00CCCC;">
    </form> 
    <form  id="behavior" name="behavior" method="post" action="behavior.php">
            <input type="hidden" name="ssid" id="ssid" value="<?php echo $ssid; ?>" maxlength="10">
            <input type="hidden" name="action" value="add">
            <input type="submit" name="button" id="button" value="日常習慣改變" style="border-radius:10px;width:135px;height:50px;font-size:20px;border:none;font-weight:bold;color:white;background-color:#00CCCC;">
    </form>  
    </td></tr>
    </tr>  
   <form id="head" name="head" method="post" action="create.php">   
      <tr>
      <td colspan="2" align="center" bgcolor='#FFFFF2'>
      <input type="hidden" name="ssid" id="ssid" value="<?php echo $ssid; ?>" maxlength="10">
      <input type="hidden" name="action" value="add">
      <input type="submit" name="button" id="button" value="新增掛號" style="width:100px;height:30px;font-size:20px;border:none;font-weight:bold;color:white;background-color:#008F8F;">
      <input type="reset" name="button2" id="button2" value="重新填寫" style="width:100px;height:30px;font-size:20px;border:none;font-weight:bold;color:white;background-color:#008F8F;">
      </td>
    </tr>
</form>
</table>

</body>
</html>