<h3>Add Item to Inventory</h3>
<h4>Please enter the information to create new item</h4>
    <form method="post">
	    <label for="subID">subID</label><br>
	    <input type="text" name="subID" id="subID"><br>
	    <label for="itemID">itemID</label><br>
			<input type="text" name="itemID" id="itemID"><br>
			<label for="itemName">itemName</label><br>
			<input type="text" name="itemName" id="itemName"><br>
			<label for="quantity">quantity</label><br>
	    <input type="text" name="quantity" id="quantity"><br>
	    <label for="price">price</label><br>
			<input type="text" name="price" id="price"><br>
			<input type="submit" name="submit" value="Submit">
    </form>
	<h3>When you are done entering your information, please click the green "Submit" button, then click "Back to home"</h3>
		
<a href="index.php">Back to home</a>

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