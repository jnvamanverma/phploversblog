<?php include 'includes/header.php'; ?>
<?php 
// Create Object
$db = new Database();

// Get Id
$id = $_GET['id'];

// Create Query
$query = "SELECT * FROM posts WHERE id =".$id;

// get the post
$post = $db->select($query);
$post = $post->fetch_assoc();

// Create Query
$query = "SELECT * FROM categories";
// Execute Query
$categories = $db->select($query);
?>
<form role="form" method="post" action="edit_post.php">
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Title" value="<?php echo $post['title'];?>">
  </div>
  <div class="form-group">
    <label>Post Body</label>
    <textarea name="body" class="form-control" placeholder="Enter Post" rows=5 cols=10><?php echo $post['body'];?></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
    <?php while($category = $categories->fetch_assoc()) : ?>
        <?php if($category['id'] == $post['category']){
                $selected = 'selected';
        }else {
                $selected='';
        }
        ?>
        <option <?php echo $selected; ?> ><?php echo $category['name'];?></option>
    <?php endwhile; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" placeholder="Enter Author Name" value="<?php echo $post['author'];?>">
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tags" value="<?php echo $post['tags'];?>">
  </div>
  
  <div>
    <input name="submit" type="submit" class="btn btn-default" value="Submit">
    <a href="index.php" class="btn btn-default">Cancel</a>
    <input name="delete" type="submit" class="btn btn-danger" value="Delete">
  </div>
  <br>
</form>

<?php include 'includes/footer.php'; ?>