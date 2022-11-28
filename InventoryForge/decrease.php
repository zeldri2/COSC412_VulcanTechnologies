<?php

/** decrease items quanity **/

require "config.php";
require "common.php";

if (isset($_POST['sumbit'])) {

try{
	$connection = new PDO($dsn, $username, $password, $options);

	$client= array(
    	"itemID1" => $_POST['itemID1'],
    	"quantity1" => $_POST['quantity1'],
    	"itemID2" => $_POST['itemID2'],
    	"quantity2" => $_POST['quantity2'],
    	"itemID3" => $_POST['itemID3'],
    	"quantity3" => $_POST['quantity3'],
    	"itemID4" => $_POST['itemID4'],
    	"quantity4" => $_POST['quantity4'],
    	"itemID5" => $_POST['itemID5'],
    	"quantity5" => $_POST['quantity5'],
    	
    	);

	$sql = "UPDATE items SET quantity = quantity - quantity1 WHERE itemID = itemID1"; "UPDATE items SET quantity = quantity - quantity2 WHERE itemID = itemID2"; "UPDATE items SET quantity = quantity - quantity3 WHERE itemID = itemID3"; "UPDATE items SET quantity = quantity - quantity4 WHERE itemID = itemID4"; "UPDATE items SET quantity = quantity - quantity5 WHERE itemID = itemID5";

	$statement = $connection->prepare($sql);
	$statement->bindParam('quanity1', $quantity,PDO::PARAM_STR);
	$statement->bindParam('itemID1', $itemID,PDO::PARAM_STR);
	$statement->bindParam('quanity2', $quantity,PDO::PARAM_STR);
	$statement->bindParam('itemID2', $itemID,PDO::PARAM_STR);
	$statement->bindParam('quanity3', $quantity,PDO::PARAM_STR);
	$statement->bindParam('itemID3', $itemID,PDO::PARAM_STR);
	$statement->bindParam('quanity4', $quantity,PDO::PARAM_STR);
	$statement->bindParam('itemID4', $itemID,PDO::PARAM_STR);
	$statement->bindParam('quanity5', $quantity,PDO::PARAM_STR);
	$statement->bindParam('itemID5', $itemID,PDO::PARAM_STR);

	$statement->execute($client);	

	$success = "items updated";
 }
 	catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
 }

 ?>
 
 <?php require "templates/header.php"; ?>
 
 <h2>Decrease at once</h2>
 
 	<h4> enter multiple itemID to decrease multiple quantitys at once</h4>
 	
 	<form method="post">
 	 <label for="itemID1">itemID 1</label><br>
      	 <input type="text" name="itemID1" id="itemID1"><br>
      	 <label for="quantity1">quantity to decrease</label><br>
      	 <input type="text" name="quantity1" id="quantity1"><br>
      	 
      	 <label for="itemID2">itemID 2</label><br>
      	 <input type="text" name="itemID2" id="itemID2"><br>
      	 <label for="quantity2">quantity to decrease</label><br>
      	 <input type="text" name="quantity2" id="quantity2"><br>
      	 
      	 <label for="itemID3">itemID 3</label><br>
      	 <input type="text" name="itemID3" id="itemID3"><br>
      	 <label for="quantity3">quantity to decrease</label><br>
      	 <input type="text" name="quantity3" id="quantity3"><br>
      	 
      	 <label for="itemID4">itemID 4</label><br>
      	 <input type="text" name="itemID4" id="itemID4"><br>
      	 <label for="quantity4">quantity to decrease</label><br>
      	 <input type="text" name="quantity4" id="quantity4"><br>
      	 
      	 <label for="itemID5">item5</label><br>
      	 <input type="text" name="itemID5" id="itemID5"><br>
      	 <label for="quantity5">quantity to decrease</label><br>
      	 <input type="text" name="quantity5" id="quantity5"><br>
      	 
      	 <input type="submit" name="submit" value="submit">
      	 
      	</form>
 

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>