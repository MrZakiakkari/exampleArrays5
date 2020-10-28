<?php
$months = array();
$month = array("January","February","March","April","May","June","July","August","September");
$totals = array();
$carMax = array("Mazda"=> 0,"Nissan"=>0,"Opel"=>0,"Peugeot"=>0,"Skoda"=>0,"Toyota"=>0,"Volkswagen"=>0,"Volvo"=>0);
$carMaxmonth = array("Mazda"=>"","Nissan"=>"","Opel"=>"","Peugeot"=>"","Skoda"=>"","Toyota"=>"","Volkswagen"=>"","Volvo"=>"");
$cars = array("Mazda","Nissan","Opel","Peugeot","Skoda","Toyota","Volkswagen","Volvo");

fillArray($months,$month);
printArray1($months,$cars);
monthtotals($months,$totals);
printArray2($months,$totals,$cars);
findcarMax($months,$carMax,$carMaxmonth);
printArray3($months,$totals,$carMaxmonth,$cars);
popularity($totals);
percentageincrease($months,$cars);
echo"<head>
<style>
table, th, td {
  border: 1px solid black; 
  border-collapse: collapse;
}
</style>
</head>
<body>"; // for table formatting
        
function fillArray(&$months,$month){
	for($i=0; $i<9;$i++){
		$eachmonth=$month[$i];
		$months[$eachmonth]=array("Mazda"=>rand(5, 100),"Nissan"=>rand(5, 100),"Opel"=>rand(5, 100),"Peugeot"=>rand(5, 100),
								"Skoda"=>rand(5, 100),"Toyota"=>rand(5, 100),"Volkswagen"=>rand(5, 100),"Volvo"=>rand(5, 100));
	}
}
function printArray1($months,$cars)
{	echo "<h3>Array Just After Fill</h3>";
	echo "<table><tr><th></th>";
	foreach($cars as $car){
		echo "<th>".$car."</th>";
	}
	echo "</tr><tr>";
	foreach($months as $month=>$counts)
	{	echo "<td>".$month."</td>";
		foreach($counts as $car=>$value)
		{	echo "<td>".$value."</td>";
		}
		echo "</tr>";
	}
	echo "</table><br/>";
}
function monthtotals($months,&$totals){ 
	$total = 0;
	$totalmonths = 0;
	foreach($months as $month=>$counts){
		foreach($counts as $car=>$value){
			$totalmonths = $totalmonths + $value;
		}
		$total = $totalmonths;
		$totals[$month] = $total;
		$totalmonths = 0;
	}
}
function printArray2($months,$totals,$cars)
{	echo "<h3>Array with totals<h3/>";
	echo "<table><tr><th></th>";
	foreach($cars as $car){
		echo "<th>".$car."</th>";
	}
	echo "<th>total</th></tr><tr>";
	foreach($months as $month=>$counts)
	{	echo "<td>".$month."</td>";
		foreach($counts as $car=>$value)
		{	echo "<td>".$value."</td>"; 
		}
		echo "<td>".round($totals[$month],2)."</td>";
		echo "</tr>";
	}
	echo "</table><br/>";
}
function findcarMax($months,&$carMax,&$carMaxmonth){ // to find a each car maximum value
	foreach($months as $month=>$counts){
		foreach($counts as $car=>$value){
			if ($value > $carMax[$car]){
				$carMax[$car] = $value;
				$carMaxmonth[$car] = $month;
			}
		}
	}
}
function printArray3($months,$totals,$carMaxmonth,$cars)
{	echo "<h3>Array with Maximums</h3>";
	echo "<table><tr><th></th>";
	foreach($cars as $car){
		echo "<th>".$car."</th>";
	}
	echo "<th>total</th></tr><tr>";
	foreach($months as $month=>$counts)
	{	echo "<td><img src=CA1Images/".$month.".png /></td>"; 
		foreach($counts as $car=>$value)
		{	echo "<td>".$value."</td>"; 
		}
		echo "<td>".round($totals[$month],2)."</td>";
		echo "</tr>";
	}
	echo "</table><br/>";
	echo("<br/>Max months: ");
	foreach($carMaxmonth as $car=>$value)
	{	echo $car . " had the most sales in " . $value.".\t";
	}
}
function popularity($totals) 
{	echo "<h3>Ranking months by Popularity</h3>";
	echo "<h4>total array order as is</h4>";
	foreach($totals as $key=>$value)
	{	echo ($key . " = " . round($value,2).". ");
	}
	echo "<h4>total array order sorted</h4>";
	asort($totals);
	foreach($totals as $key=>$value)
	{	echo ($key . " = ". round($value,2).". ");
	}
	echo "<h4>rank order</h4>";
	$rank =1;
	foreach($totals as $key=>	$value)
	{	echo $rank . " = " . $key.". ";
		$rank++;
	}
}
function percentageincrease($months,$cars)
{  $percentage=0;
	$startingpoint = $months[$i];
	foreach($months as $month=>$counts){
		foreach($counts as $car=>$value){
			if ($value > $startingpoint){
				$percentage=$value-$startingpoint/$startingpoint * 100;
			} 
			echo $percentage;
		}
	}
	
}
?>
