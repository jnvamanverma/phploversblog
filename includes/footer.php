<?php 
    // Create Query
    $query = "SELECT * FROM categories";

    // Execute Query
    $categories = $db->select($query);
?>

</div><!-- /.blog-main -->

<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
  <div class="sidebar-module sidebar-module-inset">
    <h4>About</h4>
    <p><?php echo $site_description; ?></p>
  </div>
  <div class="sidebar-module">
    <h4>Categories</h4>
    <ol class="list-unstyled">
  <?php if($categories) : ?>
  <?php while($category = $categories->fetch_assoc()) : ?>
      <li><a href="posts.php?category=<?php echo $category['id'];?>"><?php echo $category['name']; ?></a></li>
  <?php endwhile; ?>
  <?php else : ?>
    <p>Error in fetching Categories. <br> Categories not found.</p>
  <?php endif; ?>
    </ol>
  </div>
</div><!-- /.blog-sidebar -->

</div><!-- /.row -->

</div><!-- /.container -->

<div class="blog-footer">
<p>PHPLoversBlog &copy; 2014</p>
<p>
<a href="#">Back to top</a>
</p>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>