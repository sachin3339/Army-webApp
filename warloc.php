<?php

$conn=mysqli_connect("localhost","root","","armydb");
function show()
{
	


	global $conn;
	$query="select id,post.pincode,date_,district,state,country
from posting as post
inner join (
select loc.pincode, loc.district, loc.state, loc.country
from war
inner join location as loc on loc.pincode = war.pincode)
as r on r.pincode = post.pincode";
	$run=mysqli_query($conn,$query);
	if($run==TRUE)
	{
		?>
		
<div class="container">
  <h2 style="margin-left:450px;">Wars</h2><br>
  <hr style="border:5px;">
  <table class="table">
   <thead>
      <tr>
          <th>ID</th>
           <th>Pincode</th>
          <th>Date</th>
          <th>District</th>
          <th>State</th>
          <th>Country</th>
          
          
           
           
      </tr>
    </thead>
		<?php
		
		while($data=mysqli_fetch_assoc($run))
		{
			?>
			
			
			
	  <tr class="success">
        <td><?php echo $data['id']?></td>
          
          <td><?php echo $data['pincode']?></td>
           <td><?php echo $data['date_']?></td>
           <td><?php echo $data['district']?></td>
           <td><?php echo $data['state']?></td>
           <td><?php echo $data['country']?></td>
          
          
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