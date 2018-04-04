<?php include 'includes/header.php'; ?>
<?php 
    // Create Object
    $db = new Database();

    if(isset($_POST['submit'])){
      // Assign Vars
      $name = mysqli_real_escape_string($db->link, $_POST['name']);
      // Simple Validation
      if($name == ''){
        // Set Error
        $error = 'Please fill out all required fields';
      } else {
        $query = "INSERT INTO categories(name) 
        VALUES('$name')";

        $insert_row = $db->insert($query);
      }
    }
?>
<form role="form" method="post" action="add_category.php">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="category">
  </div>
  <div>
    <input name="submit" type="submit" class="btn btn-default" value="Submit"> 
    <a href="index.php" class="btn btn-default">Cancel</a>   
  </div>
  <br>
</form>
<?php include 'includes/footer.php'; ?>