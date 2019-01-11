<?php

$conn=mysqli_connect("localhost","root","","armydb");
function show()
{
	
$y1=$_POST['y1'];
$y2=$_POST['y2'];	
	global $conn;
	$query="SELECT r1.name_ as n1, w.name_ as n2 FROM weapons AS w JOIN (
SELECT name_, i.id,serial_no
FROM soldier
  AS s
  JOIN inventory as i
    ON (s.id = i.id) WHERE year(s.doj) BETWEEN '$y1' AND '$y2') AS r1
    ON (r1.serial_no = w.serialno);";
	$run=mysqli_query($conn,$query);
	if($run==TRUE)
	{
		?>
		
<div class="container">
  <h2 style="margin-left:450px;">Martyr Count</h2><br>
  <hr style="border:5px;">
  <table class="table">
   <thead>
      <tr>
          <th>No. of soldier</th>
           <th>Squad Number</th>
           
      </tr>
    </thead>
		<?php
		
		while($data=mysqli_fetch_assoc($run))
		{
			?>
			
			
			
	  <tr class="success">
        <td><?php echo $data['n1']?></td>
          <td><?php echo $data['n2']?></td>
          
      </tr>
			<?php
		
		}
		
		?></table><?php
		
	}
}
?>

<html >
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
echo show();
?>
</body>
</html>