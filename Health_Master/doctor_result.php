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
  header('Location: doctor_result.php');
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
<b><div class="navbar" style="background-color:#0066CC;"><center>
  <a href="doctor_home.php"><i class="fa fa-fw fa-home"></i> Home</a> 
     <a class="active" href="#"><i class="fa fa-pencil-square-o"></i>查詢病患</a>
  <a href="doctor_show.php"><i class="fa fa-id-card-o"></i>候診看版 </a>

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

  <table class="table-bordered" style="border:3px #0066CC solid;" border="3"  cellpadding="4" width="30%" >
    <tr>
      <td bgcolor='#0066CC'><font size="5" color="white"><b><center>欄位名稱</center></td>
      <td bgcolor='#0066CC'><font size="5" color="white"><b><center>資料內容</center></td>
    </tr>
    <tr>
      <td bgcolor='#FFFFF2'><font size="5"><b><center>身分證號</center></td>

    <?php 
        echo "<td bgcolor='#FFFFF2'><font size=5><b>".$_SESSION["ssid"]."</td>";
    ?>
    </tr>
    <tr>
      <td bgcolor='#FFFFF2'><font size="5"><b><center>姓名</center></td>
        <?php 
        echo "<td bgcolor='#FFFFF2'><font size=5><b>".$_SESSION["name"]."</td>";  

?> </tr>
    <tr>
      <td bgcolor='#FFFFF2'><font size="5"><b><center>科別</center></td>
        <?php 
        echo "<td bgcolor='#FFFFF2'><font size=5><b>".$_SESSION["department"]."</td>";  
?> </tr>

<tr>
      <td bgcolor='#FFFFF2'><font size="5"><b><center>評估可能疾病</center></td>
       <?php echo "<td bgcolor='#FFFFF2'><font size=5><b>".$_SESSION["prediction"]."</td>";?>
      
    </tr>
    <?php
    switch ($_SESSION["prediction"]){
        case '良性陣發性位置性眩暈(耳石症)':
            $href='disease1.php';
            break;
        case '肺炎':
            $href='disease2.php';
            break;
        case '腸胃炎':
            $href='disease3.php';
             break;
        case '支氣管炎':
            $href='disease4.php';
             break;
        case '胃食道逆流':
            $href='disease5.php';
            break;
    }
    ?>  
    
</table>
<br>
   
</form>



</body>
</html>


