<?php

include '../cdn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
</head>
<body>
	<?php 
	include '../connection.php';

	include 'admin-nav.php';
	if(isset($_GET['id'])){
		$conn=mysqli_query($conn,"delete from vegetable where id=$_GET[id]");
		header("location:index.php");
	}
	?>
	<table id="example" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<td colspan="3"><a href="vegetable.php">Add New Data</a></td>
			</tr>
			<tr>
				<th>No</th>
				<th> Vegetable Name</th>
				<th>Action</th>
			</tr>
		</thead>

		<?php
		// echo "hiiii";
// if(isset($_POST['sub']))
// {
// 	echo "string";


	// extract($_POST);
	//$cls = $_POST['class'];
	//$nm = $_POST['name'];

		@$qry= "SELECT * FROM vegetable";

		$result = mysqli_query($conn,$qry);
		$row=mysqli_fetch_all($result,MYSQLI_ASSOC);

		if($row)
		{
			?> 
			<tbody>
				<?php
				$id_count=0;
				foreach($row as $data)
					{ //print_r($data);
						$id_count++;
						?>


						<tr>
							<td><?php echo "$id_count"; ?></td>
							<td><?php  echo $data['name'];  ?></td>
							<td>
								<a href="vegetable.php?id=<?php  echo $data['id'];  ?>">Edit</a>
								<a href="index.php?id=<?php  echo $data['id'];  ?>">Delete</a>
							</td>
						</tr>


						<?php
					}

					?>

				</tbody>
			</table>
			<?php
		}
		else
		{
			echo "not";
		}
		
//}?>

</body>
</html>