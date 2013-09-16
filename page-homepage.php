<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>

<div id="content" class="clearfix row">
  <div id="main" class="col-xs-12 clearfix" role="main">
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
      <section class="row post_content">
        <div class="col-sm-7 lead alpha">
          <?php while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
          <?php endwhile; ?>
        </div>
        <div class="col-sm-5 omega">
          <h3>Latest Study</h3>
          <p>Current Study Information goes here</p>
        </div>
      </section>
      <!-- end article header -->
      
      <footer> </footer>
      <!-- end article footer --> 
      
    </article>
    <!-- end article --> 
    
  </div>
  <!-- end #main --> 
  
</div>
</div></div>
<div class="cream-bg">
  <div class="container">
    <div class="row">
      <div class="col-sm-7 alpha">
        <h2>Our Current Study</h2>
        <p>Information goes here</p>
      </div>
      <div class="col-sm-5 omega">Image Goes Here</div>
    </div>
  </div>
</div>
<div class="bluelight-bg">
<div class="container">
    <div class="row">
      <div class="col-sm-7 alpha">
        <div class="bluedark-bg mar-one-b"><h2>OCL In The Community</h2>
        <p>Information goes here</p></div>
        <div class="blue-bg mar-one-b"><h2>Quotes</h2>
        <p>Information goes here</p></div>
      </div>
      <div class="col-sm-5 omega"><h3>OCL News</h3></div>
    </div>
 

<!-- end #content -->

<?php get_footer(); ?>
