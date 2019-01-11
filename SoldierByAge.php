<?php

$conn=mysqli_connect("localhost","root","","armydb");
function show()
{
	
$year=$_POST['year'];
	
	global $conn;
	$query="select ID,name_,RANK,DOJ,DOR,SquadNo
           from soldier as sold
           where extract(year from dor)-extract(year from doj) > '$year'";
	$run=mysqli_query($conn,$query);
	if($run==TRUE)
	{
		
		?>
		
<div class="container">
  <h2 style="margin-left:450px;">Details Of soldier</h2><br>
  <hr style="border:5px;">
  <table class="table">
   <thead>
      <tr>
          <th>ID of soldier</th>
		  <th>Name of Soldier</th>
		  <th>Post</th>
		  <th>DOJ</th>
		  <th>DOR</th>
		  <th>SquadNo</th>
           
      </tr>
    </thead>
		<?php
		
		while($data=mysqli_fetch_assoc($run))
		{
			?>
			
			
			
	  <tr class="success">
        <td><?php echo $data['ID']?></td>
		<td><?php echo $data['name_']?></td>
		<td><?php echo $data['RANK']?></td>
		<td><?php echo $data['DOJ']?></td>
		<td><?php echo $data['DOR']?></td>
        <td><?php echo $data['SquadNo']?></td>
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