<?php include "templates/header.php"; ?>
<style>
<?php include "main.css"; ?>
</style>
<h2 class="title">Add Item to Inventory</h3>
<h4>Please enter the information to create a new item entry. When you are done entering your information, please click the "Submit" button, and then click "Back to home.</h4>
    <form method="post">
	    <label for="subID">SubID</label><br>
	    <input type="text" name="subID" id="subID"><br>
	    <label for="itemID">ItemID</label><br>
			<input type="text" name="itemID" id="itemID"><br>
			<label for="itemName">Item Name</label><br>
			<input type="text" name="itemName" id="itemName"><br>
			<label for="quantity">Quantity</label><br>
	    <input type="text" name="quantity" id="quantity"><br>
	    <label for="price">Price</label><br>
			<input type="text" name="price" id="price"><br>
			<input type="submit" name="submit" value="Submit">
    </form>
		
<a href="index.php" class="homeBtn">Back to home</a>

<?php

/**
  * Add an item to inventory
  */

require "config.php";
require "common.php";

if (isset($_POST['submit'])) {
  # Creating item entry
	try {
	  $connection = new PDO($dsn, $username, $password, $options);
  
	  $client= array(
		"subID" => $_POST['subID'],
		"itemID" => $_POST['itemID'],
		"itemName" => $_POST['itemName'],
		"quantity" => $_POST['quantity'],
		"price" => $_POST['price']
	  );
  
	  $sql = "INSERT INTO items (subID, itemID, itemName, quantity, price) ";
		$sql .= "VALUES (:subID, :itemID, :itemName, :quantity, :price)";

	  $statement = $connection->prepare($sql);
	  $statement->bindParam(':subID', $subID, PDO::PARAM_STR);
  	$statement->bindParam(':itemID', $itemID, PDO::PARAM_STR);
		$statement->bindParam(':itemName', $itemName, PDO::PARAM_STR);
		$statement->bindParam(':quantity', $quantity, PDO::PARAM_STR);
		$statement->bindParam(':price', $price, PDO::PARAM_STR);
	  $statement->execute($client);  
	} catch(PDOException $error) {
	  echo $sql . "<br>" . $error->getMessage();
	}  
}
?>

<?php include "templates/footer.php"; ?>
