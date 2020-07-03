<?php
include '../cdn.php';
include 'admin-nav.php';
include '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Area -- Recipe</title>
</head>
<body>
	<div class="container" style="margin-top: 20px; width: 300px;">
		<form method="post" action="recipe.php">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Recipe Name</label> 
		    <input type="text" class="form-control" name="rec_name"  placeholder="Enter Recipe Name">
		  </div>
		   <div class="form-group">
		    <label for="exampleInputEmail1">Recipe Description</label>
		    <textarea class="form-control" name="rec_desc"  placeholder="Enter Recipe Description"></textarea> 
		  </div>
		   <div class="form-group">
		    <label for="exampleInputEmail1">Recipe Instruction</label>
		    <textarea class="form-control" name="rec_inst"  placeholder="Enter Recipe Instruction"></textarea> 
		  </div>
		  <button type="submit" name="sub"class="btn btn-primary">Submit</button>
		</form>
	</div>

</body>
</html>

<?php

if(isset($_POST['sub']))
{
	if(empty($_POST['rec_name'] && $_POST['rec_inst']))
	{
		?>
		<script type="text/javascript">
			alert("Field Is Mendetory...")
		</script>
		<?php
	}
	else
	{
			extract($_POST);
			print_r($_POST);
			$insert = "INSERT INTO `recipe`(`rec_name`,`rec_desc`,`rec_inst`) VALUES ('$rec_name','$rec_desc','$rec_inst')";
			$res = mysqli_query($conn,$insert);
			if($res!=0)
			{
				?>
				<script type="text/javascript">
					alert(' One Recipe Inserted Successfully...')
					// window.location.href = "finalprocess.php";
				</script>
				<?php
			}
			else
			{
				?>
				<script type="text/javascript">
					alert("Opps...!! Somthing Went Wrong....")
				</script>
				<?php
			}


	}
	
}


?>