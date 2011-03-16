<?php
session_start();
if(!isset($_SESSION['username'])) header("Location: ../");
?>
<html>
	<head>
		<title>CFNR Student Performance Evaluator</title>
		<link rel="stylesheet" type="text/css" href="../styles/graphs.css" />
		<script type='text/javascript' src='../jquery-1.4.1.min.js'></script>
		<script type='text/javascript'>
		$(document).ready(function(){
			$("#line").show();
			$("#scatter").hide();
			$("#bar").hide();
			
			$('#scatterPlot').click(function(){
				$("#scatter").show();
				$("#bar").hide();
				$("#line").hide();
			});
			$('#barGraph').click(function(){
				$("#scatter").hide();
				$("#bar").show();
				$("#line").hide();
			});
			$('#lineGraph').click(function(){
				$("#scatter").hide();
				$("#bar").hide();
				$("#line").show();
			});
		});
		</script>
	</head>

<body id='graphs'>
<div id='logo'><img src='../images/logo.png'/></div>
	
<div id='options'>
<a href="../AddStudent/"><img src='../images/addstudent.jpg'/></a>
<a href="../SearchStudent/"><img src='../images/searchstudent2.jpg'/></a>
<a href="../CountStudent/"><img src='../images/countstudent2.jpg'></a>
<a href="../Graphs/"><img src='../images/viewstat2.jpg'></a>
</div>
	
<div id='content'>
	Select Graph:
	<table style="left:auto">
		<tr>
			<td><input type='radio' name='graphType' value='lineGraph' checked='true' id='lineGraph'><label for="lineGraph">Line Graph</label></td>
			<td><input type='radio' name='graphType' value='scatterPlot' id='scatterPlot'><label for="scatterPlot">Scatter Plot</label></td>
			<td><input type='radio' name='graphType' value='barGraph' id='barGraph'><label for="barGraph">Bar Graph</label></td>
		</tr>
	</table>
	
	<div id="line">
		<h3>Line Graph</h3>
		<form method='post' action='LineGraphView.php'>
		<p>See One-on-One Comparison of GWA between 2 Students (per semester)</p>
		Enter Student Number<br/>
		Student 1: <input type='text' name='student1' 
		           <?php if(isset($_SESSION['stdno1']))
				   echo "value='".$_SESSION['stdno1']."'"?>/>
		Student 2: <input type='text' name='student2'
		           <?php if(isset($_SESSION['stdno2']))
				   echo "value='".$_SESSION['stdno2']."'"?>/><br/>
		<input type='submit' name='submit' value='See Line Graph'/>
		</form>
	</div>
	
	<div id="scatter" >
		<h3>Scatter Plot</h3>
		<p>See correlation of GWA & UPG for waitlist students.</p>
		<form method='post' action='ScatterPlotView.php'>
		<input type='submit' name='submit' value='See Scatter Plot'/>
		</form>
	</div>
	
	<div id="bar">
		<h3>Bar Graph</h3>
		<p>See Average GWA per Batch.</p>
		<form method='post' action='BarGraphView.php'>
		<input type='submit' name='submit' value='See Bar Graph'/>
		</form>
	</div>
	
	<ul>
		<?php
			if(isset($_GET['scatternotsuccess']))
				echo "<li>Scatter Plot can't be produced. (Insufficient information about GWA)
				     <br/>One or more students has no GWA available.</li>";
			if(isset($_GET['barnotsuccess']))
				echo "<li>Bar Graph can't be produced. (Insufficient information about GWA)
				     <br/>One or more students has no GWA available.</li>";
			if(isset($_GET['stdno1']))
				echo "<li>No grades available for Student 1.</li>";
			if(isset($_GET['stdno2']))
				echo "<li>No grades available for Student 2.</li>";
			if(isset($_SESSION['isnull']))
				echo "<li>No field should be null.</li>";
			if(isset($_SESSION['wrongstdno1']))
				echo "<li>Wrong student number format for Student 1.</li>";
			if(isset($_SESSION['wrongstdno2']))
				echo "<li>Wrong student number format for Student 2.</li>";
			if(isset($_SESSION['wronglength']))
				echo "<li>Wrong student number length.</li>";
		?>
	</ul>
	
</div>
</body>
</html>

<?php
if(isset($_SESSION['isnull'])) unset($_SESSION['isnull']);
if(isset($_SESSION['wrongstdno1'])) unset($_SESSION['wrongstdno1']);
if(isset($_SESSION['wrongstdno2'])) unset($_SESSION['wrongstdno2']);
if(isset($_SESSION['wronglength'])) unset($_SESSION['wronglength']);
?>