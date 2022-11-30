<?php include "templates/header.php"; ?>


<style>
<?php include "main.css"; ?>
}
</style>

<!-- Navbar -->
<center><img src="images/logo.png" alt="Logo Here" style="max-height: 80%; margin-left: 1%; margin-top: 1px"></center>
  <div class="topnav">
  <a class="active" href="../lookup.php">Inventory Lookup</a>
  <a href="../update.php">Update Items</a>
  <a href="../increase.php">Batch Increase</a>
  <a href="../decrease.php">Batch Decrease</a>
  <a href="../add.php">Add Item</a>
  <a href="../remove.php">Remove Item</a>
</div>


<div class="container">
        <div class="alert_fail"> 
            <h1>Inventory Forge Management System</h1>
            <p>Vulcan Technologies debut product, the Inventory Forge Management System Version 1.0, has been released. Major functionality that can be expected from this product includes providing the ability to lookup/view what is currently in stock, to update what items are stored in the database, to perform batch increases and decreases of inventory stock, and to either add or remove an item altogether from the database. </p>
            <h2>Inventory Lookup</h2>
            <p>This page is a list of what is currently in inventory - this including the Main and Sub categories the item falls under, the unique item ID, the name of the item, the quantity of the item thats in stock, and the item's price in U.S. dollars.</p>
            <h2>Update Items</h2>
            <p>This page allows for the user to update an individual item's quantity, which would be especially useful after a sale or purchase is made. In order to update the quantity of an item in the inventory, the user simply needs to enter the item's unique item ID and also give the updated quantity. If they need to see what the item ID of a particular item is, there is a list of all the items in the database, similar to that of which is on the Item Lookup page, so they can quickly see what the item ID is of the item they are looking to update.</p>
            <h2>Batch Increase</h2>
            <p>This page allows for the user to update the quantity of multiple items at a given time. This is especially useful after items come back in stock, or a new shipment of items comes in. All a user must do is give the item IDs and the new quantities for each item that they want to change.</p>
            <h2>Batch Decrease</h2>
            <p>This page has near the same functionality as Batch Increase, with the exception being that it is a Batch Decrease. This is especially useful after a purchase is made, where a customer buys more than one item. All a user must do is give the item IDs and the new quantities for each item that they want to change.</p>
            <h2>Add Item</h2>
            <p>This page allows for the user to add a completely new item entry to the database.</p>
            <h2><span>Remove Item</span></h2>
            <p>This page allows for the user to remove an item entry from the database in its entirety. This is useful for if an item is discontinued and won't be sold anymore, or at least for an extended period of time. </p>
        </div>
</div>
