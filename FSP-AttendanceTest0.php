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
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="home.html"><span style="color: red">B</span><span style="color: blue">W</span>Management System</a></div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="FSP.html">FSP<span class="sr-only">(current)</span></a></li>
        <li><a href="FSP-Attendance.html">FSP-Attendance</a></li>
		<li><a href="FSP-Payment.html">FSP-Payment</a></li>
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
$CID=$_GET['ID']; 

?>

	
<div class="container">
  <h1 class="text-center">FSP Attendance</h1>
 	<br>
<div class=" form-group row">
<div class="panel panel-primary">

	<div class="panel-heading">
		<center>
		<div class="btn-group">
  		  <button type="button" class="btn btn-default" onclick="javascript: document.location='Test5.php'">Home</button>
		  <button type="button" class="btn btn-success"data-toggle="modal" data-target="#snapshotModal">$napShot</button>
		  <button type="button" class="btn btn-default" onclick="javascript: document.location='FSP-AttendanceTest0.php'">New Record</button>
		  <!--<button type="button" class="btn btn-default">Edit</button>-->

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

    
         <button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript: document.location='Delete.php';">Yes</button>
            Yes
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
	
<div class="panel-body">
	
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

//echo $CID;
//echo $StudentLoan1;
//echo $FirstGenOwner;

//echo $_POST['SRC'];
	
if ($SRC == 'I')
{
//echo 'here';

$sql="insert into Attendance (BWClientID, Orientation, Unit1, Unit2, Unit3, Unit4, Unit5, Unit6, Unit7, Unit8, Unit9, Unit10)
values 
('$BWClientID','$Orientation','$Unit1','$Unit2','$Unit3','$Unit4','$Unit5','$Unit6','$Unit7','$Unit8','$Unit9','$Unit10')";
$query = mysqli_query($con, $sql);

//$CID=$BWClientID;
$SRC='F';
}

//echo $SRC;
//echo $CID;

if ($SRC == 'H')
{
//echo 'here';

$sql="update {$table} set
BWClientID='$BWClientID', Orientation='$Orientation', Unit1='$Unit1', Unit2='$Unit2', 
Unit3='$Unit3', Unit4='$Unit4', Unit5='$Unit5', Unit6='$Unit6', Unit7='$Unit7',
Unit8='$Unit8', Unit9='$Unit9', Unit10='$Unit10'

where BWClientID='$CID'";
$query = mysqli_query($con, $sql);
}

}


// Query the database
$result = mysqli_query($con,"SELECT c.PClientFirstName, c.PClientLastName, SClientFirstName, SClientFirstName, a.* FROM `Attendance` a Join tbl_Client c on c.BWClientID=a.BWClientID where a.BWClientID='$CID'");

$num_rows = mysqli_num_rows($result);

if ($num_rows > 0){

	
while($row = mysqli_fetch_array($result)) {

echo "<div class=\"text-justify col-sm-4\" >";
?>

<form id="mForm" name="mForm" action="<?php echo $PHP_SELF;?>" method="post">

<?php
echo"<input class=\"input\" type=\"hidden\" name=\"ID\" id=\"ID\" value=\"$CID\">";
echo"<input class=\"input\" type=\"hidden\" name=\"SRC\" id=\"SRC\" value=\"H\">";

echo "<label for=\"usr\">First Name: </label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a1\" id=\"a1\" value=\"$row[PClientFirstName]\">";

echo "<label for=\"usr\">Last Name:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a2\" id=\"a2\" value=\"$row[PClientLastName]\">";

echo "<label for=\"usr\">2nd First Name:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a3\" id=\"a3\" value=\"$row[SClientFirstName]\">";

echo "<label for=\"usr\">2nd Last Name:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a4\" id=\"a4\" value=\"$row[SClientLastName]\">";

echo "<label for=\"usr\">Orientation:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a5\" id=\"a5\" value=\"$row[Orientation]\">";
echo "</div>";

echo "<div class=\"text-justify col-sm-4\" >";
echo "<label for=\"usr\">Unit1: </label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a6\" id=\"a6\" value=\"$row[Unit1]\">";

echo "<label for=\"usr\">Unit2:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a7\" id=\"a7\" value=\"$row[Unit2]\">";

echo "<label for=\"usr\">Unit3:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a8\" id=\"a8\" value=\"$row[Unit3]\">";

echo "<label for=\"usr\">Unit4:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a9\" id=\"a9\" value=\"$row[Unit4]\">";

echo "<label for=\"usr\">Unit5:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a10\" id=\"a10\" value=\"$row[Unit5]\">";
echo "</div>";

echo "<div class=\"text-justify col-sm-4\" >";
echo "<label for=\"usr\">Unit6: </label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a11\" id=\"a11\" value=\"$row[Unit6]\">";

echo "<label for=\"usr\">Unit7:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a12\" id=\"a12\" value=\"$row[Unit7]\">";

echo "<label for=\"usr\">Unit8:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a13\" id=\"a13\" value=\"$row[Unit8]\">";

echo "<label for=\"usr\">Unit9:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a14\" id=\"a14\" value=\"$row[Unit9]\">";

echo "<label for=\"usr\">Unit10:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a15\" id=\"a15\" value=\"$row[Unit10]\">";

echo "</div>";

}

//echo "</form>";

}else{


echo "<div class=\"text-justify col-sm-4\" >";
?>

<form id="mForm" name="mForm" action="<?php echo $PHP_SELF;?>" method="post">

<?php
echo"<input class=\"input\" type=\"hidden\" name=\"ID\" id=\"ID\" value=\"$CID\">";
echo"<input class=\"input\" type=\"hidden\" name=\"SRC\" id=\"SRC\" value=\"H\">";

echo "<label for=\"usr\">First Name: </label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a1\" id=\"a1\" value=\"$row[PClientFirstName]\">";

echo "<label for=\"usr\">Last Name:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a2\" id=\"a2\" value=\"$row[PClientLastName]\">";

echo "<label for=\"usr\">2nd First Name:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a3\" id=\"a3\" value=\"$row[SClientFirstName]\">";

echo "<label for=\"usr\">2nd Last Name:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a4\" id=\"a4\" value=\"$row[SClientLastName]\">";

echo "<label for=\"usr\">Orientation:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a5\" id=\"a5\" value=\"$row[Orientation]\">";
echo "</div>";

echo "<div class=\"text-justify col-sm-4\" >";
echo "<label for=\"usr\">Unit1: </label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a6\" id=\"a6\" value=\"$row[Unit1]\">";

echo "<label for=\"usr\">Unit2:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a7\" id=\"a7\" value=\"$row[Unit2]\">";

echo "<label for=\"usr\">Unit3:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a8\" id=\"a8\" value=\"$row[Unit3]\">";

echo "<label for=\"usr\">Unit4:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a9\" id=\"a9\" value=\"$row[Unit4]\">";

echo "<label for=\"usr\">Unit5:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a10\" id=\"a10\" value=\"$row[Unit5]\">";
echo "</div>";

echo "<div class=\"text-justify col-sm-4\" >";
echo "<label for=\"usr\">Unit6: </label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a11\" id=\"a11\" value=\"$row[Unit6]\">";

echo "<label for=\"usr\">Unit7:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a12\" id=\"a12\" value=\"$row[Unit7]\">";

echo "<label for=\"usr\">Unit8:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a13\" id=\"a13\" value=\"$row[Unit8]\">";

echo "<label for=\"usr\">Unit9:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a14\" id=\"a14\" value=\"$row[Unit9]\">";

echo "<label for=\"usr\">Unit10:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a15\" id=\"a15\" value=\"$row[Unit10]\">";

echo "</div>";


}

?>

</body>
</html>

