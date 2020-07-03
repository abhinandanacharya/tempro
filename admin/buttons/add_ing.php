<?php
//include '../finalprocess.php';
?>
<form method="post" action="finalprocess.php">
	<button class="btn btn-primary" name="btn-add" id="btn-add" onClick = "click()"value="add"><i class="fa fa-plus"></i></button>
	<input type="hidden" name="click" value="<?php print $click ;?>">
</form>
