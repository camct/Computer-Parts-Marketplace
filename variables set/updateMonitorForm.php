<!DOCTYPE html>
<html>
<?php
	$prod_ID = $_POST['prodID'];
?>
<body>
<form name="case_typeUpForm" action="updateMonitor.php" method="post">   
	<div class="row mb-3 mx-3">
	<input type="hidden" name="prodID" value=<?php echo $prod_ID; ?> />
    Brand:
    <input type="text" class="form-control" name="brand" required />
	Year:
    <input type="text" class="form-control" name="year" required />
	Price:
    <input type="text" class="form-control" name="price" required />
	Refresh Rate:
    <input type="text" class="form-control" name="rate" required />
	Dimensions:
    <input type="text" class="form-control" name="dim" required />
	<input type="submit" name="submit" value="Update">
	</form>
</body>
</html>