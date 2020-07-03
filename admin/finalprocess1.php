<?php
include '../cdn.php';
include 'admin-nav.php';

?>

<div class="form-final">
<form action="finalprocess.php" method="post"> 
<?php

// $ingredient  = "SELECT * FROM ingredient";
// $measure = "SELECT * FROM measure";
$vegetable = "SELECT * FROM vegetable";
$recpie = "SELECT * FROM recpie";



function add_ingredient_data()
{
	include '../connection.php';
	$ingredient  = "SELECT * FROM ingredient";
$measure = "SELECT * FROM measure";
	$result = mysqli_query($conn,$ingredient);
if($result)
{
	//print_r($result);
	?>
	<div class="row">
	<div class="form-group cls-inner">
				    <label for="exampleFormControlSelect1">Example select</label>
				    <select class="form-control" id="exampleFormControlSelect1">
<?php
	foreach($result as $row)
	{
		?>

				

						<?php $name = $row['name'];?>
				      <?php echo "<option value=''> $name</option>";?>
				    
				    

		<?php
	}
	?>
	</select>
 	</div>
 	    <?php

}


$result_measure = mysqli_query($conn,$measure);

if($result_measure)
{
	//print_r($result);
	?>
	<div class="form-group css-cls">
				    <label for="exampleFormControlSelect1">Example select</label>
				    <select class="form-control" id="exampleFormControlSelect1">
<?php
	foreach($result_measure as $row_measure)
	{
		?>

				

						<?php $name = $row_measure['name'];?>
				      <?php echo "<option value=''> $name</option>";?>
				    
				    

		<?php
	}
	?>
	</select>
 	</div>
 
 	    <?php

}
	//print_r($result);
	?>
	<div class="form-group css-cls">
				    <label for="exampleFormControlSelect1">Example select</label>
				    <input type="text" name="amount" class="form-control" id="exampleFormControlSelect1">
 	</div>
 </div>
 
<?php

}




function add_vegetable_data()
{
	include '../connection.php';
	$vegetable  = "SELECT * FROM vegetable";
$measure = "SELECT * FROM measure";
	$result = mysqli_query($conn,$vegetable);
if($result)
{
	//print_r($result);
	?>
	<div class="row">
	<div class="form-group cls-inner">
				    <label for="exampleFormControlSelect1">Example select</label>
				    <select class="form-control" id="exampleFormControlSelect1">
<?php
	foreach($result as $row)
	{
		?>

				

						<?php $name = $row['name'];?>
				      <?php echo "<option value=''> $name</option>";?>
				    
				    

		<?php
	}
	?>
	</select>
 	</div>
 	    <?php

}


$result_measure = mysqli_query($conn,$measure);

if($result_measure)
{
	//print_r($result);
	?>
	<div class="form-group css-cls">
				    <label for="exampleFormControlSelect1">Example select</label>
				    <select class="form-control" id="exampleFormControlSelect1">
<?php
	foreach($result_measure as $row_measure)
	{
		?>

				

						<?php $name = $row_measure['name'];?>
				      <?php echo "<option value=''> $name</option>";?>
				    
				    

		<?php
	}
	?>
	</select>
 	</div>
 
 	    <?php

}
	//print_r($result);
	?>
	<div class="form-group css-cls">
				    <label for="exampleFormControlSelect1">Example select</label>
				    <input type="text" name="amount" class="form-control" id="exampleFormControlSelect1">
 	</div>
 </div>
 
<?php

}
?>





</form>
</div>
<?php
add_ingredient_data();

$add= 0; 
$click = isset($_POST['click'] )? $_POST['click'] : -1;
if(isset($_POST['btn-add']))
{
	$click++;
 			if(array_key_exists('btn-add',$_POST))
 			{
				print_r($_POST);
	        	for($i=0;$i<=$click;$i++)
	        	{
				 add_ingredient_data();	 
	 
	            }

	//echo "$add";
}


}

?>
<?php include 'buttons/add_ing.php';?>

<?php
add_vegetable_data();

$add= 0; 
$click_veg = isset($_POST['click_veg'] )? $_POST['click_veg'] : -1;
if(isset($_POST['btn_add_veg']))
{
	$click_veg++;
 			if(array_key_exists('btn_add_veg',$_POST))
 			{
				print_r($_POST);
	        	for($i=0;$i<=$click_veg;$i++)
	        	{
				 add_vegetable_data();	 
	 
	            }

	//echo "$add";
}


}

?>
<?php include 'buttons/add_veg.php';





