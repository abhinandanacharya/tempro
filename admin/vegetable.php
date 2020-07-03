<?php
include '../cdn.php';
include 'admin-nav.php';
include '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert and Update Area -- Vegetable</title>
</head>
<body>
	<?php 
	$id="";
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$data=mysqli_fetch_assoc(mysqli_query($conn,"Select name from vegetable where id=$_GET[id]"));
	}
	?>
	<div class="container" style="margin-top: 20px; width: 300px;">
		<form method="post" >
		  <div class="form-group">
		    <label for="exampleInputEmail1">Vegetable Name</label>
		    <input type="text" class="form-control" name="name" value="<?php  if($id) echo $data['name']; ?>"  placeholder="Enter Vegetable">
		  </div>
		  <button type="submit" name="sub"class="btn btn-primary">Submit</button>
		</form>
	</div>

</body>
</html>

<?php

if(isset($_POST['sub']))
{
	if(empty($_POST['name']))
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
			if($id==''){
				// echo $id;
				// echo "hello";exit;
				$insert = "INSERT INTO `vegetable`(`name`) VALUES ('$name')";
			}
			else
				$insert = "update `vegetable` set name='$name' where id=$id ";
			$res = mysqli_query($conn,$insert);
			if($res!=0)
			{
				?>
				<script type="text/javascript">
					alert(' One Vegetable Inserted Successfully...')
					window.location.href = "index.php";
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