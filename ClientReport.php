<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BW Client Report</title>
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

// Create connection
$con = @mysqli_connect($db_host,$db_user,$db_pwd,$database,$dbport);
// Check connection
if (mysqli_connect_errno()) {
     die ("Failed to connect to MySQL using the PHP mysqli extension: " . mysqli_connect_error());
}else{ 
    // echo "<br>The connection to \"$database\" was successful!";
}

// Query the database
$result = mysqli_query($con,"SELECT * FROM tbl_Client where BWClientID='$CID'");

$row = mysqli_fetch_array($result);

?>
</head>
	
<body class="background">
   <button type="button" class="btn btn-default" onclick="javascript: document.location='FSP.php'">Back</button>
<?php
  echo "<div class=\"container\">";
  echo "<center>";
  echo "<h4 class=\"text-center\">";
   echo "Homeownership Capacity Data Collection System<br>";
       echo "Client Summary Report";
  echo "</h4>";
  echo "</center>";
  
  echo "<div style=\"position: absolute; right: 350px; top: 50px; \">";
  echo "Report Date:&nbsp;";
  
  echo date('l', strtotime(date("F j, Y")));
  echo ",&nbsp;";
  echo date("F j, Y");
  echo "</div>";
  
 echo "<br><br>";

$cresult = mysqli_query($con,"SELECT * FROM tbl_Client where BWClientID='$CID'");

$crow = mysqli_fetch_array($cresult);

if ($crow){
echo "<center>";
echo "<table width=\"95%\" border=\"0\">";
echo "<tr>";
  echo "<td><b>Primary Client:</b>&nbsp;&nbsp;$crow[PClientLastName]&nbsp;$crow[PClientFirstName]</td>";
  echo "<td>&nbsp;</td>";
  
  echo "<td><b>Secondary Client:</b>&nbsp;&nbsp;$crow[SClientLastName];$crow[SClientFirstName]</td>";
  echo "<td>&nbsp;</td>";
  
  echo "<td>&nbsp;</td>";
  echo "<td>&nbsp;</td>";
  echo "<td>&nbsp;</td>";
//****************************

  echo "</tr>";
  echo "<tr>";
  
  echo "<td><b>Program Year:</b>&nbsp;&nbsp;";

        $PYear=trim($crow[ProgramYear]);
        if (strlen($PYear)==10){
            $TYear=substr($PYear, 6, 4);
            echo $TYear;
            echo "&nbsp;-&nbsp;";
            echo $TYear + 1;
        }else{
            echo "$nbsp";
        }   
        
  echo "</td>";
  echo "<td>&nbsp;</td>";
  
  echo "<td>&nbsp;</td>";
  echo "<td>&nbsp;</td>";

  echo "<td><b>Coach:</b>&nbsp;&nbsp; $crow[CoachName] </td>";
  echo "<td>&nbsp;</td>";
 
  echo "<td>&nbsp;</td>";
//**************************** 
  echo "</tr>";
  echo "<tr>";
  
  echo "<td><b>Client Address:</b>&nbsp;&nbsp;";
  
     echo $row[ClientAddress];
        
  echo "</td>";
  echo "<td>&nbsp;</td>";
  
  echo "<td><b>City:</b>&nbsp;&nbsp;  $crow[ClientCity] </td>";
  echo "<td>&nbsp;</td>";

  echo "<td><b>Zip:</b>&nbsp;  $crow[ClientZip] </td>";
  echo "<td>&nbsp;</td>";
 
  echo "<td><b>County:</b>&nbsp;  $crow[ClientCounty] </td>";
//****************************
  echo "</tr>";
  echo "<tr>";
  
  echo "<td><b>First gen HB:</b>$nbsp&nbsp";
  
    if ($row[FirstGenOwner]==1){
        echo "Yes";
    }else{
      echo "No";
    }
  
  echo "</td>";
  echo "<td>&nbsp;</td>";
  
  echo "<td><b># of Adults in HH:</b>&nbsp;  $crow[AdultCountHome] </td>";
  echo "<td>&nbsp;</td>";
  
  echo "<td><b># of Minor Children in HH:</b>&nbsp;  $crow[MinorCountHome] </td>";
  echo "<td>&nbsp;</td>";
 
echo "<td>&nbsp;</td>";
//****************************  
  echo "</tr>";
  echo "<tr>";
  
  echo "<td><b>Race:</b>$nbsp&nbsp $crow[Race]</td>";

  echo "<td>&nbsp;</td>";
  
  echo "<td><b>Ethnicity:</b>&nbsp;  $crow[ClientEthnicity] </td>";
  echo "<td>&nbsp;</td>";
  
    echo "<td>&nbsp;</td>";
  echo "<td>&nbsp;</td>";
  echo "<td><b>Year of Birth:</b>&nbsp;&nbsp";
  
if ($crow[PDOB] == "0000-00-00"){
   echo "&nbsp";
}else{
  $bYear=substr($crow[PDOB], 0, 4);
  echo $bYear;
}
echo "</td>";

//****************************  
  echo "</tr>";
  echo "<tr>";
  
  echo "<td><b>Banking Status:</b>$nbsp&nbsp $crow[Banked]</td>";
  
  echo "<td colspan=5><b>Barrier(s):</b>&nbsp;  $crow[Barrier1] </td>";
  echo "<td>&nbsp;</td>";
 
//****************************  
  echo "</tr>";
  echo "<tr>";
  
  echo "<td colspan=2><b>Other Financial Services Recieved:</b>$nbsp&nbsp $crow[Banked]</td>";
  echo "<td>&nbsp;</td>";
  
  echo "<td colspan=3><b>Time Recieving Services (Months):</b>&nbsp;  $crow[MonthsRecievedServices] </td>";
    echo "<td>&nbsp;</td>";
 
//****************************  
echo "</tr>";
echo "</table>";

echo "<br>";
echo "<table width=\"95%\" border=\"3\">";
echo "<tr align=center bgcolor=lightgrey><b>";
echo "<td><b>Questions</b></td><td><b>Intake Data</b></td><td><b>Annual Data</b></td><td><b>Annual Data</b></td><td><b>Progam Completion Date</b></td>";

echo "</tr><tr>";

//**********************
echo "<td>Data Collection Date:</td>";
echo "<td>";
if ($crow[DataCollectionDate] == "0000-00-00"){
   echo "";
}else{
  echo substr(date_format(date_create($crow[DataCollectionDate]),"m/d/Y H:i:s"), 0, 10);
}
echo "</td>";

echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>Rent:</td>";
echo "<td>$$crow[InitialRent]</td>";

echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>Savings:</td>";
echo "<td>$$crow[InitialSavings]</td>";

echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>Monthly Household Income:</td>";
echo "<td>$$crow[HouseholdIncome]</td>";

echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>AMI:</td>";
echo "<td>$crow[AMI]</td>";

echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>Credit Score:</td>";
echo "<td>$crow[InitialCreditScore]</td>";

echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>Collections/Judgements:</td>";
echo "<td>$$crow[CollectionDebt]</td>";

echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>Credit Card/Unsecured Balance:</td>";
echo "<td>$$crow[UnsecuredDebt]</td>";

echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>Student Loan Balance:</td>";
echo "<td>$$crow[StudentLoan2]</td>";

echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>Secured/Auto/etc:</td>";
echo "<td>$$crow[InitialSecuredDebt]</td>";

echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>Notes:</td>";
echo "<td></td>";

echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>Time Coaching Client (Hours):</td>";
echo "<td></td>";

echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";


/*****************************************home ownership******************************************/
echo "<table><tr height=20><td></td></tr></table>";
echo "<table width=\"95%\" border=\"3\">";
echo "<tr align=center bgcolor=lightgrey>";
echo "<td colspan=4><b>Pursuing Homeownership?</td>";

echo "</tr><tr>";

//**********************

echo "<td width=\"15%\"><b><u>Client Pursuing Homwownership?</td>";
echo "<td width=\"10%\">&nbsp;</td>";
echo "<td width=\"10%\"><b>If not, why?</b></td>";
echo "<td width=\"20%\">&nbsp;</td>";
echo "</tr>";
echo "</table>";

/*****************************************Client Survey******************************************/
echo "<table><tr height=20><td></td></tr></table>";
echo "<table width=\"95%\" border=\"3\">";
echo "<tr align=center bgcolor=lightgrey>";
echo "<td colspan=4><b>Client Survey</td>";

echo "</tr><tr>";

//**********************
echo "<td width=\"70%\">Data Collection Date:</td>";
echo "<td>";
if ($crow[DataCollectionDate] == "0000-00-00"){
   echo "";
}else{
  echo substr(date_format(date_create($crow[DataCollectionDate]),"m/d/Y H:i:s"), 0, 10);
}
echo "</td>";

echo "</tr><tr>";

//**********************
echo "<td>My understanding of the banking system</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>The frequency that I track my spending</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>My understanding of the importance of a spending plan</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>The frequency that the goal of improving my credit plays a role in my financial decisions</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>My understanding of how my credit affects my ability to get a loan</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>The frequency that the goal of saving money plays a role in my purchase decisions</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>My understanding of the importance that saving money plays in my ability to purchase a home</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>My ability to handle financial obstacles</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>The fequency that I make good decisions</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td><u>Notes:</u></td>";
echo "<td>&nbsp;</td>";
echo "</tr></table>";
//**********************

/*****************************************Outcome Data******************************************/
echo "<table><tr height=20><td></td></tr></table>";
echo "<table width=\"95%\" border=\"3\">";
echo "<tr align=center bgcolor=lightgrey>";
echo "<td colspan=4><b>Outcome Data - Client Purchased a Home</b></td>";

echo "</tr><tr>";

//**********************
echo "<td width=\"70%\">Data Collection Date:</td>";
echo "<td>";
if ($crow[DataCollectionDate] == "0000-00-00"){
   echo "";
}else{
  echo substr(date_format(date_create($crow[DataCollectionDate]),"m/d/Y H:i:s"), 0, 10);
}
echo "</td>";

echo "</tr><tr>";

//**********************
echo "<td>New Address (Street, City Zip Couny)</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>Programs Utilized</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>PITIA</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>Purchase Price</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>Loan Amount</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>Interest Rate</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>Lender</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>Downpayment Assistance Program(s)</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>Downpayment Assistance Amount</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>Which Homebuyer Education course did the client complete?</td>";
echo "<td>&nbsp;</td>";

echo "</tr><tr>";

//**********************
echo "<td>Time spent coaching client (hours)</td>";
echo "<td>&nbsp;</td>";

//**********************


echo "</tr>";
echo "</table>";


echo "</center>";


}
?>

</body>
</html>

