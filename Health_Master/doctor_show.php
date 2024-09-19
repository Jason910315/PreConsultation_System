<?php 
  header("Content-Type: text/html; charset=utf-8");
// require_once 'connMySQL.php';
//if (isset($_POST["action"]) && ($_POST["action"]=="register")) {
  include("connMySQL.php");   
  // connect with database  
 $seldb = mysqli_select_db($link, "hospital")  
    or die("資料庫選擇失敗！");  

  $pageRow_records = 10;
  //預設頁數
  $num_pages = 1;
  //若已經有翻頁，將頁數更新
  if (isset($_GET['page'])) {
    $num_pages = $_GET['page'];
  }
  //本頁開始記錄筆數 = (頁數-1)*每頁記錄筆數
  $startRow_records = ($num_pages-1) * $pageRow_records;   
  //未加限制顯示筆數的SQL敘述句
  $sql = "SELECT ssid,name,department
    FROM patient,symptom
    WHERE patient.ssid = symptom.symptom_ssid";    
    
  //加上限制顯示筆數的SQL敘述句，由本頁開始記錄筆數開始，每頁顯示預設筆數
  $sql_limit = $sql." LIMIT ".$startRow_records.", ".$pageRow_records;    

  mysqli_query($link, "SET CHARACTER SET UTF8");
  //以加上限制顯示筆數的SQL敘述句查詢資料到 $result 中  
  $result = mysqli_query($link, $sql_limit);
  //以未加上限制顯示筆數的SQL敘述句查詢資料到 $all_result 中
  $all_result = mysqli_query($link, $sql);  
  //計算總筆數
  $total_records = mysqli_num_rows($all_result);
  //計算總頁數=(總筆數/每頁筆數)後無條件進位。
  $total_pages = ceil($total_records/$pageRow_records);  
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>預問診系統-2022 </title>
<style>
        html {
            height: 100%;
        }

        body {
            background-image: url(background_show.jpg);
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
<b><div class="navbar" style="background-color:#0066CC;"><center>
  <a href="doctor_home.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="doctor_input.php"><i class="fa fa-pencil-square-o"></i> 查詢病患</a>
  <a class="active" href="doctor_show.php"><i class="fa fa-id-card-o"></i> 候診看版</a>
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
<style>
input{border:0;
  background-color:#ab8178;
  color:white;
  border-radius:10px;
  cursor:pointer;}

input:hover{
  color:#ab8178;
  background-color:#fff;
  border:2px #ab8178 solid;
}
</style>
</center>

<table border="4" align="center" style="border:5px #0066CC solid;" width="30%" height="10%">

  <!-- 表格表頭 -->
  <tr bgcolor='#0066CC'>    
    <th><font color='white' size=6><center>姓名</center></font></th>
    <th><font color='white' size=6><center>科別</center></font></th>     
  </tr>
  <!-- 資料內容 -->
<?php 
  $loop = 1;
  while ($row_result = mysqli_fetch_assoc($result)) {
    if ($loop % 2 == 0) {
      echo "<tr bgcolor='#F2FFFF'>";    
    } else {
      echo "<tr bgcolor='#DEFFFF'>";    
    }
    echo "<td><font size=5><center><b>".$row_result["name"]."</b></center></font></td>";	
    echo "<td><font size=5><center><b>".$row_result["department"]."</b></center></font></td>";   		
    //echo "<td><a href='update.php?id=".$row_result["id"]."'>修改</a> ";
    //echo "<a href='delete.php?id=".$row_result["id"]."'>刪除</a></td>";
    echo "</tr>";
    $loop += 1;
}

?>
<center>
<br><br><br>
<table border="0" align="center">
  <tr><?php if ($num_pages > 1) { // 若不是第一頁則顯示 ?>
      <td><input type="button" value=" 第一頁 " style="width:100px;height:30px;font-size:16px;border:none;font-weight:bold;color:white;background-color:#ab8178;"
          onclick="location.href='showDataPage_button2.php?page=1'"></td>
      <td><input type="button" value=" 上一頁 " style="width:100px;height:30px;font-size:16px;border:none;font-weight:bold;color:white;background-color:#ab8178;"
          onclick="location.href='showDataPage_button2.php?page=<?php echo $num_pages-1;?>'"></td>      
    <?php } ?>
    <?php if ($num_pages < $total_pages) { // 若不是最後一頁則顯示 ?>
      <td><input type="button" value=" 下一頁 " style="width:100px;height:30px;font-size:16px;border:none;font-weight:bold;color:white;background-color:#ab8178;"
          onclick="location.href='showDataPage_button2.php?page=<?php echo $num_pages+1;?>'"></td>
      <td><input type="button" value=" 最後頁 " style="width:100px;height:30px;font-size:16px;border:none;font-weight:bold;color:white;background-color:#ab8178;"
          onclick="location.href='showDataPage_button2.php?page=<?php echo $total_pages;?>'"></td>
    <?php } ?>
  </tr>
</table>
</center>
<br>
</table>

</body>
</html>