<?php include 'includes/header.php'; ?>
<?php
  //Create Object
  $db = new Database();

  //Check category for URL
  if(isset($_GET['category'])){
  // get Category id
  $category = $_GET['category'];
  // Create Query
  $query = "SELECT * FROM posts WHERE category = ".$category;

  // Run the query
  $posts = $db->select($query);
  } else {
   // Create Query
  $query = "SELECT * FROM posts";

  // Run the query
  $posts = $db->select($query);
  }
  

?>
<?php if($posts) : ?>
    <?php while($row = $posts->fetch_assoc()) : ?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author']; ?></a></p>
              <?php echo shortenText($row['body']); ?>
           <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']); ?>">Read More</a>
          </div><!-- /.blog-post -->
    <?php endwhile; ?>
<?php else : ?>
  <p>There are no posts yet</p>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>