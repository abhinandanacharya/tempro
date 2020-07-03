<?php

include '../cdn.php';
include 'admin-nav.php';
include '../connection.php';
error_reporting(0);
$odata=mysqli_fetch_all(mysqli_query($conn,"select * from recipeprocess where recipe_id=$_GET[lid]"),MYSQLI_ASSOC);
$idata=mysqli_fetch_all(mysqli_query($conn,"select * from recipeprocess where recipe_id=$_GET[lid] and type='ing'"),MYSQLI_ASSOC);
// print_r($idata);
$vdata=mysqli_fetch_all(mysqli_query($conn,"select * from recipeprocess where recipe_id=$_GET[lid] and type='veg' "),MYSQLI_ASSOC);
print_r($vdata);
$allarr=[];
foreach ($odata as  $ovalue) {
	$allarr[]=$ovalue['id'];
}
$vegetable = mysqli_fetch_all(mysqli_query($conn,"SELECT * FROM vegetable"),MYSQLI_ASSOC);
$ingredient = mysqli_fetch_all(mysqli_query($conn,"SELECT * FROM ingredient"),MYSQLI_ASSOC);
// print_r($ingredient);
$measure = mysqli_fetch_all(mysqli_query($conn,"SELECT * FROM measure"),MYSQLI_ASSOC);
if(isset($_POST['submit'])){
	// print_r($_POST);
	$count=count($_POST['ingredient_id']);
	for ($i=0; $i <$count ; $i++) { 
		if($_POST['amount'][$i]==''){
			continue;
		}
		$data=[];

		$ingredient_id=$_POST['ingredient_id'][$i];
		$measure_id=$_POST['measure_id'][$i];
		$amount=$_POST['amount'][$i];
		mysqli_query($conn,"insert into recipeprocess set ingredient_id='$ingredient_id',measure_id='$measure_id',amount='$amount',recipe_id='$_GET[lid]',type='ing'");
		// echo "insert into recipeprocess set ingredient_id='$ingredient_id',measure_id='$measure_id',amount='$amount',recipe_id='$_GET[lid]'";exit;
	}
	$count=count($_POST['veg_id']);
	for ($i=0; $i <$count ; $i++) { 
		if($_POST['veg_amount'][$i]==''){
			continue;
		}
		$data=[];
		$ingredient_id=$_POST['veg_id'][$i];
		$measure_id=$_POST['vmeasure_id'][$i];
		$amount=$_POST['veg_amount'][$i];
		mysqli_query($conn,"insert into recipeprocess set ingredient_id='$ingredient_id',measure_id='$measure_id',amount='$amount',recipe_id='$_GET[lid]',type='veg'");
	}
	?>
	<script type="text/javascript">
		alert(' One Recipe Inserted Successfully...')
	</script>
	<?php
}
?>
<div class="form-final" style="width: 100%; padding: 2%;">
	<form action="finalprocess.php?lid=<?php echo $_GET['lid'];?>" method="post"> 
			<?php 
	 		if($idata){
	 			foreach ($idata as $ivalue) {
	 			?>
				<div class="row" >
					<div class="form-group cls-inner col-md-4">
						<label for="exampleFormControlSelect1">Select Ingrident</label>
						<select class="form-control" name="ingredient_id[]" id="exampleFormControlSelect1">
						<?php
						// print_r($ingredient);
				        foreach ($ingredient as $row)
				        {

						?>
						<option value=""><?php echo $ivalue['ingredient_id']; ?></option>
							<?php $name = $row['name']; ?>
							<?php $id = $row['id']; ?>
							<?php 
							if($ivalue['ingredient_id']==$row['id']){
							?>
						    <?php echo "<option selected value='$id'> $name</option>"; ?>
							<?php
							}else{
								echo "<option  value='$id'> $name</option>";
							}
		        		}
						?>
						</select>
			 		</div>

				 	<div class="form-group css-cls col-md-4">
					    <label for="exampleFormControlSelect1">Select Measurement</label>
					    <select class="form-control" name="measure_id[]" id="exampleFormControlSelect1">
						<?php
				        foreach ($measure as $row_measure)
				        {
						?>

							<?php $name = $row_measure['name']; ?>
							<?php $id = $row_measure['id']; ?>
							<?php 
							if($ivalue['measure_id']==$row_measure['id']){
							?>
						    <?php echo "<option selected value='$id'> $name</option>"; ?>
						    <?php 
							}else{
								 echo "<option value='$id'> $name</option>";
							}	
						    ?>
						<?php
			        	}
						?>
						</select>
			 		</div>  
			 		<div class="form-group css-cls col-md-4">
					    <label for="exampleFormControlSelect1">Enter Amount</label>
					    <input type="text" name="amount[]" value="<?php if($ivalue['amount']){echo $ivalue['amount'];} ?>" class="form-control" id="exampleFormControlSelect1">
				 	</div>
			 	</div>

	 			<?php
	 			}
	 		}
	 		?>
		<div class="row" id="fdiv">
			<div class="form-group cls-inner col-md-4">
				<label for="exampleFormControlSelect1">Select Ingrident</label>
				<select class="form-control" name="ingredient_id[]" id="exampleFormControlSelect1">
				<?php
		        foreach ($ingredient as $row)
		        {

				?>
					<?php $name = $row['name']; ?>
					<?php $id = $row['id']; ?>
				    <?php echo "<option value='$id'> $name</option>"; ?>
					<?php
        		}
				?>
				</select>
	 		</div>

		 	<div class="form-group css-cls col-md-4">
			    <label for="exampleFormControlSelect1">Select Measurement</label>
			    <select class="form-control" name="measure_id[]" id="exampleFormControlSelect1">
				<?php
		        foreach ($measure as $row_measure)
		        {
				?>
					<?php $name = $row_measure['name']; ?>
					<?php $id = $row_measure['id']; ?>
				    <?php echo "<option value='$id'> $name</option>"; ?>
				<?php
	        	}
				?>
				</select>
	 		</div>  
	 		<div class="form-group css-cls col-md-4">
			    <label for="exampleFormControlSelect1">Enter Amount</label>
			    <input type="text" name="amount[]" class="form-control" id="exampleFormControlSelect1">
		 	</div>
	 	</div>
	 	<div id="eing" class="row">
	 		
	 	</div> 
	 	<input type="button" class="btn btn-primary" value="+" onclick="adding()">
		<?php 
 		if($vdata){
 			foreach ($vdata as $vvalue) {
 				// print_r($vvalue);
 		?>
			<div class="row" id="sdiv">
				<div class="form-group cls-inner col-md-4">
					<label for="exampleFormControlSelect1">Select Vegetable</label>
					<select class="form-control" name="veg_id[]" id="exampleFormControlSelect1">
					<?php
			        foreach ($vegetable as $row)
			        {
					?>
						<?php $name = $row['name']; ?>
						<?php $id = $row['id']; ?>
						<?php 
						if($vvalue['ingredient_id']==$row['id']){
						?>
					    <?php echo "<option selected value='$id'> $name</option>"; ?>
					    <?php 
						}else{
							echo "<option  value='$id'> $name</option>";
						}
					    ?>
						<?php
	        		}
					?>
					</select>
		 		</div>

			 	<div class="form-group css-cls col-md-4">
				    <label for="exampleFormControlSelect1">Select Measurement</label>
				    <select class="form-control" name="vmeasure_id[]" id="exampleFormControlSelect1">
					<?php
			        foreach ($measure as $row_measure)
			        {
					?>
						<?php $name = $row_measure['name']; ?>
						<?php $id = $row_measure['id']; ?>
						<?php 
						if($vvalue['measure_id']==$row_measure['id']){
						?>
					    <?php echo "<option selected value='$id'> $name</option>"; ?>
					    <?php 
						}else{
							echo "<option  value='$id'> $name</option>";
						}
					    ?>
					<?php
		        	}
					?>
					</select>
		 		</div>  
		 		<div class="form-group css-cls col-md-4">
				    <label for="exampleFormControlSelect1">Enter Amount</label>
				    <input type="text" name="veg_amount[]" value="<?php if($vvalue['amount']) echo $vvalue['amount']; ?>" class="form-control" id="exampleFormControlSelect1">
			 	</div>
		 	</div> 
 		<?php 
 			}
 		}
 		?>
	 	<div class="row" id="sdiv">
			<div class="form-group cls-inner col-md-4">
				<label for="exampleFormControlSelect1">Select Vegetable</label>
				<select class="form-control" name="veg_id[]" id="exampleFormControlSelect1">
				<?php
		        foreach ($vegetable as $row)
		        {
				?>
					<?php $name = $row['name']; ?>
					<?php $id = $row['id']; ?>
				    <?php echo "<option value='$id'> $name</option>"; ?>
					<?php
        		}
				?>
				</select>
	 		</div>

		 	<div class="form-group css-cls col-md-4">
			    <label for="exampleFormControlSelect1">Select Measurement</label>
			    <select class="form-control" name="vmeasure_id[]" id="exampleFormControlSelect1">
				<?php
		        foreach ($measure as $row_measure)
		        {
				?>
					<?php $name = $row_measure['name']; ?>
					<?php $id = $row_measure['id']; ?>
				    <?php echo "<option value='$id'> $name</option>"; ?>
				<?php
	        	}
				?>
				</select>
	 		</div>  
	 		<div class="form-group css-cls col-md-4">
			    <label for="exampleFormControlSelect1">Enter Amount</label>
			    <input type="text" name="veg_amount[]" class="form-control" id="exampleFormControlSelect1">
		 	</div>
	 	</div> 
	 	<div id="eveg" class="row"></div>
	 	<input type="button" class="btn btn-primary" onclick="addveg()" value="+" >
		<input type="submit" class="btn btn-primary" value="Submit" name="submit">
	</form>
</div>
<script>
	function adding(){
		var divval=$('#fdiv').html();
		$('#eing').append(divval);
	}
	function addveg(){
		var divval=$('#sdiv').html();
		$('#eveg').append(divval);
	}
</script>