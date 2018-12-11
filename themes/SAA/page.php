<?php
get_header();
?>
   <main role="main">
    <div class="l-row--subpage">
      <div class="l-container grid-center">
<?php
if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();
?>
        <section class="col-12_md-6" id="post-<?php the_ID(); ?>">
          <h1 class="c-mainTitle u-alignCenter"><?php the_title(); ?></h1>
          <?php the_content(); ?>
        </section>
<?php
  endwhile;
endif;
?>
      </div>
    </div>
  </main>
<?php
get_footer();
