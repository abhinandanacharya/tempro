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
		$conn=mysqli_query($conn,"delete from recipe where id=$_GET[id]");
		header("location:recipe_list.php");
	}
	?>
	<table id="example" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<td colspan="6"><a href="recipe.php">Add new data</a></td>
			</tr>
			<tr>
				<th>No</th>
				<th>Recipe Name</th>
				<th>Recipe Description</th>
				<th>Recipe Instruction</th>
				<th>Recipe Photo</th>
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

		@$qry= "SELECT * FROM recipe";

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
							<td><?php  echo $data['rec_name'];  ?></td>
							<td><?php  echo $data['rec_desc'];  ?></td>
							<td><?php  echo $data['rec_inst'];  ?></td>
							<td>
								<img src="upload/<?php echo $data['rec_photo'];?>" height="100" width="100">
							</td>
							<td>
								<a href="recipe.php?id=<?php  echo $data['rec_id'];  ?>">Edit</a>
								<a href="recipe_list.php?id=<?php  echo $data['rec_id'];  ?>">Delete</a>
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