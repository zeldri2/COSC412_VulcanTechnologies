<style>
<?php include "main.css"; ?>
}
</style>
<?php

/** Batch Increase **/

require "config.php";
require "common.php";

if (isset($_POST['submit'])) {
	try{
		$connection = new PDO($dsn, $username, $password, $options);

		$sql1 = $connection->prepare("UPDATE items SET quantity = quantity + :quantity1 WHERE itemID = :itemID1");
		$sql1->bindParam(':quantity1', $quantity1, PDO::PARAM_STR);
		$sql1->bindParam(':itemID1', $itemID1, PDO::PARAM_STR);
		$quantity1 = $_POST['quantity1'];
		$itemID1 = $_POST['itemID1'];
		$sql1->execute();

		$sql2 = $connection->prepare("UPDATE items SET quantity = quantity + :quantity2 WHERE itemID = :itemID2");
		$sql2->bindParam(':quantity2', $quantity2, PDO::PARAM_STR);
		$sql2->bindParam(':itemID2', $itemID2, PDO::PARAM_STR);
		$quantity2 = $_POST['quantity2'];
		$itemID2 = $_POST['itemID2'];
		$sql2->execute();

		$sql3 = $connection->prepare("UPDATE items SET quantity = quantity + :quantity3 WHERE itemID = :itemID3");
		$sql3->bindParam(':quantity3', $quantity3, PDO::PARAM_STR);
		$sql3->bindParam(':itemID3', $itemID3, PDO::PARAM_STR);
		$quantity3 = $_POST['quantity3'];
		$itemID3 = $_POST['itemID3'];
		$sql3->execute();

		$sql4 = $connection->prepare("UPDATE items SET quantity = quantity + :quantity4 WHERE itemID = :itemID4");
		$sql4->bindParam(':quantity4', $quantity4, PDO::PARAM_STR);
		$sql4->bindParam(':itemID4', $itemID4, PDO::PARAM_STR);
		$quantity4 = $_POST['quantity4'];
		$itemID4 = $_POST['itemID4'];
		$sql4->execute();

		$sql5 = $connection->prepare("UPDATE items SET quantity = quantity + :quantity5 WHERE itemID = :itemID5");
		$sql5->bindParam(':quantity5', $quantity5, PDO::PARAM_STR);
		$sql5->bindParam(':itemID5', $itemID5, PDO::PARAM_STR);
		$quantity5 = $_POST['quantity5'];
		$itemID5 = $_POST['itemID5'];
		$sql5->execute();
	}
 	catch(PDOException $error) {
    echo $error->getMessage();
  	}
}
?>
 
<?php require "templates/header.php"; ?>
 
 <h2 class="title">Batch Increase</h2>
 
 	<h4> Enter multiple itemIDs to increase multiple quantities at once.</h4>
 	
 	<form method="post">
 	 		<label for="itemID1">ItemID 1</label><br>
      	 <input type="text" name="itemID1" id="itemID1"><br>
      	 <label for="quantity1">Quantity to increase:</label><br>
      	 <input type="text" name="quantity1" id="quantity1"><br>
      	 
      	 <label for="itemID2">ItemID 2</label><br>
      	 <input type="text" name="itemID2" id="itemID2"><br>
      	 <label for="quantity2">Quantity to increase:</label><br>
      	 <input type="text" name="quantity2" id="quantity2"><br>
      	 
      	 <label for="itemID3">ItemID 3</label><br>
      	 <input type="text" name="itemID3" id="itemID3"><br>
      	 <label for="quantity3">Quantity to increase:</label><br>
      	 <input type="text" name="quantity3" id="quantity3"><br>
      	 
      	 <label for="itemID4">ItemID 4</label><br>
      	 <input type="text" name="itemID4" id="itemID4"><br>
      	 <label for="quantity4">Quantity to increase:</label><br>
      	 <input type="text" name="quantity4" id="quantity4"><br>
      	 
      	 <label for="itemID5">ItemID 5</label><br>
      	 <input type="text" name="itemID5" id="itemID5"><br>
      	 <label for="quantity5">Quantity to increase:</label><br>
      	 <input type="text" name="quantity5" id="quantity5"><br>
      	 
      	 <input type="submit" name="submit" value="Submit">
      	 
      	</form>
 

<a href="index.php" class="homeBtn">Back to home</a>
