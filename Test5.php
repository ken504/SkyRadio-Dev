<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>BW-Search Records</title>
	<!-- Bootstrap CDNs -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">	
<link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" type="text/javascript"></script>
</head>
	<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="#"><span style="color: red">B</span><span style="color: blue">W</span>Management System</a></div>
	  
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1">
      <ul class="nav navbar-nav">
        <li><a href="FSP.html">FSP</a></li>
        <li><a href="FSP-Attendance.html">FSP-Attendance</a></li>
		<li><a href="FSP-Payment.html">FSP-Payment</a></li>
		<li><a href="#">Lender Fields</a></li>
		<li><a href="#">PEEP Fields</a></li> 
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">System Pages<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="FSP.html">Family Stabilization Plan-FSP</a></li>
            <li><a href="FSP-Payment.html">FSP Payment</a></li>
            <li><a href="FSP-Attendance.html">FSP-Attendance</a></li>
            <li class="divider"></li>
            <li><a href="#">PEEP Fields</a></li>
            <li class="divider"></li>
            <li><a href="#">Business Development</a></li>
          </ul>
        </li>
		  
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<body>	
	
<script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable( {
				"scrollY": 300,
				"scrollX": true
			} );
		} );
</script>

<script type="text/javascript">
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
	
	<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
</script>

<!--Table Container START	-->
<center>
<a href="#" title="Header2" data-toggle="popover" data-content="Some content">Click Me</a><br>
<a href="#" title="Header" data-toggle="popover" data-trigger="hover" data-content="Some content">Hover over me</a>	
	<button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>
	
	
<a href="#" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">Toggle popover</a>

</center>
	
	
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>Client ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Occupation</th>
							<th>2nd First Name</th>
							<th>2nd Last Name</th>
							<th>2nd Occupation</th>
							<th>Program Year</th>
							<th>Collection Date</th>
						</tr>
					</thead>
					<?php
					$db_host = 'localhost';
					$db_user = 'Main';
					$db_pwd = '!BWMainPass!';
					$database = 'BWProd01';
					$table = 'tbl_Client';
					$dbport='3306';

					// Create connection
					$con = @mysqli_connect($db_host,$db_user,$db_pwd,$database,$dbport);
					// Check connection
					if (mysqli_connect_errno()) {
						die ("Failed to connect to MySQL using the PHP mysqli extension: " . mysqli_connect_error());
					}else{ 
					 // echo "<br>The connection to \"$database\" was successful!";
					}
					// Query the database
					$result = mysqli_query($con,"SELECT * FROM {$table} WHERE DELETED=0");

					while($row = mysqli_fetch_array($result)) {

echo "<tr>";
echo "<td align=left><a href=\"http://www.buildwealthmgmtsystem.com/FSPTest0.php?SRC=F&ID=$row[BWClientID]\"> $row[BWClientID] </a></td>";
						echo "<td align=left> $row[PClientFirstName] </td>";
						echo "<td align=left> $row[PClientLastName] </td>";
						echo "<td align=left> $row[POccupation] </td>";
						echo "<td align=left> $row[SClientFirstName] </td>";
						echo "<td align=left> $row[SClientLastName] </td>";
						echo "<td align=left> $row[SOccupation] </td>";
						echo "<td align=left> $row[ProgramYear] </td>";
						echo "<td align=left> $row[DataCollectionDate] </td>";
					  	echo "</tr>";  
						}
						mysqli_close($con)
						?>
			</table>
		<canvas id="myChart" style="max-width: 500px;"></canvas>	
<script type="text/javascript">
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
			
			<div class="col-md-5">
    <canvas id="myChart" ></canvas>
</div>
			
		</div>
	</div>
</div>
 <!--Table Container END-->	
  <div class="row">
    <div class="text-center col-md-6 col-md-offset-3">
      <h4>Build Wealth </h4>
      <p>Copyright &copy; 2018 &middot; All Rights Reserved &middot; <a href="http://yourwebsite.com/" >Build Wealth Management System</a></p>
    </div>
  </div>
</body>
</html>
