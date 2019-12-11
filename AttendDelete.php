 <html>
 <head>
 </head>
 <body>
</body>
</html>

<?php
$db_host = 'localhost';
$db_user = 'Main';
$db_pwd = '!BWMainPass!';
$database = 'BWProd01';
$table = 'tbl_Client';
$dbport='3306';
$CID=$_POST['b1'];

if ($CID){
  session_start();
  $_SESSION["CurID"]=$CID;
}else{
  if($CID=='N'){
     session_start();
     $_SESSION["CurID"]="";
  }else{
    session_start();
    $CID=$_SESSION["CurID"];
  }
}

//echo "here";
//eho $CID;

?>

<?php	

// Create connection
$con = @mysqli_connect($db_host,$db_user,$db_pwd,$database,$dbport);
// Check connection
if (mysqli_connect_errno()) {
     die ("Failed to connect to MySQL using the PHP mysqli extension: " . mysqli_connect_error());
}else{ 
    // echo "<br>The connection to \"$database\" was successful!";
}

$table = 'Attendance';
$sql="update {$table} set Orientation='0000-00-00', Unit1='0000-00-00', Unit2='0000-00-00', Unit3='0000-00-00', Unit4='0000-00-00',
Unit5='0000-00-00', Unit6='0000-00-00', Unit7='0000-00-00', Unit8='0000-00-00', Unit9='0000-00-00', Unit10='0000-00-00'
where BWClientID='$CID'";

$query = mysqli_query($con, $sql);

mysqli_close($con);
?>

<?php header( 'Location: FSP-Attendance.php' ) ; ?>



 
