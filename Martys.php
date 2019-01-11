<?php

$conn=mysqli_connect("localhost","root","","armydb");
function show()
{
	
$year=$_POST['year'];
    $pin=$_POST['pin'];
	
	global $conn;
    
	$query="select name_
from soldier
 join soldierstatus as stat on stat.id = soldier.id
where stat.wardateno = '$year' and stat.pincode = '$pin' and alive = 0";
    
	$run=mysqli_query($conn,$query);
	if($run==TRUE)
	{
		?>
		
<div class="container">
  <h2 style="margin-left:450px;">Martyrs Information</h2><br>
  <hr style="border:5px;">
  <table class="table">
   <thead>
      <tr>
          <th>Name</th>
      </tr>
    </thead>
		<?php
		
		while($data=mysqli_fetch_assoc($run))
		{
            
			?>
			
			
			
	  <tr class="success">
        <td><?php echo $data['name_']?></td>
          
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