<?php
include '../cdn.php';
include 'admin-nav.php';
include '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert and Edit Area -- Measurement</title>
</head>
<body>
		<?php 
	$id="";
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$data=mysqli_fetch_assoc(mysqli_query($conn,"Select name from measure where id=$_GET[id]"));
	}
	?>
	<div class="container" style="margin-top: 20px; width: 300px;">
		<form method="post" >
		  <div class="form-group">
		    <label for="exampleInputEmail1">Measurement Name</label>
		    <input type="text" class="form-control" name="name" value="<?php  if($id) echo $data['name']; ?>"  placeholder="Enter Measurement">
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
			if($id==''){
				$insert = "INSERT INTO `measure`(`name`) VALUES ('$name')";
			}
			else
				$insert = "update `measure` set name='$name' where id=$id ";
			$res = mysqli_query($conn,$insert);

			if($res!=0)
			{
				?>
				<script type="text/javascript">
					alert(' One Measurement Inserted Successfully...');
					location.href="measure_list.php";
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