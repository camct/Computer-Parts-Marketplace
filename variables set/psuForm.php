<!DOCTYPE html>
<html>
<body>
<form name="psuForm" action="addPSU.php" method="post">   
  <div class="row mb-3 mx-3">
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
	<input type="submit" name="submit">      
  </div>  
</form>
</body>
</html>