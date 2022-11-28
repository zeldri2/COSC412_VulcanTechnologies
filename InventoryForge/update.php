<?php

/**
  * List all items with link to edit
  */
require "config.php";
require "common.php";

if (isset($_POST['submit'])) {
  # Updating item entry
  try {
    $connection = new PDO($dsn, $username, $password, $options);
  
    $client= array(
    "itemID" => $_POST['itemID'],
    "quantity" => $_POST['quantity']
    );
  
    $sql = "UPDATE items SET quantity = :quantity WHERE itemID = :itemID";

    $statement = $connection->prepare($sql);
    $statement->bindParam(':itemID', $itemID, PDO::PARAM_STR);
    $statement->bindParam(':quantity', $quantity, PDO::PARAM_STR);
    $statement->execute($client);  
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }  
}
try {
  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT main.mainName, sub.subName, items.itemID, items.itemName, items.quantity, items.price FROM items JOIN sub ON items.subID = sub.subID JOIN main ON main.mainID = sub.mainID";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>

<h2>Update Quantity</h2>


<h4>Please enter the information to update an item</h4>
    <form method="post">
      <label for="itemID">itemID</label><br>
      <input type="text" name="itemID" id="itemID"><br>
      <label for="quantity">quantity</label><br>
      <input type="text" name="quantity" id="quantity"><br>
      <input type="submit" name="submit" value="Submit">
    </form>

<table>
  <thead>
    <tr>
      <th>MainName</th>
      <th>SubName</th>
      <th>ItemID</th>
      <th>ItemName</th>
      <th>Quantity</th>
      <th>Price</th>
    </tr>
  </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
      <tr>
        <td><?php echo escape($row["mainName"]); ?></td>
        <td><?php echo escape($row["subName"]); ?></td>
        <td><?php echo escape($row["itemID"]); ?></td>
        <td><?php echo escape($row["itemName"]); ?></td>
        <td><?php echo escape($row["quantity"]); ?></td>
        <td><?php echo escape($row["price"]); ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>