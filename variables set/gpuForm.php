<!DOCTYPE html>
<html>
<body>
<form name="gpuForm" action="addGpu.php" method="post">   
  <div class="row mb-3 mx-3">
    Brand:
    <input type="text" class="form-control" name="brand" required />
	Year:
    <input type="text" class="form-control" name="year" required />
	Price:
    <input type="text" class="form-control" name="price" required />
	Memory Size:
    <input type="text" class="form-control" name="mem_size" required />
	<input type="submit" name="submit">      
  </div>  
</form>
</body>
</html>