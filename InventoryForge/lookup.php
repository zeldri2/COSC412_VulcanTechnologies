<style>
<?php include "main.css"; ?>
}
</style>
<h2 class="title">Inventory</h2>
    <table class="db">
      <thead>
<tr>

  <th>mainName</th>
  <th>subName</th>
  <th>itemID</th>
  <th>itemName</th>
  <th>quantity</th>
  <th>price</th>
  <th></th>
</tr>
      </thead>

<?php
  /**
    * Function to display all items in inventory
    *
    */
  try {
    require "config.php";
    require "common.php";

    $connection = new PDO($dsn, $username, $password, $options);

    $stmt = $connection->prepare("SELECT main.mainName, sub.subName, items.itemID, items.itemName, items.quantity, items.price FROM items JOIN sub ON items.subID = sub.subID JOIN main ON main.mainID = sub.mainID");
    $stmt->execute(); 
    $result = $stmt->fetchAll();

  } catch(PDOException $error) {
      echo $error->getMessage();
}?>

<?php require "templates/header.php"; ?>

<tbody>
<?php foreach ($result as $row) { ?>
  <tr>
  <td><?php echo escape($row["mainName"]); ?></td>
  <td><?php echo escape($row["subName"]); ?></td>
  <td><?php echo escape($row["itemID"]); ?></td>
  <td><?php echo escape($row["itemName"]); ?></td>
  <td><?php echo escape($row["quantity"]); ?></td>
  <td><?php echo escape($row["price"]); ?></td>

  </tr>
<?php } ?>
</tbody>
</table>

<a href="index.php" class="homeBtn">Back to home</a>

<?php require "templates/footer.php"; ?>
