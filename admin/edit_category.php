<?php include 'includes/header.php'; ?>
<?php 
// Create Object
$db = new Database();
// Get Id
$id = $_GET['id'];
// Create Query
$query = "SELECT * FROM categories WHERE id=".$id;
// Execute Query
$categories = $db->select($query);
$category = $categories->fetch_assoc();
?>
<form role="form" method="post" action="edit_category.php">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="<?php echo $category['name']; ?>">
  </div>
  <div>
    <input name="submit" type="submit" class="btn btn-default" value="Submit">
    <a href="index.php" class="btn btn-default">Cancel</a>
    <input name="delete" type="submit" class="btn btn-danger" value="Delete">
  </div>
  <br>
</form>
<?php include 'includes/footer.php'; ?>