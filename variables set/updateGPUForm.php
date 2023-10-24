<!DOCTYPE html>
<html>
<?php
	$prod_ID = $_POST['prodID'];
?>
<body>
<form name="gpuUpForm" action="updateGPU.php" method="post">   
	<div class="row mb-3 mx-3">
	<input type="hidden" name="prodID" value=<?php echo $prod_ID; ?> />
    Brand:
    <input type="text" class="form-control" name="brand" required />
	Year:
    <input type="text" class="form-control" name="year" required />
	Price:
    <input type="text" class="form-control" name="price" required />
	Memory Size:
    <input type="text" class="form-control" name="mem_size" required />
	<input type="submit" name="submit">      
	</form>
</body>
</html>