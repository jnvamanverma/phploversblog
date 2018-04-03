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
?>
<div class="blog-post">
<?php if($post) : ?>
    <?php $row = $post->fetch_assoc(); ?>
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author']; ?></a></p>
	<?php echo $row['body']; ?>			
         </div><!-- /.blog-post -->	
<?php else : ?>	    
    <p>Error in fetching post. <br> Post not found</p>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>