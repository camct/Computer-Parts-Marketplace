<!DOCTYPE html>
<html>
<?php
	$prod_ID = $_POST['prodID'];
?>
<body>
<form name="psuUpForm" action="updatePSU.php" method="post">   
	<div class="row mb-3 mx-3">
	<input type="hidden" name="prodID" value=<?php echo $prod_ID; ?> />
   Brand:
    <input type="text" class="form-control" name="brand" required />
	Year:
    <input type="text" class="form-control" name="year" required />
	Price:
    <input type="text" class="form-control" name="price" required />
	Voltage:
    <input type="text" class="form-control" name="volt" required />
	Current Rating:
    <input type="text" class="form-control" name="curr" required />
	<input type="submit" name="submit" value="Update">
	</form>
</body>
</html>