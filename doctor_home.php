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
            background-image: url(background_home.jpg);
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
<b><div class="navbar" style="background-color:#0066CC;"><center>
  <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="doctor_input.php"><i class="fa fa-pencil-square-o"></i> 查詢病患</a>
  <a href="doctor_show.php"><i class="fa fa-id-card-o"></i> 候診看版</a>
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
  background-color:#0066CC;
  color:white;
  border-radius:10px;
  cursor:pointer;}

input:hover{
  color:#0066CC;
  background-color:#fff;
  border:2px #00D1D1 solid;
}
</style>
<br><br>
<a href="doctor_input.php"><input type="button" value="查詢病患" name="查詢病患" style="width:200px;height:150px;font-size:30px;font-weight:bold;"></a>
<br><br>
<a href="doctor_show.php"><input type="button" value="候診看板" name="候診看板" style="width:200px;height:150px;font-size:30px;font-weight:bold;"></a>
<br><br>
</center>


</body>
</html>