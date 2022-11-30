<style>
<?php include "main.css"; ?>
}
</style>
<?php

/**
  * Remove an item from the inventory
  */

require "config.php";
require "common.php";

if (isset($_GET["itemID"])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $itemID = $_GET["itemID"];

    $sql = "DELETE FROM items WHERE itemID = :itemID";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':itemID', $itemID);
    $statement->execute();

    $success = "Item successfully removed";
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

<h2 class="title">Remove Items</h2>

<?php if ($success) echo $success; ?>

<table class="db">
  <thead>
    <tr>
      <th>MainName</th>
      <th>SubName</th>
      <th>ItemID</th>
      <th>ItemName</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Remove</th>
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
        <td><button><a href="remove.php?itemID=<?php echo escape($row["itemID"]); ?>"id ="remove">Remove</a></button></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php" class="homeBtn">Back to home</a>

<?php require "templates/footer.php"; ?>
