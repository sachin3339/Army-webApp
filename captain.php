<?php

$conn=mysqli_connect("localhost","root","","armydb");
function show()
{
	


	global $conn;
	$query="select sold.id s1, sold.name_ s2, sqd.squadnumber s3, sqd.captain s4
from soldier as sold
inner join squads as sqd on sqd.squadnumber = sold.squadno
inner join assign as asgn on asgn.id = sold.id
where asgn.type_ = 'Major General'";
	$run=mysqli_query($conn,$query);
	if($run==TRUE)
	{
		?>
		
<div class="container">
  <h2 style="margin-left:450px;">Soldiers Posted</h2><br>
  <hr style="border:5px;">
  <table class="table">
   <thead>
      <tr>
          
          
          <th>ID of soldier</th>
          <th>Name of soldier</th>
          <th>Squad of soldier</th>
          <th>ID of captain</th>
           
           
      </tr>
    </thead>
		<?php
		
		while($data=mysqli_fetch_assoc($run))
		{
			?>
			
			
			
	  <tr class="success">
        <td><?php echo $data['s1']?></td>
          <td><?php echo $data['s2']?></td>
          <td><?php echo $data['s3']?></td>
          <td><?php echo $data['s4']?></td>
          
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