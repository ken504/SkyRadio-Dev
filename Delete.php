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

$sql="update {$table} set Deleted=1 where BWClientID='$CID'";
$query = mysqli_query($con, $sql);

$table = 'Attendance';
$sql="update {$table} set Deleted=1 where BWClientID='$CID'";
$query = mysqli_query($con, $sql);

$table = 'tbl_BusClient';
$sql="update {$table} set Deleted=1 where BWClientID='$CID'";
$query = mysqli_query($con, $sql);

$table = 'tbl_ClientProgress';
$sql="update {$table} set Deleted=1 where BWClientID='$CID'";
$query = mysqli_query($con, $sql);

$table = 'tbl_ContactLost';
$sql="update {$table} set Deleted=1 where BWClientID='$CID'";
$query = mysqli_query($con, $sql);

$table = 'tbl_HomeFinanceInfo';
$sql="update {$table} set Deleted=1 where BWClientID='$CID'";
$query = mysqli_query($con, $sql);

mysqli_close($con);
?>


<?php header( 'Location: Home.php' ) ; ?>



 
