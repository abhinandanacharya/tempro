<?php
include '../cdn.php';
include 'admin-nav.php';
include '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert and Edit Area -- Recipe</title>
</head>
<body>
	<?php 
	$id="";
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$data=mysqli_fetch_assoc(mysqli_query($conn,"Select * from recipe where rec_id=$_GET[id]"));
	}
	?>
	<div class="container" style="margin-top: 20px; width: 300px;">
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="exampleInputEmail1">Recipe Name</label> 
				<input type="text" class="form-control" value="<?php if($id) echo $data['rec_name']; ?>" name="rec_name"  placeholder="Enter Recipe Name">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Recipe Description</label>
				<textarea class="form-control" name="rec_desc" placeholder="Enter Recipe Description"><?php if($id) echo $data['rec_desc']; ?></textarea> 
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Recipe Instruction</label>
				<textarea class="form-control" name="rec_inst"   placeholder="Enter Recipe Instruction"><?php if($id) echo $data['rec_inst']; ?></textarea> 
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Recipe Photo</label>
				<input type="file" class="form-control" name="rec_photo"> 
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
		//print_r($_FILES);
		if(!$_FILES['rec_photo']['name']){
			$photo=$data['rec_photo'];
		}else{
			$photo=time()."_".$_FILES['rec_photo']['name'];
			move_uploaded_file($_FILES['rec_photo']['tmp_name'],"upload/".$photo);
		}
		if($id==''){
			$insert = "INSERT INTO `recipe`(`rec_name`,`rec_desc`,`rec_inst`,`rec_photo`) VALUES ('$rec_name','$rec_desc','$rec_inst','$photo')";
		}
		else
			$insert = "update `recipe` set rec_name='$rec_name',rec_inst='$rec_inst',rec_desc='$rec_desc',rec_photo='$photo' where rec_id=$id ";
		$res = mysqli_query($conn,$insert);
		$lid=mysqli_insert_id($conn);
		if($res!=0)
		{
			if(!$id){
				?>
				<script type="text/javascript">
					alert(' One Recipe Inserted Successfully...')
					window.location.href = "finalprocess.php?lid=<?php echo $lid;?>";
				</script>
				<?php
			}else{

				?>
				<script type="text/javascript">
					alert(' One Recipe Inserted Successfully...')
					window.location.href = "finalprocess.php?lid=<?php echo $id;?>";
				</script>
				<?php
			}
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