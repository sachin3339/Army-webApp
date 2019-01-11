<?php

$conn=mysqli_connect("localhost","root","","armydb");
function show()
{
	
$y1=$_POST['y1'];

	global $conn;
	$query="select distinct wep.name_ , mad.*, comp.countryname
from weapons as wep
inner join manufacturingdetails as mad on mad.serial_no = wep.serialno
inner join company as comp on mad.orgname = comp.orgname
where wep.name_ = '$y1'";
	$run=mysqli_query($conn,$query);
	if($run==TRUE)
	{
		?>
		
<div class="container">
  <h2 style="margin-left:450px;">weapons Details</h2><br>
  <hr style="border:5px;">
  <table class="table">
   <thead>
      <tr>
          <th>No. of soldier</th>
           <th>Squad Number</th>
          <th>No. of soldier</th>
           <th>Squad Number</th>
          <th>No. of soldier</th>
           
           
      </tr>
    </thead>
		<?php
		
		while($data=mysqli_fetch_assoc($run))
		{
			?>
			
			
			
	  <tr class="success">
        <td><?php echo $data['name_']?></td>
          <td><?php echo $data['Serial_no']?></td>
          <td><?php echo $data['ManufaturingDate']?></td>
          <td><?php echo $data['orgName']?></td>
          <td><?php echo $data['countryname']?></td>
          
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