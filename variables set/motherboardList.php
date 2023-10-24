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
	
   $sql = "SELECT * FROM project.motherboard";
   $whole = $db->query($sql);
   
   
   $email = $_SESSION['user_email_address'];
	$sqlProfId = "SELECT profile_id FROM project.email_profile WHERE Email = '$email'";
    $profRow = $db->query($sqlProfId); 
	foreach ($profRow as $cool):
	  //echo $cool['profile_id']; 	
	  $profId = $cool['profile_id'];
	endforeach;
	//echo"<br>";

   $TransArray = array();
   $sqlTransList = "SELECT * FROM project.transaction_profile WHERE profile_id = '$profId'";
   $TransList = $db->query($sqlTransList);
   foreach ($TransList as $cool): 
   //echo $cool['transaction_id']; 
   array_push($TransArray, $cool['transaction_id']);
   endforeach;
   //echo "<br>";
   //echo "<br>";
   //echo "<br>";
   
   foreach($TransArray as $id):
	   //echo $id;
	   //echo "<br>";
   endforeach;
   
   $db->close();
   ?>
   
   <div class="row justify-content-center">  
<table class="w3-table w3-bordered w3-card-4 center" style="width:70%">
  <thead>
  <tr style="background-color:#B0B0B0">
    <th width="20%">Brand        
    <th width="20%">Year 
	<th width="20%">Price
    <th width="20%">Supported CPUs
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
     <td><?php echo $cool['Sup_CPUs']; ?> </td>
	 
	<td>
	<form name="motherboardDelForm" action="deleteMotherboard.php" method="post">   
	<div class="row mb-1 mx-1">
    <input type="hidden" name="prodID" value=<?php echo $cool['Product_ID']; ?> />
	<input type="submit" name="delete" value="Delete">      
	</div>  
	</form>
	</td>
	
	<td>
	<form name="motherboardTransForm" action="updateMotherboardForm.php" method="post">   
	<div class="row mb-1 mx-1">
    <input type="hidden" name="prodID" value=<?php echo $cool['Product_ID']; ?> />
	<input type="submit" name="delete" value="Update">      
	</div> 
	</form>
	</td>
	
	<td>
	<form name="motherboardBuyForm" action="buyMotherboard.php" method="post">   
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
          $query = "SELECT * FROM project.motherboard WHERE motherboard.price > $min_price AND motherboard.price < $max_price";

        }
        else {
          $query = "SELECT * FROM project.motherboard";
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
                <h4><?php echo "Supported CPUs: " . $cool['Sup_CPUs']; ?></h4>
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
<a href="motherboardForm.php">Click here to add a new item of this type</a>
<br>
<a href="dashboard.php">Click here to go back to the main page</a>
<br>


</html>