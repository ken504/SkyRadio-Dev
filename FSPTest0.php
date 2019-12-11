<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Family Stabilization Plan-FSP</title>

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
        <li class="active"><a href="FSP.php">FSP<span class="sr-only">(current)</span></a></li>
        <li><a href="FSP-AttendanceTest0.php">FSP-Attendance</a></li>
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


	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	
	
<?php
$db_host = 'localhost';
$db_user = 'Main';
$db_pwd = '!BWMainPass!';
$database = 'BWProd01';
$table = 'tbl_Client';
$dbport='3306';
$CID=$_GET['ID']; 

echo $CID

?>

	
<div class="container">
  <h1 class="text-center">Family Stabilization Plan</h1>
 	<br>
<div class=" form-group row">
<div class="panel panel-primary">

	<div class="panel-heading">
		<center>
		<div class="btn-group">
  		  <button type="button" class="btn btn-default" onclick="javascript: document.location='Home.php'">Home</button>
		  <button type="button" class="btn btn-success"data-toggle="modal" data-target="#snapshotModal">$napShot</button>
		  <button type="button" class="btn btn-default" onclick="javascript: document.location='FSP.php'">New Record</button>
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
	<button type="button" class="btn btn-default" data-dismiss="modal"  onclick="javascript: document.mForm.action='Delete.php'; document.mForm.submit();" >Yes</button>
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
  <div class="modal-dialog" style="width: 925px !important; height: 375px;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header text-center alert-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Financial SnapShot!</h4>
      </div>
      <div class="modal-body text-center">
      <center>
		  <div id='chart_div2' style="width: 925px !important; height: 375px;"></div>
	  </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		
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
$PCFirstName=$_POST['a1']; 
$PCLastName=$_POST['a2']; 
$SCFirstName=$_POST['a3']; 
$SCLastName=$_POST['a4'];  
$PDOB=$_POST['a5'];
$SDOB=$_POST['a6'];
$POccupation=$_POST['a7'];
$SOccupation=$_POST['a8'];
$ClientAddress=$_POST['a9'];
$ClientCity=$_POST['a10'];
$ClientState=$_POST['a11'];
$ClientZip=$_POST['a12'];
$ClientCounty=$_POST['a13'];
$ClientCountry=$_POST['a14'];
$ClientMaritalStatus=$_POST['MaritalSel'];
$BWClientID=$_POST['b1'];
$DataCollectionDate=$_POST['b2'];
$AdultCountHome=$_POST['b3'];
$MinorCountHome=$_POST['b4'];
$HouseEmployedCount=$_POST['b5'];
$InitialRent=$_POST['b6'];
$InitialSavings=$_POST['b7'];
$HouseholdIncome=$_POST['b8'];
$AMI=$_POST['b9'];
$InitialCreditScore=$_POST['b10'];
$InitialDebt=$_POST['b11'];
$StudentLoan1=$_POST['b12'];
$StudentLoan2=$_POST['b13'];
$ProgramYear=$_POST['c1'];
$ReferredBy=$_POST['c2'];
$CoachName=$_POST['c3'];
$CoachPhone=$_POST['c4'];
$ClientAffiliate=$_POST['c5'];	
$PropertyType=$_POST['c6'];
$MonthsRecievedServices=$_POST['c7'];
$PClientPhone=$_POST['p1'];
$PClientEmail=$_POST['c13'];
$Barrier1=$_POST['c8'];
$Barrier2=$_POST['c9'];
$Banked=$_POST['BankSel'];
$FirstGenOwner=$_POST['rd1'];
$PClientEmployed=$_POST['rd2'];
$SClientEmployed=$_POST['rd3'];
$FinancialTraining=$_POST['rd4'];
$OwnPropertyInterest=$_POST['rd5'];
$FurtherFinancialInterest=$_POST['txtFMoreInfo'];
$FinancialChallenge=$_POST['txtFinChallenge'];

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

$sql="insert into tbl_Client (BWClientID, PClientFirstName, PClientLastName, SClientFirstName, SClientLastName, PDOB, SDOB, 
POccupation, SOccupation, ClientAddress, ClientCity, ClientState, ClientZip, ClientCounty, ClientCountry, ClientMaritalStatus,
DataCollectionDate, AdultCountHome, MinorCountHome, HouseEmployedCount, InitialRent, InitialSavings, HouseholdIncome, AMI,
InitialCreditScore, InitialDebt, StudentLoan1, StudentLoan2, ProgramYear, ReferredBy, CoachName, CoachPhone, ClientAffiliate,
PropertyType, MonthsRecievedServices, PClientPhone, PClientEmail, Barrier1, Barrier2, Banked, FirstGenOwner,
PClientEmployed, SClientEmployed, FinancialTraining, OwnPropertyInterest, FurtherFinancialInterest, FinancialChallenge
) 
values 
('$BWClientID','$PCFirstName','$PCLastName','$SCFirstName','$SCLastName','$PDOB','$SDOB', 
'$POccupation','$SOccupation','$ClientAddress','$ClientCity','$ClientState','$ClientZip','$ClientCounty','$ClientCountry','$ClientMaritalStatus',
'$DataCollectionDate','$AdultCountHome','$MinorCountHome','$HouseEmployedCount','$InitialRent','$InitialSavings','$HouseholdIncome','$AMI',
'$InitialCreditScore', '$InitialDebt','$StudentLoan1','$StudentLoan2','$ProgramYear','$ReferredBy','$CoachName','$CoachPhone','$ClientAffiliate',
'$PropertyType','$MonthsRecievedServices','$PClientPhone','$PClientEmail','$Barrier1','$Barrier2', '$Banked','$FirstGenOwner',
'$PClientEmployed','$SClientEmployed','$FinancialTraining','$OwnPropertyInterest','$FurtherFinancialInterest','$FinancialChallenge'
)";
$query = mysqli_query($con, $sql);

//$CID=$BWClientID;
$SRC='F';
}

if ($SRC == 'D')
{
echo 'here';

echo $SRC;
echo $CID;

$sql="delete {$table} where BWClientID='$CID'";
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
PClientFirstName='$PCFirstName', PClientLastName='$PCLastName', SClientFirstName='$SCFirstName', SClientLastName='$SCLastName', 
PDOB='$PDOB', SDOB='$SDOB', POccupation='$POccupation', SOccupation='$SOccupation', ClientAddress='$ClientAddress',
ClientCity='$ClientCity', ClientState='$ClientState', ClientZip='$ClientZip', ClientCounty='$ClientCounty', ClientCountry='$ClientCountry',
ClientMaritalStatus='$ClientMaritalStatus', DataCollectionDate='$DataCollectionDate', AdultCountHome='$AdultCountHome',
MinorCountHome='$MinorCountHome', HouseEmployedCount='$HouseEmployedCount', InitialRent='$InitialRent', InitialSavings='$InitialSavings', 
HouseholdIncome='$HouseholdIncome',AMI='$AMI', InitialCreditScore='$InitialCreditScore', InitialDebt='$InitialDebt', 
StudentLoan1='$StudentLoan1', StudentLoan2='$StudentLoan2', ProgramYear='$ProgramYear', ReferredBy='$ReferredBy',
CoachName='$CoachName', CoachPhone='$CoachPhone', ClientAffiliate='$ClientAffiliate', PropertyType='$PropertyType',
MonthsRecievedServices='$MonthsRecievedServices', PClientPhone='$PClientPhone', PClientEmail='$PClientEmail',
Barrier1='$Barrier1', Barrier2='$Barrier2', Banked='$Banked', FirstGenOwner=$FirstGenOwner, PClientEmployed=$PClientEmployed,
SClientEmployed=$SClientEmployed, FinancialTraining=$FinancialTraining, OwnPropertyInterest=$OwnPropertyInterest,
FurtherFinancialInterest='$FurtherFinancialInterest', FinancialChallenge='$FinancialChallenge'

where BWClientID='$CID'";
$query = mysqli_query($con, $sql);
}

}


// Query the database
$result = mysqli_query($con,"SELECT * FROM {$table} where BWClientID='$CID'");

$num_rows = mysqli_num_rows($result);

if ($num_rows > 0){

	
while($row = mysqli_fetch_array($result)) {

echo "<div class=\"text-justify col-sm-4\" >";
?>

<form id="mForm" name="mForm" action="<?php echo $PHP_SELF;?>" method="post">

<?php
echo"<input class=\"input\" type=\"hidden\" name=\"ID\" id=\"ID\" value=\"$row[BWClientID]\">";
echo"<input class=\"input\" type=\"hidden\" name=\"SRC\" id=\"SRC\" value=\"H\">";

echo "<label for=\"usr\">First Name: </label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a1\" id=\"a1\" value=\"$row[PClientFirstName]\">";

echo "<label for=\"usr\">Last Name:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a2\" id=\"a2\" value=\"$row[PClientLastName]\">";

echo "<label for=\"usr\">2nd First Name:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a3\" id=\"a3\" value=\"$row[SClientFirstName]\">";

echo "<label for=\"usr\">2nd Last Name:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a4\" id=\"a4\" value=\"$row[SClientLastName]\">";

echo "<label for=\"usr\">Primary DOB:</label>";
echo "<input type=\"date\" class=\"form-control\" name=\"a5\" id=\"a5\" value=\"$row[PDOB]\">";

echo "<label for=\"usr\">2nd DOB:</label>";
echo "<input type=\"date\" class=\"form-control\" name=\"a6\" id=\"a6\" value=\"$row[SDOB]\">";

echo "<label for=\"usr\">Primary Occupation:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a7\" id=\"a7\" value=\"$row[POccupation]\">";

echo "<label for=\"usr\">2nd Occupation:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a8\" id=\"a8\" value=\"$row[SOccupation]\">";

echo "<label for=\"usr\">Address:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a9\" id=\"a9\" value=\"$row[ClientAddress]\">";

echo "<label for=\"usr\">City:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a10\" id=\"a10\" value=\"$row[ClientCity]\">";

echo "<label for=\"usr\">State:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a11\" id=\"a11\" value=\"$row[ClientState]\">";

echo "<label for=\"usr\">Zip:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a12\" id=\"a12\" value=\"$row[ClientZip]\">";

echo "<label for=\"usr\">County:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a13\" id=\"a13\" value=\"$row[ClientCounty]\">";

echo "<label for=\"usr\">Country:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a14\" id=\"a14\" value=\"$row[ClientCountry]\">";

echo "<label for=\"usr\">Marital Status:</label>";
echo "<select class=\"form-control\" name=\"MaritalSel\" id=\"MaritalSel\">";
    echo "<option value=\"$row[ClientMaritalStatus]\" selected=\"True\">$row[ClientMaritalStatus]</option>";
     echo "<option value=\"Single\">Single</option>";
     echo "<option value=\"Divorced\">Divorced</option>";
     echo "<option value=\"Married\">Married</option>";
     echo "<option value=\"Seperated\">Seperated</option>";
     
echo "</select>";
echo "</div>";

echo "<div class=\"col-sm-4 text-justify\">";

echo "<label for=\"usr\">Client ID:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"b1\" id=\"b1\" value=\"$row[BWClientID]\">";

echo "<label for=\"usr\">Data Collection Date:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"b2\" id=\"b2\" value=\"$row[DataCollectionDate]\">";
  		
echo "<label for=\"usr\"># of Adults:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\" name=\"b3\" id=\"b3\" value=\"$row[AdultCountHome]\">";
		
echo "<label for=\"usr\"># of Minor Children:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\"  name=\"b4\" id=\"b4\" value=\"$row[MinorCountHome]\">";
  		
echo "<label for=\"usr\">Household # Employed:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\"  name=\"b5\" id=\"b5\" value=\"$row[HouseEmployedCount]\">";
  		
echo "<label for=\"usr\">Initial Rent:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\" name=\"b6\" id=\"b6\" value=\"$row[InitialRent]\">";
  		
echo "<label for=\"usr\">Initial Savings:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\"  name=\"b7\" id=\"b7\" value=\"$row[InitialSavings]\">";
  		
echo "<label for=\"usr\">Household Income:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\" name=\"b8\" id=\"b8\" value=\"$row[HouseholdIncome]\">";
  		
echo "<label for=\"usr\">(AMI) Area Median Income:</label>";
echo "<input type=\"text\" class=\"form-control\"  name=\"b9\" id=\"b9\" value=\"$row[AMI]\">";
  		
echo "<label for=\"usr\">Credit Score:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\" name=\"b10\" id=\"b10\" value=\"$row[InitialCreditScore]\">";
  		
echo "<label for=\"usr\">Collections/Judgements:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\" name=\"b11\" id=\"b11\" value=\"$row[InitialDebt]\">";
		
echo "<label for=\"usr\">Credit Cards/Unsecured Balance:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\" name=\"b12\" id=\"b12\" value=\"$row[StudentLoan1]\">";
  		
echo "<label for=\"usr\">Student Loan Balance:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\" name=\"b13\" id=\"b13\" value=\"$row[StudentLoan2]\">";		
	
echo "<label for=\"usr\">Secured/Auto/Etc:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\" name=\"b13\" id=\"b13\" value=\"$row[StudentLoan2]\">";	
	

echo "</div>";

echo "<div class=\"col-sm-4 text-justify\">";
    
echo "<label for=\"usr\">Program Year</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"c1\" id=\"c1\" value=\"$row[ProgramYear]\">";	
  		
echo "<label for=\"usr\">Referred By:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"c2\" id=\"c2\" value=\"$row[ReferredBy]\">";	
 
echo "<label for=\"usr\">Coach Name:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"c3\" id=\"c3\" value=\"$row[CoachName]\">";	
  		
echo "<label for=\"usr\">Coach Phone</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"c4\" id=\"c4\" value=\"$row[CoachPhone]\">";			

echo "<label for=\"usr\">Client Affilate:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"c5\" id=\"c5\" value=\"$row[ClientAffiliate]\">";

echo "<label for=\"usr\">Property Type</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"c6\" id=\"c6\" value=\"$row[PropertyType]\">";

echo "<label for=\"usr\">Receiving Service # of Months :</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\" name=\"c7\" id=\"c7\" value=\"$row[MonthsRecievedServices]\">";

echo "<label for=\"phone\">Phone #:</label>";
echo "<input type=\"text\" name=\"p1\"  id=\"p1\" value=\"$row[PClientPhone]\" name=\"phone\" data-masked-input=\"999-999-9999\" placeholder=\"XXX-XXX-XXXX\" maxlength=\"12\" class=\" form-control\" >";
echo "<label for=\"usr\">Email:</label>";
echo "<input type=\"text\" value=\"$row[PClientEmail]\" class=\"form-control\" name=\"c13\" id=\"c13\" max=\"35\">";

echo "<label for=\"usr\" >Barrier1:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"c8\" id=\"c8\" value=\"$row[Barrier1]\">";
echo "<label for=\"usr\">Barrier2:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"c9\" id=\"c9\" value=\"$row[Barrier2]\">";

echo "<label for=\"usr\">Banked:</label>";
echo "<select class=\"form-control\" name=\"BankSel\" id=\"BankSel\">";
    echo "<option value=\"$row[Banked]\" selected=\"True\">$row[Banked]</option>";
     echo "<option value=\"Banked\">Banked</option>";
     echo "<option value=\"UnBanked\">UnBanked</option>";
     
echo "</select>";

echo "<label for=\"usr\">1st Generation Y/N:</label>";
echo "</div>";
echo "<div class=\"radio-inline\">";


if ($row[FirstGenOwner] == 1)  
{              
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"1\" name=\"rd1\" id=\"rd1\" checked=\"checked\">Yes</label>";
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"0\" name=\"rd1\" id=\"rd1\">No</label>";
}else{
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"1\" name=\"rd1\" id=\"rd1\">Yes</label>";                
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"0\" name=\"rd1\" id=\"rd1\" checked=\"checked\">No</label>";
}
echo "</div>";


echo "</div>";
echo "</div>";
echo "</div>";
   
?>


	<div class="panel-heading">
		<center>
		<div class="btn-group">
  		  <button type="button" class="btn btn-default" onclick="javascript: document.location='Test5.php'">Home</button>
		  <button type="button" class="btn btn-success">Report</button>
		  <button type="button" class="btn btn-default" onclick="javascript: document.location='FSPTest0.php'">New Record</button>
		  <!--<button type="button" class="btn btn-default">Edit</button>-->

        <button type="button" class="btn btn-default" onclick="javascript: document.mForm.submit();">Save</button>


		  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
		</div>
		</center>
	</div>
	
<?php	
	
	
echo "<div class=\"panel panel-primary\">";
echo "<div class=\"panel-heading\">QUESTIONAIRE</div>";
echo "<div class=\"panel-body\">";


echo "<div class=\"col-sm-3 text-justify\">";
echo "<div>";
echo "<label>Primary Client: Are you employed?</label>";
echo "</div>";

echo "<div class=\"radio-inline\">";

if ($row[PClientEmployed] == 1)  
{              
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"1\" name=\"rd2\" id=\"rd2\" checked=\"checked\">Yes</label>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"0\" name=\"rd2\" id=\"rd2\">No</label>";
}else{
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"1\" name=\"rd2\" id=\"rd2\">Yes</label>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"0\" name=\"rd2\" id=\"rd2\" checked=\"checked\">No</label>";
}

echo "</div>";

echo "<div>";

echo "<label>Secondary Client: Are you employed?</label>";
echo "</div>";

echo "<div class=\"radio-inline\">";

if ($row[SClientEmployed] == 1)   
{              
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"1\" name=\"rd3\" id=\"rd3\" checked=\"checked\">Yes</label>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"0\" name=\"rd3\" id=\"rd3\">No</label>";
}else{
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"1\" name=\"rd3\" id=\"rd3\">Yes</label>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"0\" name=\"rd3\" id=\"rd3\" checked=\"checked\">No</label>";
}


echo "</div>";

echo "</div>";

echo "<div class=\"col-sm-3 text-justify\">";
echo "<div>";
echo "<label>Have you attended financial training?</label>";
echo "</div>";

echo "<div class=\"radio-inline\">";

if ($row[FinancialTraining] == 1)  
{              
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"1\" name=\"rd4\" id=\"rd4\" checked=\"checked\">Yes</label>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"0\" name=\"rd4\" id=\"rd4\">No</label>";
}else{
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"1\" name=\"rd4\" id=\"rd4\">Yes</label>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"0\" name=\"rd4\" id=\"rd4\" checked=\"checked\">No</label>";
}

echo "</div>";

echo "<div>";

echo "<label>Interested in Owning Property?</label>";
echo "</div>";

echo "<div class=\"radio-inline\">";

if ($row[OwnPropertyInterest] == 1)   
{              
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"1\" name=\"rd5\" id=\"rd5\" checked=\"checked\">Yes</label>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"0\" name=\"rd5\" id=\"rd5\">No</label>";
}else{
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"1\" name=\"rd5\" id=\"rd5\">Yes</label>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"0\" name=\"rd5\" id=\"rd5\" checked=\"checked\">No</label>";
}


echo "</div>";

echo "</div>";
echo "<div class=\"col-sm-3 text-justify\">";
echo "<label for=\"comment\">What financial areas you would like to have further information on?</label>";
echo "<textarea class=\"form-control\" rows=\"5\" name=\"txtFMoreInfo\" id=\"txtFMoreInfo\">";
echo $row[FurtherFinancialInterest];
echo "</textarea>";
echo "</div>";

echo "<div class=\"col-sm-3 text-justify\">";
echo "<label for=\"comment\">Financial challenges you are facing currently:</label>";
echo "<textarea class=\"form-control\" rows=\"5\" name=\"txtFinChallenge\" id=\"txtFinChallenge\">";
echo $row[FinancialChallenge];
echo "</textarea>";
echo "</div>";
echo "</div>";

}

//echo "</form>";

}else{


echo "<div class=\"text-justify col-sm-4\" >";
?>

<form id="mForm" name="mForm" action="<?php echo $PHP_SELF;?>" method="post">

<?php
echo"<input class=\"input\" type=\"hidden\" name=\"ID\" id=\"ID\" value=\"\">";
echo"<input class=\"input\" type=\"hidden\" name=\"SRC\" id=\"SRC\" value=\"I\">";

echo "<label for=\"usr\">First Name: </label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a1\" id=\"a1\" value=\"\">";

echo "<label for=\"usr\">Last Name:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a2\" id=\"a2\" value=\"\">";

echo "<label for=\"usr\">2nd First Name:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a3\" id=\"a3\" value=\"\">";

echo "<label for=\"usr\">2nd Last Name:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a4\" id=\"a4\" value=\"\">";

echo "<label for=\"usr\">Primary DOB:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a5\" id=\"a5\" value=\"\">";

echo "<label for=\"usr\">2nd DOB:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a6\" id=\"a6\" value=\"\">";

echo "<label for=\"usr\">Primary Occupation:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a7\" id=\"a7\" value=\"\">";

echo "<label for=\"usr\">2nd Occupation:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a8\" id=\"a8\" value=\"\">";

echo "<label for=\"usr\">Address:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a9\" id=\"a9\" value=\"\">";

echo "<label for=\"usr\">City:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a10\" id=\"a10\" value=\"\">";

echo "<label for=\"usr\">State:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a11\" id=\"a11\" value=\"\">";

echo "<label for=\"usr\">Zip:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a12\" id=\"a12\" value=\"\">";

echo "<label for=\"usr\">County:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a13\" id=\"a13\" value=\"\">";

echo "<label for=\"usr\">Country:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"a14\" id=\"a14\" value=\"\">";

echo "<label for=\"usr\">Marital Status:</label>";
echo "<select class=\"form-control\" name=\"MaritalSel\" id=\"MaritalSel\">";
     echo "<option value=\"Single\" selected=\"True\">Single</option>";
     echo "<option value=\"Divorced\">Divorced</option>";
     echo "<option value=\"Married\">Married</option>";
     echo "<option value=\"Seperated\">Seperated</option>";
     
echo "</select>";
echo "</div>";

echo "<div class=\"col-sm-4 text-justify\">";

echo "<label for=\"usr\">Client ID:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"b1\" id=\"b1\" value=\"\">";

echo "<label for=\"usr\">Data Collection Date:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"b2\" id=\"b2\" value=\"\">";
  		
echo "<label for=\"usr\"># of Adults:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\" name=\"b3\" id=\"b3\" value=\"\">";
		
echo "<label for=\"usr\"># of Minor Children:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\"  name=\"b4\" id=\"b4\" value=\"\">";
  		
echo "<label for=\"usr\">Household # Employed:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\"  name=\"b5\" id=\"b5\" value=\"\">";
  		
echo "<label for=\"usr\">Initial Rent:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\" name=\"b6\" id=\"b6\" value=\"\">";
  		
echo "<label for=\"usr\">Initial Savings:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\"  name=\"b7\" id=\"b7\" value=\"\">";
  		
echo "<label for=\"usr\">Household Income:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\" name=\"b8\" id=\"b8\" value=\"\">";
  		
echo "<label for=\"usr\">(AMI) Area Median Income:</label>";
echo "<input type=\"text\" class=\"form-control\"  name=\"b9\" id=\"b9\" value=\"\">";
  		
echo "<label for=\"usr\">Initial Credit Score:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\" name=\"b10\" id=\"b10\" value=\"\">";
  		
echo "<label for=\"usr\">Initial Debt:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\" name=\"b11\" id=\"b11\" value=\"\">";
		
echo "<label for=\"usr\">Student Loan 1:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\" name=\"b12\" id=\"b12\" value=\"\">";
  		
echo "<label for=\"usr\">Student Loan 2:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\" name=\"b13\" id=\"b13\" value=\"\">";		

echo "</div>";

echo "<div class=\"col-sm-4 text-justify\">";
    
echo "<label for=\"usr\">Program Year</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"c1\" id=\"c1\" value=\"\">";	
  		
echo "<label for=\"usr\">Referred By:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"c2\" id=\"c2\" value=\"\">";	
 
echo "<label for=\"usr\">Coach Name:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"c3\" id=\"c3\" value=\"\">";	
  		
echo "<label for=\"usr\">Coach Phone</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"c4\" id=\"c4\" value=\"\">";			

echo "<label for=\"usr\">Client Affilate:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"c5\" id=\"c5\" value=\"\">";

echo "<label for=\"usr\">Property Type</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"c6\" id=\"c6\" value=\"\">";

echo "<label for=\"usr\">Receiving Service # of Months :</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\" name=\"c7\" id=\"c7\" value=\"\">";

echo "<label for=\"phone\">Phone #:</label>";
echo "<input type=\"text\" name=\"p1\"  id=\"p1\" value=\"\" name=\"phone\" data-masked-input=\"999-999-9999\" placeholder=\"XXX-XXX-XXXX\" maxlength=\"12\" class=\" form-control\" >";
echo "<label for=\"usr\">Email:</label>";
echo "<input type=\"text\" value=\"\" class=\"form-control\" name=\"c13\" id=\"c13\" max=\"35\">";

echo "<label for=\"usr\" >Barrier1:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"c8\" id=\"c8\" value=\"\">";
echo "<label for=\"usr\">Barrier2:</label>";
echo "<input type=\"text\" class=\"form-control\" name=\"c9\" id=\"c9\" value=\"\">";

echo "<label for=\"usr\">Banked:</label>";
echo "<select class=\"form-control\" name=\"BankSel\" id=\"BankSel\">";
     echo "<option value=\"Banked\" selected=\"True\">Banked</option>";
     echo "<option value=\"UnBanked\">UnBanked</option>";
     
echo "</select>";

echo "<label for=\"usr\">1st Generation Y/N:</label>";
echo "</div>";
echo "<div class=\"radio-inline\">";
             
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"1\" name=\"rd1\" id=\"rd1\">Yes</label>";
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"0\" name=\"rd1\" id=\"rd1\">No</label>";

echo "</div>";


echo "</div>";
echo "</div>";
echo "</div>";
   
?>


	<div class="panel-heading">
		<center>
		<div class="btn-group">
  		  <button type="button" class="btn btn-default" onclick="javascript: document.location='Test5.php'">Home</button>
		  <button type="button" class="btn btn-success">Report</button>
		  <button type="button" class="btn btn-default" onclick="javascript: document.location='FSPTest0.php'">New Record</button>
		  <!--<button type="button" class="btn btn-default">Edit</button>-->

        <button type="button" class="btn btn-default" onclick="javascript: document.mForm.submit();">Save</button>


		  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
		</div>
		</center>
	</div>
	
<?php	
	
	
echo "<div class=\"panel panel-primary\">";
echo "<div class=\"panel-heading\">QUESTIONAIRE</div>";
echo "<div class=\"panel-body\">";


echo "<div class=\"col-sm-3 text-justify\">";
echo "<div>";
echo "<label>Primary Client: Are you employed?</label>";
echo "</div>";

echo "<div class=\"radio-inline\">";
            
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"1\" name=\"rd2\" id=\"rd2\">Yes</label>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"0\" name=\"rd2\" id=\"rd2\">No</label>";

echo "</div>";

echo "<div>";

echo "<label>Secondary Client: Are you employed?</label>";
echo "</div>";

echo "<div class=\"radio-inline\">";

    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"1\" name=\"rd3\" id=\"rd3\">Yes</label>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"0\" name=\"rd3\" id=\"rd3\">No</label>";


echo "</div>";

echo "</div>";

echo "<div class=\"col-sm-3 text-justify\">";
echo "<div>";
echo "<label>Have you attended financial training?</label>";
echo "</div>";

echo "<div class=\"radio-inline\">";
             
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"1\" name=\"rd4\" id=\"rd4\">Yes</label>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"0\" name=\"rd4\" id=\"rd4\">No</label>";

echo "</div>";

echo "<div>";

echo "<label>Interested in Owning Property?</label>";
echo "</div>";

echo "<div class=\"radio-inline\">";

    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"1\" name=\"rd5\" id=\"rd5\">Yes</label>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"0\" name=\"rd5\" id=\"rd5\">No</label>";

echo "</div>";

echo "</div>";
echo "<div class=\"col-sm-3 text-justify\">";
echo "<label for=\"comment\">What financial areas you would like to have further information on?</label>";
echo "<textarea class=\"form-control\" rows=\"5\" name=\"txtFMoreInfo\" id=\"txtFMoreInfo\">";
echo "</textarea>";
echo "</div>";

echo "<div class=\"col-sm-3 text-justify\">";
echo "<label for=\"comment\">Financial challenges you are facing currently:</label>";
echo "<textarea class=\"form-control\" rows=\"5\" name=\"txtFinChallenge\" id=\"txtFinChallenge\">";
echo "</textarea>";
echo "</div>";
echo "</div>";
}

?>

	<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Month', 'Jan', 'Feb', 'March', 'April', 'May', 'Average'],
         ['2004/05',  165,      938,         522,             998,           450,      614.6],
         ['2005/06',  135,      1120,        599,             1268,          288,      682],
         ['2006/07',  157,      1167,        587,             807,           397,      623],
         ['2007/08',  139,      1110,        615,             968,           215,      609.4],
         ['2008/09',  136,      691,         629,             1026,          366,      569.6]
      ]);

    var options = {
      title : 'Financial SnapShot',
		width: '500',
		height: '500',
      vAxis: {title: 'Income'},
      hAxis: {title: 'Month'},
      seriesType: 'bars',
      series: {5: {type: 'line'}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }


		</script>
	<script type='text/javascript'>
      google.charts.load('current', {'packages':['annotationchart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('date', 'Date');
        data.addColumn('number', 'User1 snapshot');
        data.addColumn('string', 'Kepler title');
        data.addColumn('string', 'Kepler text');
        data.addColumn('number', 'User1 163 snapshot');
        data.addColumn('string', 'Gliese title');
        data.addColumn('string', 'Gliese text');
        data.addRows([
          [new Date(2018, 7, 15), 12400, undefined, undefined,
                                  10645, undefined, undefined],
          [new Date(2017, 6, 16), 24045, 'Lalibertines', 'First encounter',
                                  12374, undefined, undefined],
          [new Date(2016, 5, 17), 35022, 'Lalibertines', 'They are very tall',
                                  15766, 'Secured/Auto/Etc', 'First Encounter'],
          [new Date(2015, 4, 18), 12284, 'Student Loan Balance', 'Attack on our crew!',
                                  34334, 'Credit Cards/Unsecured Balance', 'Statement of shared principles'],
          [new Date(2014, 3, 19), 8476, 'Collections/Judgements', 'Heavy casualties',
                                  66467, 'Credit Score', '680'],
          [new Date(2013, 2, 20), 34500, 'Household Income', '$34,500yr',
                                  79463, 'Net Income', 'Omniscience achieved']
        ]);

        var chart = new google.visualization.AnnotationChart(document.getElementById('chart_div2'));

        var options = {
	  	displayAnnotations: true,
		width: '850',
		height: '300',
        };

        chart.draw(data, options);
      }
    </script>

</body>
</html>

