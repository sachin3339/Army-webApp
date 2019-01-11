<?php

$conn=mysqli_connect("localhost","root","","armydb");
function show()
{
	
$sid=$_POST['sid'];
	
	global $conn;
	$query="SELECT count(s.name_) as c,s.squadno
FROM soldier
  as s
  JOIN soldierstatus
    as ss
    ON (s.id = ss.id)
WHERE s.squadno='$sid'and(ss.alive = 0)
GROUP BY s.squadno;";
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
        <td><?php echo $data['c']?></td>
          <td><?php echo $data['squadno']?></td>
          
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