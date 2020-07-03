<?php
include '../cdn.php';
include '../navbar.php';
include '../connection.php';
?>
<?php
function recipePotato()
{
	$vegarray = array();
	if(isset($_POST['submit']))
	{
					//	print_r($_POST);
		if(isset($_POST['vegitable']))
		{ 
			$vegarray = $_POST['vegitable'];
		}
		//print_r($vegarray);

					if(empty($vegarray)) // 

					{ 
						//echo "11";
						//include 'newheader.php';
						?>


						<div style="margin-left: 308px; margin-top: 60px; width: 700px;">
							<table class="table  table-primary">
								<thead>
									<tr>
										<th>Ingredients</th>
										<th>Amount</th>
										<th>Unit of measure</th>

									</tr>
								</thead>
								<tbody>

									<?php
									include '../connection.php';
											//  if(isset($_POST['vegitable'][0]) && isset( $_POST['vegitable'][1]))
											// {
											// 		$pea = $_POST['vegitable'][0]; //YE $_POST GLOBAL ARRAY HOTA HAI
											// 		$tomato =  $_POST['vegitable'][1];


											// }
											//  extract($_POST);

									$qry = "SELECT recipe.rec_id,ingredient.name as ing,measure.name,amount,recipe.rec_name,recipe.rec_desc,recipe.rec_inst FROM recipeprocess JOIN ingredient ON ingredient_id = ingredient.id JOIN measure ON measure_id = measure_id JOIN recipe ON recipe_id = recipe.rec_id WHERE recipe_id = 7 AND type='ing' GROUP BY recipeprocess.id";
											// echo $qry;exit;

											//$qry =  "SELECT in gredient  FROM ingredient WHERE ingredient = $pea || $tomato";
									$result = mysqli_query($conn,$qry);

								//	print_r($dt);


									while($dt= mysqli_fetch_assoc($result))
									{
										?>
										<tr>
											<td><?php echo $dt['ing'];?></td>
											<td><?php echo $dt['amount']; ?></td>
											<td><?php echo $dt['name']; ?></td>
										</tr>
										<?php
									}
									?>



									<?php ?>


								</tbody>
							</table>

							<table class="table bg-primary">
								<thead>
									<tr>
										<th>Vegetables</th>
										<th>Amount</th>
										<th>Unit of measure</th>


									</tr>
								</thead>
								<tbody>
									<?php

									$qry = "SELECT recipe.rec_id,ingredient.name as ing,measure.name,amount,recipe.rec_name,recipe.rec_desc,recipe.rec_inst FROM recipeprocess JOIN ingredient ON ingredient_id = ingredient.id JOIN measure ON measure_id = measure_id JOIN recipe ON recipe_id = recipe.rec_id WHERE recipe_id = 7 AND type='veg'  GROUP BY recipeprocess.id";
									//echo $qry;exit;
											 //YE TO SMJ AA JAEGI NA...??
											//$qry =  "SELECT in gredient  FROM ingredient WHERE ingredient = $pea || $tomato";
									//$qry = "SELECT * FROM recipeprocess";

									$result = mysqli_query($conn,$qry);


									// foreach($result as $key => $value){
									// 	//print_r($value['recipe_id']);exit();
									// 	$receipe_id = intval($value['recipe_id']);
									// 	$rececpe = "SELECT * recipe from  WHERE rec_id = $receipe_id";
									// 	$result = mysqli_query($conn,$qry);
									// 	print_r($rececpe); exit();

									// }

									$dtt= mysqli_fetch_all($result,MYSQLI_ASSOC);

									foreach($dtt as $dt)
									{
										?>
										<tr>
											<td><?php echo $dt['ing'];?></td>
											<td><?php echo $dt['amount']; ?></td>
											<td><?php echo $dt['name']; ?></td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>


							<table class="table bg-primary"> 
								<thead>
									<tr>
										<th>Recipe</th>
										<th>Description</th>
										<th>Instructions</th>


									</tr>
								</thead>
								<tbody>
									<?php

									$qry = "SELECT recipe.rec_id,ingredient.name as ing,measure.name,amount,recipe.rec_name,recipe.rec_desc,recipe.rec_inst FROM recipeprocess JOIN ingredient ON ingredient_id = ingredient.id JOIN measure ON measure_id = measure_id JOIN recipe ON recipe_id = recipe.rec_id WHERE recipe_id = 7
									GROUP BY recipeprocess.id";

									$result = mysqli_query($conn,$qry);
									$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
									foreach($data as $dt)
									{

										?>

										<tr>
											<td><?php echo $dt['rec_name']; ?></td>
											<td><?php echo $dt['rec_desc']; ?></td>
											<td><?php echo $dt['rec_inst']; ?></td>
										</tr>
										<?php  
										//unset($vegarray['potato']);
									}?>
								</tbody>
							</table>
						</div>


						<?php
						//unset($vegarray['potato']);

					}
					else{
						echo "string";
					}

					//unset($vegarray['potato']);
					if(in_array('pea', $vegarray))
					{
						?>
						<div style="margin-left: 308px; margin-top: 60px; width: 700px;">
							<table class="table table-primary">
								<thead>
									<tr>
										<th>vegitables</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>cabbage</td>
									</tr>
								</tbody>
							</table>
						</div>
						<?php
					}
				}



			}

			recipePotato();

			?>