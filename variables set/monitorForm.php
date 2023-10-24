<!DOCTYPE html>
<html>
<body>
<form name="monitorForm" action="addMonitor.php" method="post">   
  <div class="row mb-3 mx-3">
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
	<input type="submit" name="submit">      
  </div>  
</form>
</body>
</html>