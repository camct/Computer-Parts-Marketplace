<!DOCTYPE html>
<html>
<body>
<form name="motherboardForm" action="addMotherboard.php" method="post">   
  <div class="row mb-3 mx-3">
    Brand:
    <input type="text" class="form-control" name="brand" required />
	Year:
    <input type="text" class="form-control" name="year" required />
	Price:
    <input type="text" class="form-control" name="price" required />
	Supported Cpus:
    <input type="text" class="form-control" name="sup" required />
	<input type="submit" name="submit">      
  </div>  
</form>
</body>
</html>