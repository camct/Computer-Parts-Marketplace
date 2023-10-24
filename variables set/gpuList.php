<!DOCTYPE html>
<html>
<?php
  $username = 'root';
 $password = 'password';
 $host = '35.245.107.193';
 $dbname = 'project';  
	$db = new mysqli($host, $username, $password, $dbname);
	
	if($db->connect_error) {
		echo "connect error " . $db->connect_error . "<br>";
	}
	
   $sql = "SELECT * FROM project.gpu";
   $whole = $db->query($sql);?>
   
   <div class="row justify-content-center">  
<table class="w3-table w3-bordered w3-card-4 center" style="width:70%">
  <thead>
  <tr style="background-color:#B0B0B0">
    <th width="30%">Brand        
    <th width="30%">Year        
    <th width="30%">Price
	<th width="30%">Memory_Size
	<th width="20%">Delete
	<th width="20%">Update	
	<th width="20%">Buy
  </tr>
  </thead>
<?php foreach ($whole as $cool): ?>
  <tr>
     <td><?php echo $cool['Brand']; ?></td>
     <td><?php echo $cool['Year']; ?></td>        
     <td><?php echo $cool['Price']; ?></td>
	 <td><?php echo $cool['Memory_Size']; ?></td>	 
	 
	 <td>
	<form name="gpuDelForm" action="deleteGPU.php" method="post">   
	<div class="row mb-1 mx-1">
    <input type="hidden" name="prodID" value=<?php echo $cool['Product_ID']; ?> />
	<input type="submit" name="delete" value="Delete">      
	</div>  
	</form>
	</td>
	
	<td>
	<form name="gpuTransForm" action="updateGPUForm.php" method="post">   
	<div class="row mb-1 mx-1">
    <input type="hidden" name="prodID" value=<?php echo $cool['Product_ID']; ?> />
	<input type="submit" name="delete" value="Update">      
	</div> 
	</form>
	</td>
	
	<td>
	<form name="gpuBuyForm" action="buyGPU.php" method="post">   
	<div class="row mb-1 mx-1">
    <input type="hidden" name="prodID" value=<?php echo $cool['Product_ID']; ?> />
	<input type="submit" name="delete" value="Buy">      
	</div> 
	</form>
	</td>
  </tr>
<?php endforeach; ?>
</table>
</div>
<div>
<br>
<form method="GET">
        <label>Min Price</label>
        <input type="text" name="min_price" value="<?php if(isset($_GET['min_price'])){echo $_GET['min_price']; }else{echo "0";}?>">
        <label>Max Price</label>
        <input type="text" name="max_price" value="<?php if(isset($_GET['max_price'])){echo $_GET['max_price']; }else{echo "1000";}?>">
        <button type="submit">Filter</button> -->

        <?php

        if (isset($_GET['min_price']) && isset($_GET['max_price'])) {
          $min_price = $_GET['min_price'];
          $max_price = $_GET['max_price'];
          $query = "SELECT * FROM project.gpu WHERE gpu.price > $min_price AND gpu.price < $max_price";

        }
        else {
          $query = "SELECT * FROM project.gpu";
        }
        

        $username = 'root';
        $password = 'password';
        $host = '35.245.107.193';
        $dbname = 'project';  
        
        $db = mysqli_connect($host, $username, $password, $dbname);
        $whole = mysqli_query($db, $query);

        ?>
        <br>
        <h1>Listings</h1>
        <br>
        <?php
        if(mysqli_num_rows($whole)>0) {
            foreach($whole as $cool):
              ?>
                <h3><?php echo "Brand: " . $cool['Brand']; ?></h3>
                <h4><?php echo "Year: " . $cool['Year']; ?></h4>
                <h4><?php echo "Price: " . $cool['Price']; ?></h4>
                <h4><?php echo "Memory Size: " . $cool['Memory_Size']; ?></h4>
                <br>
                <hr>
                <?php
            endforeach;
        }
        else {echo "NO RESULTS";}
        // endforeach;
        ?>
</form>
</div>
<a href="gpuForm.php">Click here to add a new item of this type</a>
<br>
<a href="dashboard.php">Click here to go back to the main page</a>
</html>