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
	
<div class="container">
  <h1 class="text-center">Family Stabilization Plan</h1>
 	<br>
<div class=" form-group row">
<div class="panel panel-primary">
	
	<div class="panel-heading">
		<center>
		<div class="btn-group">
  		  <button type="button" class="btn btn-default" onclick="javascript: document.location='Test5.php'">Home</button>
		  <button type="button" class="btn btn-success">Report</button>
		  <button type="button" class="btn btn-default" onclick="javascript: document.location='FSP.html'">New Record</button>
		  <button type="button" class="btn btn-default">Edit</button>
		  <button type="button" class="btn btn-default" onclick="javascript: document.location='Test5.php'">Save</button>
		  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
		</div>
		</center>
	</div>
	
<!--Delete Modal start	-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Warning!</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this record?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>
<!--Delete Modal end-->	
	
<div class="panel-body">

    

<?php
$db_host = 'localhost';
$db_user = 'Main';
$db_pwd = '!BWMainPass!';
$database = 'BWProd01';
$table = 'tbl_Client';
$dbport='3306';
$CID=$_GET['ID']; 

//echo $CID;
// Create connection
$con = @mysqli_connect($db_host,$db_user,$db_pwd,$database,$dbport);
// Check connection
if (mysqli_connect_errno()) {
     die ("Failed to connect to MySQL using the PHP mysqli extension: " . mysqli_connect_error());
}else{ 
    // echo "<br>The connection to \"$database\" was successful!";
}
// Query the database
$result = mysqli_query($con,"SELECT * FROM {$table} where BWClientID='$CID'");
		


while($row = mysqli_fetch_array($result)) {

echo "<div class=\"text-justify col-sm-4\" >";

echo "<form action=\"MemberUpdate.php\" method=\"post\">";

echo "<label for=\"usr\">First Name: </label>";
echo "<input type=\"text\" class=\"form-control\" id=\"a1\" value=\"$row[PClientFirstName]\">";

echo "<label for=\"usr\">Last Name:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"a2\" value=\"$row[PClientLastName]\">";

echo "<label for=\"usr\">2nd First Name:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"a3\" value=\"$row[SClientFirstName]\">";

echo "<label for=\"usr\">2nd Last Name:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"a4\" value=\"$row[SClientLastName]\">";

echo "<label for=\"usr\">Primary DOB:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"a5\" value=\"$row[PDOB]\">";

echo "<label for=\"usr\">2nd DOB:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"a6\" value=\"$row[SDOB]\">";

echo "<label for=\"usr\">Primary Occupation:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"a7\" value=\"$row[POccupation]\">";

echo "<label for=\"usr\">2nd Occupation:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"a8\" value=\"$row[SOccupation]\">";

echo "<label for=\"usr\">Address:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"a9\" value=\"$row[ClientAddress]\">";

echo "<label for=\"usr\">City:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"a10\" value=\"$row[ClientCity]\">";

echo "<label for=\"usr\">State:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"a11\" value=\"$row[ClientState]\">";

echo "<label for=\"usr\">Zip:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"a12\" value=\"$row[ClientZip]\">";

echo "<label for=\"usr\">County:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"a13\" value=\"$row[ClientCountry]\">";

echo "<label for=\"usr\">Marital Status:</label>";
echo "<select class=\"form-control\" id=\"MaritalSel\">";
    echo "<option value=\"$row[ClientMaritalStatus]\" selected=\"True\">$row[ClientMaritalStatus]</option>";
     echo "<option value=\"Single\">Single</option>";
     echo "<option value=\"Divorced\">Divorced</option>";
     echo "<option value=\"Married\">Married</option>";
     echo "<option value=\"Seperated\">Seperated</option>";
     
echo "</select>";
echo "</div>";

echo "<div class=\"col-sm-4 text-justify\">";

echo "<label for=\"usr\">Client ID:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"b1\" value=\"$row[BWClientID]\">";

echo "<label for=\"usr\">Data Collection Date:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"b2\" value=\"$row[DataCollectionDate]\">";
  		
echo "<label for=\"usr\"># of Adults:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\" id=\"b3\" value=\"$row[AdultCountHome]\">";
		
echo "<label for=\"usr\"># of Minor Children:</label>";
echo "<input type=\"number\" class=\"form-control\" min=\"1\" max=\"10\" id=\"b4\" value=\"$row[MinorCountHome]\">";
  		
echo "<label for=\"usr\">Household # Employed:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"b5\" value=\"$row[HouseEmployedCount]\">";
  		
echo "<label for=\"usr\">Initial Rent:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"b6\" value=\"$row[InitialRent]\">";
  		
echo "<label for=\"usr\">Initial Savings:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"b7\" value=\"$row[InitialSavings]\">";
  		
echo "<label for=\"usr\">Household Income:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"b8\" value=\"$row[HouseholdIncome]\">";
  		
echo "<label for=\"usr\">(AMI) Area Median Income:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"b9\" value=\"$row[AMI]\">";
  		
echo "<label for=\"usr\">Initial Credit Score:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"b10\" value=\"$row[InitialCreditScore]\">";
  		
echo "<label for=\"usr\">Initial Debt:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"b11\" value=\"$row[InitialDebt]\">";
		
echo "<label for=\"usr\">Student Loan 1:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"b12\" value=\"$row[StudentLoan1]\">";
  		
echo "<label for=\"usr\">Student Loan 2:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"b13\" value=\"$row[StudentLoan2]\">";		

echo "</div>";

echo "<div class=\"col-sm-4 text-justify\">";
    
echo "<label for=\"usr\">Program Year</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"c1\" value=\"$row[ProgramYear]\">";	
  		
echo "<label for=\"usr\">Referred By:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"c2\" value=\"$row[ReferredBy]\">";	
 
echo "<label for=\"usr\">Coach Name:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"c3\" value=\"$row[CoachName]\">";	
  		
echo "<label for=\"usr\">Coach Number</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"c4\" value=\"$row[CoachPhone]\">";			

echo "<label for=\"usr\">Client Affilate:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"c5\" value=\"$row[ClientAffiliate]\">";

echo "<label for=\"usr\">Property Type</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"c6\" value=\"$row[PropertyType]\">";

echo "<label for=\"usr\">Receiving Service # of Months :</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"c7\" value=\"$row[MonthsRecievedServices]\">";

echo "<label for=\"phone\">Phone #:</label>";
echo "<input type=\"text\"  value=\"$row[PClientPhone]\" name=\"phone\" data-masked-input=\"999-999-9999\" placeholder=\"XXX-XXX-XXXX\" maxlength=\"12\" class=\" form-control\" >";
echo "<label for=\"usr\">Email:</label>";
echo "<input type=\"text\" value=\"$row[PClientEmail]\" class=\"form-control\" id=\"c13v max=\"35\">";

echo "<label for=\"usr\" >Barrier1:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"c8\" value=\"$row[Barrier1]\">";
echo "<label for=\"usr\">Barrier2:</label>";
echo "<input type=\"text\" class=\"form-control\" id=\"c9\" value=\"$row[Barrier2]\">";

echo "<label for=\"usr\">Banked:</label>";
echo "<select class=\"form-control\" id=\"MaritalSel\">";
    echo "<option value=\"$row[Banked]\" selected=\"True\">$row[Banked]</option>";
     echo "<option value=\"Banked\">Banked</option>";
     echo "<option value=\"UnBanked\">UnBanked</option>";
     
echo "</select>";

echo "<label for=\"usr\">1st Generation Y/N:</label>";
echo "</div>";
echo "<div class=\"radio-inline\">";
if ($row[FirstGenOwner] == 1)                  
    echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadFirstGen\" checked=\"checked\">Yes</label>";
 else
    echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadFirstGen\" checked=\"checked\">No</label>";
echo "</div>";

echo "<div class=\"radio-inline\">";
if ($row[FirstGenOwner] == 0)                  
    echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadFirstGen\" checked=\"checked\">No</label>";
 else
     echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadFirstGen\">No</label>";
echo "</div>";

echo "</div>";
echo "</div>";
echo "</div>";
   

echo "<div class=\"panel panel-primary\">";
echo "<div class=\"panel-heading\">QUESTIONAIRE</div>";
echo "<div class=\"panel-body\">";


echo "<div class=\"col-sm-3 text-justify\">";
echo "<div>";
echo "<label>Primary Client: Are you employed?</label>";
echo "</div>";
echo "<div class=\"radio-inline\">";
if ($row[PClientEmployed] == 1)                  
    echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadPEmployed\" checked=\"checked\">Yes</label>";
 else
     echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadPEmployed\">Yes</label>";
echo "</div>";

echo "<div class=\"radio-inline\">";
if ($row[PClientEmployed] == 0)                  
    echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadPEmployed\" checked=\"checked\">No</label>";
 else
     echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadPEmployed\">No</label>";
echo "</div>";

echo "<div>";

echo "<label>Secondary Client: Are you employed?</label>";
echo "</div>";
echo "<div class=\"radio-inline\">";
if ($row[PClientEmployed] == 1)                  
    echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadSEmployed\" checked=\"checked\">Yes</label>";
 else
     echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadSEmployed\">Yes</label>";
echo "</div>";

echo "<div class=\"radio-inline\">";
if ($row[PClientEmployed] == 0)                  
    echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadSEmployed\" checked=\"checked\">No</label>";
 else
     echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadSEmployed\">No</label>";
echo "</div>";

echo "</div>";

echo "<div class=\"col-sm-3 text-justify\">";
echo "<div>";
echo "<label>Have you attended financial training?</label>";
echo "</div>";
echo "<div class=\"radio-inline\">";
if ($row[FinancialTraining] == 1)                  
    echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadFTrain\" checked=\"checked\">Yes</label>";
 else
     echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadFTrain\">Yes</label>";
echo "</div>";

echo "<div class=\"radio-inline\">";
if ($row[FinancialTraining] == 0)                  
    echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadFTrain\" checked=\"checked\">No</label>";
 else
     echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadFTrain\">No</label>";
echo "</div>";

echo "<div>";
echo "<label>Any interest in owning property?</label>";
echo "</div>";

echo "<div class=\"radio-inline\">";
if ($row[OwnPropertyInterest] == 1)                  
    echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadOwnProd\" checked=\"checked\">Yes</label>";
 else
     echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadOwnProd\">Yes</label>";
echo "</div>";

echo "<div class=\"radio-inline\">";
if ($row[OwnPropertyInterest] == 0)                  
    echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadOwnProd\" checked=\"checked\">Yes</label>";
 else
     echo "<label class=\"radio-inline\"><input type=\"radio\" name=\"RadOwnProd\">Yes</label>";
echo "</div>";

echo "</form>";

echo "</div>";

echo "<div class=\"col-sm-3 text-justify\">";
echo "<label for=\"comment\">What financial areas you would like to have further information on?</label>";
echo "<textarea class=\"form-control\" rows=\"5\" id=\"txtFMoreInfo\">";
echo $row[FurtherFinancialInterest];
echo "</textarea>";
echo "</div>";

echo "<div class=\"col-sm-3 text-justify\">";
echo "<label for=\"comment\">Financial challenges you are facing currently:</label>";
echo "<textarea class=\"form-control\" rows=\"5\" id=\"txtFinChallenge\">";
echo $row[FinancialChallenge];
echo "</textarea>";
echo "</div>";
echo "</div>";

}

?>
						  
  <hr>
 
  <div class="row">
    <div class="text-center col-md-6 col-md-offset-3">
      <h4>Build Wealth </h4>
      <p>Copyright &copy; 2018 &middot; All Rights Reserved &middot; <a href="http://yourwebsite.com/" >Build Wealth Management System</a></p>
    </div>
  </div>
  <hr>
</div>

</body>
</html>

