<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>FSP Attendance</title>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">	
<link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link href="css/form.css" rel="stylesheet">
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<link href="css/bootstrap.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="background">
<nav class="navbar navbar-inverse">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="Home.php"><span style="color: red">B</span><span style="color: blue">W</span>Management System</a></div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1">
      <ul class="nav navbar-nav">
        <li><a href="FSP.php">FSP</a></li>
        <li class="active"><a href="FSP-Attendance.php">FSP-Attendance<span class="sr-only">(current)</span></a></li>
		<li><a href="FSP-Payment.php">FSP-Payment</a></li>
		  <li><a href="lenders.html">Lender Fields</a></li>
		<li><a href="peeps.html">PEEP Fields</a></li>  
       
      </ul>
      <!--<form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>-->
      
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>	

<?php
$db_host = 'localhost';
$db_user = 'Main';
$db_pwd = '!BWMainPass!';
$database = 'BWProd01';
$table = 'tbl_Client';
$dbport='3306';

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


//echo $CID;

?>

<div class="container">
  <h1 class="text-center">FSP Attendance</h1>
 	<br>
<div class=" form-group row">
<div class="panel panel-default shadow">

	<div class="panel-heading">
		<center>
		<div class="btn-group">
  		  <button type="button" class="btn btn-default" onclick="javascript: document.location='Home.php'">Home</button>
		   <!--<button type="button" class="btn btn-success"data-toggle="modal" data-target="#snapshotModal">$napShot</button>
		  <button type="button" class="btn btn-default" onclick="javascript: document.location='FSP-Attendance.php'">New Record</button>
		 <button type="button" class="btn btn-default">Edit</button>-->

        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#saveModal">Save</button>


	  	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
		</div>
		</center>
	</div>
	
<!--Delete Modal start	-->
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header alert-danger text-center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Warning!</h4>
      </div>
      <div class="modal-body">
        <center><p>Do you want to delete this record?</p></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
	<button type="button" class="btn btn-default" data-dismiss="modal"  onclick="javascript: document.mForm.action='AttendDelete.php'; document.mForm.submit();" >Yes</button>
       </button>

      </div>
    </div>
  </div>
</div>
<!--Delete Modal end-->


<!--Save Modal start	-->
<div id="saveModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header alert-info text-center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Saving Record</h4>
      </div>
      <div class="modal-body">
        <center><p>Are edits are correct?</p></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
		<button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript: document.mForm.submit();">Yes</button>
      </div>
    </div>
  </div>
</div>
<!--Save Modal end-->
<!--Financial SnapShot Modal start	-->
<div id="snapshotModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header alert-danger text-center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Financial SnapShot!</h4>
      </div>
      <div class="modal-body">
        <center><p>Client Record:</p></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>
<!--Financial SnapShot Modal end-->
	
	
	<!--Success Modal Start-->
	
	<!--Success Modal End-->	
	


<?php

// Create connection
$con = @mysqli_connect($db_host,$db_user,$db_pwd,$database,$dbport);
// Check connection
if (mysqli_connect_errno()) {
     die ("Failed to connect to MySQL using the PHP mysqli extension: " . mysqli_connect_error());
}else{ 
    // echo "<br>The connection to \"$database\" was successful!";
}

$SRC=$_POST['SRC'];

if (!isset($_POST['submit']))
{
$BWClientID=$_POST['b1'];
$Orientation=$_POST['a5'];
$Unit1=$_POST['a6']; 
$Unit2=$_POST['a7']; 
$Unit3=$_POST['a8']; 
$Unit4=$_POST['a9'];  
$Unit5=$_POST['a10']; 
$Unit6=$_POST['a11']; 
$Unit7=$_POST['a12']; 
$Unit8=$_POST['a13']; 
$Unit9=$_POST['a14']; 
$Unit10=$_POST['a15']; 

if ($CID==''){
    $CID=$_POST['b1'];
}

if ($Orientation != ''){
  $DOrientation = date('Y-m-d', strtotime(str_replace('-', '/', $Orientation)));
}else{
  $DOrientation='';
}


if ($Unit1 != ''){
  $DUnit1 = date('Y-m-d', strtotime(str_replace('-', '/', $Unit1)));
}else{
  $DUnit1='';
}

if ($Unit2 != ''){
  $DUnit2 = date('Y-m-d', strtotime(str_replace('-', '/', $Unit2)));
}else{
  $DUnit2='';
}

if ($Unit3 != ''){
  $DUnit3 = date('Y-m-d', strtotime(str_replace('-', '/', $Unit3)));
}else{
  $DUnit3='';
}

if ($Unit4 != ''){
  $DUnit4 = date('Y-m-d', strtotime(str_replace('-', '/', $Unit4)));
}else{
  $DUnit4='';
}

if ($Unit5 != ''){
  $DUnit5 = date('Y-m-d', strtotime(str_replace('-', '/', $Unit5)));
}else{
  $DUnit5='';
}

if ($Unit6 != ''){
  $DUnit6 = date('Y-m-d', strtotime(str_replace('-', '/', $Unit6)));
}else{
  $DUnit6='';
}

if ($Unit7 != ''){
  $DUnit7 = date('Y-m-d', strtotime(str_replace('-', '/', $Unit7)));
}else{
  $DUnit7='';
}

if ($Unit8 != ''){
  $DUnit8 = date('Y-m-d', strtotime(str_replace('-', '/', $Unit8)));
}else{
  $DUnit8='';
}

if ($Unit9 != ''){
  $DUnit9 = date('Y-m-d', strtotime(str_replace('-', '/', $Unit9)));
}else{
  $DUnit9='';
}

if ($Unit10 != ''){
  $DUnit10 = date('Y-m-d', strtotime(str_replace('-', '/', $Unit10)));
}else{
  $DUnit10='';
}


if ($SRC == 'I')
{

$sql="insert into tbl_Attendance (BWClientID, Orientation, Unit1, Unit2, Unit3, Unit4, Unit5, Unit6, Unit7, Unit8, Unit9, Unit10)

values 
('$BWClientID','$DOrientation','$DUnit1','$DUnit2','$Unit3','$DUnit4','$DUnit5','$DUnit6','$DUnit7','$DUnit8','$DUnit9','$DUnit10')";
$query = mysqli_query($con, $sql);

$SRC='F';
}

if ($SRC == 'H')
{

$sql="update tbl_Attendance set Orientation='$DOrientation', Unit1='$DUnit1', Unit2='$DUnit2', Unit3='$DUnit3', Unit4='$DUnit4',
Unit5='$DUnit5', Unit6='$DUnit6', Unit7='$DUnit7', Unit8='$DUnit8', Unit9='$DUnit9', Unit10='$DUnit10'

where BWClientID='$CID'";

$query = mysqli_query($con, $sql);
}

}

// Query the database

//$resultA = mysqli_query($con,"SELECT a.* FROM 'tbl_Attendance' where a.BWClientID='$CID'");
//$num_rowsA = mysqli_num_rows($resultA);
//echo $num_rowsA;
//if ($num_rowsA > 0){
//   echo "True";
//}else{
//  echo "False";
//}

//$result = mysqli_query($con,"SELECT c.PClientFirstName, c.PClientLastName, SClientFirstName, SClientFirstName, a.* FROM tbl_Attendance a Inner Join tbl_Client c on c.BWClientID=a.BWClientID where a.BWClientID='$CID'");

//$cresult = mysqli_query($con,"SELECT ClientFirstName, PClientLastName, SClientFirstName, SClientFirstName tbl_Client where BWClientID='$CID'");
//$result = mysqli_query($con,"SELECT * FROM tbl_Attendance BWClientID='$CID'");

//$cnum_rows = mysqli_num_rows($cresult);
//$num_rows = mysqli_num_rows($result);

?>

<div class="panel-body">


<?php

//echo "</form>";

//}else{


echo "<div class=\"text-justify col-sm-4\" >";
?>

<form id="mForm" name="mForm" action="<?php echo $PHP_SELF;?>" method="post">

<?php

$cresult = mysqli_query($con,"SELECT PClientFirstName, PClientLastName, SClientFirstName, SClientLastName FROM tbl_Client where BWClientID='$CID'");
$result = mysqli_query($con,"SELECT * FROM tbl_Attendance where BWClientID='$CID'");

$crow = mysqli_fetch_array($cresult);
$row = mysqli_fetch_array($result);

if ($row){
   // echo "Good";
}else{
   $sql="insert into tbl_Attendance (BWClientID, Orientation, Unit1, Unit2, Unit3, Unit4, Unit5, Unit6, Unit7, Unit8, Unit9, Unit10)
        values ('$CID','','','','','','','','','','','')";
     $query = mysqli_query($con, $sql);
     
    $result = mysqli_query($con,"SELECT * FROM tbl_Attendance where BWClientID='$CID'");
    $row = mysqli_fetch_array($result);

}

echo"<input class=\"input\" type=\"hidden\" name=\"ID\" id=\"ID\" value=\"$CID\">";
echo"<input class=\"input\" type=\"hidden\" name=\"SRC\" id=\"SRC\" value=\"H\">";

echo "<label for=\"usr\">First Name: </label>";
echo "<input type=\"text\" readonly=\"true\" class=\"form-control\" name=\"a1\" id=\"a1\" value=\"$crow[PClientFirstName]\">";

echo "<label for=\"usr\">Last Name:</label>";
echo "<input type=\"text\" readonly=\"true\" class=\"form-control\" name=\"a2\" id=\"a2\" value=\"$crow[PClientLastName]\">";

echo "<label for=\"usr\">2nd First Name:</label>";
echo "<input type=\"text\" readonly=\"true\" class=\"form-control\" name=\"a3\" id=\"a3\" value=\"$crow[SClientFirstName]\">";

echo "<label for=\"usr\">2nd Last Name:</label>";
echo "<input type=\"text\" readonly=\"true\" class=\"form-control\" name=\"a4\" id=\"a4\" value=\"$crow[SClientLastName]\">";

echo "<label for=\"usr\">Orientation:</label>"; echo "   <font size=2pt;>(mm/dd/yyyy)</font>";
if ($row[Orientation] == "0000-00-00"){
   $TOrientation='';
}else{
  $TOrientation=substr(date_format(date_create($row[Orientation]),"m/d/Y"), 0, 10);
}
echo "<input type=\"text\" class=\"form-control\" name=\"a5\" id=\"a5\" value=\"$TOrientation\">";
echo "</div>";

echo "<div class=\"text-justify col-sm-4\" >";

echo "<label for=\"usr\">Unit1: </label>"; echo "   <font size=2pt;>(mm/dd/yyyy)</font>";
if ($row[Unit1] == "0000-00-00"){
   $TUnit1='';
}else{
  $TUnit1=substr(date_format(date_create($row[Unit1]),"m/d/Y"), 0, 10);
}
echo "<input type=\"text\" class=\"form-control\" name=\"a6\" id=\"a6\" value=\"$TUnit1\">";

echo "<label for=\"usr\">Unit2: </label>"; echo "   <font size=2pt;>(mm/dd/yyyy)</font>";
if ($row[Unit2] == "0000-00-00"){
   $TUnit2='';
}else{
  $TUnit2=substr(date_format(date_create($row[Unit2]),"m/d/Y"), 0, 10);
}
echo "<input type=\"text\" class=\"form-control\" name=\"a7\" id=\"a7\" value=\"$TUnit2\">";

echo "<label for=\"usr\">Unit3: </label>"; echo "   <font size=2pt;>(mm/dd/yyyy)</font>";
if ($row[Unit3] == "0000-00-00"){
   $TUnit3='';
}else{
  $TUnit3=substr(date_format(date_create($row[Unit3]),"m/d/Y"), 0, 10);
}
echo "<input type=\"text\" class=\"form-control\" name=\"a8\" id=\"a8\" value=\"$TUnit3\">";

echo "<label for=\"usr\">Unit4: </label>"; echo "   <font size=2pt;>(mm/dd/yyyy)</font>";
if ($row[Unit4] == "0000-00-00"){
   $TUnit4='';
}else{
  $TUnit4=substr(date_format(date_create($row[Unit4]),"m/d/Y"), 0, 10);
}
echo "<input type=\"text\" class=\"form-control\" name=\"a9\" id=\"a9\" value=\"$TUnit4\">";

echo "<label for=\"usr\">Unit5: </label>"; echo "   <font size=2pt;>(mm/dd/yyyy)</font>";
if ($row[Unit5] == "0000-00-00"){
   $TUnit5='';
}else{
  $TUnit5=substr(date_format(date_create($row[Unit5]),"m/d/Y"), 0, 10);
}
echo "<input type=\"text\" class=\"form-control\" name=\"a10\" id=\"a10\" value=\"$TUnit5\">";
echo "</div>";

echo "<div class=\"text-justify col-sm-4\" >";
echo "<label for=\"usr\">Unit6: </label>"; echo "   <font size=2pt;>(mm/dd/yyyy)</font>";
if ($row[Unit6] == "0000-00-00"){
   $TUnit6='';
}else{
  $TUnit6=substr(date_format(date_create($row[Unit6]),"m/d/Y"), 0, 10);
}
echo "<input type=\"text\" class=\"form-control\" name=\"a11\" id=\"a11\" value=\"$TUnit6\">";

echo "<label for=\"usr\">Unit7: </label>"; echo "   <font size=2pt;>(mm/dd/yyyy)</font>";
if ($row[Unit7] == "0000-00-00"){
   $TUnit7='';
}else{
  $TUnit7=substr(date_format(date_create($row[Unit7]),"m/d/Y"), 0, 10);
}
echo "<input type=\"text\" class=\"form-control\" name=\"a12\" id=\"a12\" value=\"$TUnit7\">";

echo "<label for=\"usr\">Unit8: </label>"; echo "   <font size=2pt;>(mm/dd/yyyy)</font>";
if ($row[Unit8] == "0000-00-00"){
   $TUnit8='';
}else{
  $TUnit8=substr(date_format(date_create($row[Unit8]),"m/d/Y"), 0, 10);
}
echo "<input type=\"text\" class=\"form-control\" name=\"a13\" id=\"a13\" value=\"$TUnit8\">";

echo "<label for=\"usr\">Unit9: </label>"; echo "   <font size=2pt;>(mm/dd/yyyy)</font>";
if ($row[Unit9] == "0000-00-00"){
   $TUnit9='';
}else{
  $TUnit9=substr(date_format(date_create($row[Unit9]),"m/d/Y"), 0, 10);
}
echo "<input type=\"text\" class=\"form-control\" name=\"a14\" id=\"a14\" value=\"$TUnit9\">";

echo "<label for=\"usr\">Unit10 </label>"; echo "   <font size=2pt;>(mm/dd/yyyy)</font>";
if ($row[Unit10] == "0000-00-00"){
   $TUnit10='';
}else{
  $TUnit10=substr(date_format(date_create($row[Unit10]),"m/d/Y"), 0, 10);
}
echo "<input type=\"text\" class=\"form-control\" name=\"a15\" id=\"a15\" value=\"$TUnit10\">";

echo "</div>";


//}

?>
</form>
</body>
</html>

