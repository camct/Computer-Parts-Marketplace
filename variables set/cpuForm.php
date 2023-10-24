<!DOCTYPE html>
<html>
<body>
<form name="cpuForm" action="addCpu.php" method="post">   
  <div class="row mb-3 mx-3">
    Brand:
    <input type="text" class="form-control" name="brand" required />
	Year:
    <input type="text" class="form-control" name="year" required />
	Price:
    <input type="text" class="form-control" name="price" required />
	Clock Speed:
    <input type="text" class="form-control" name="clock" required />
	Overclocking Support:
    <input type="text" class="form-control" name="over" required />
	<input type="submit" name="submit">      
  </div>  
</form>
</body>
</html>