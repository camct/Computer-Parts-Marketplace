<!DOCTYPE html>
<html>
<?php
	$prod_ID = $_POST['prodID'];
?>
<body>
<form name="motherboardUpForm" action="updateMotherboard.php" method="post">   
	<div class="row mb-3 mx-3">
	<input type="hidden" name="prodID" value=<?php echo $prod_ID; ?> />
    Brand:
    <input type="text" class="form-control" name="brand" required />
	Year:
    <input type="text" class="form-control" name="year" required />
	Price:
    <input type="text" class="form-control" name="price" required />
	Supported Cpus:
    <input type="text" class="form-control" name="sup" required />
	<input type="submit" name="submit" value="Update">
	</form>
</body>
</html>