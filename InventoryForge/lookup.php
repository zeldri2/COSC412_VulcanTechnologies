<h2>Inventory</h2>
    <table>
      <thead>
<tr>

  <th>subID</th>
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

    $stmt = $connection->prepare("SELECT * FROM items");
    $stmt->execute(); 
    $result = $stmt->fetchAll();

  } catch(PDOException $error) {
      echo $error->getMessage();
}?>

<?php require "templates/header.php"; ?>

<tbody>
<?php foreach ($result as $row) { ?>
  <tr>
  <td><?php echo escape($row["subID"]); ?></td>
  <td><?php echo escape($row["itemID"]); ?></td>
  <td><?php echo escape($row["itemName"]); ?></td>
  <td><?php echo escape($row["quantity"]); ?></td>
  <td><?php echo escape($row["price"]); ?></td>

  </tr>
<?php } ?>
</tbody>
</table>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>