<?php
get_header();
if ( have_posts() ) :
?>
   <div class="l-row--subpage">
    <div class="grid l-container">
      <?php
        the_archive_title( '<h1 class="col-12 c-mainTitle u-alignCenter">', '</h1>' );
      ?>
      <main role="main" class="col-12_md-9">
<?php
  while ( have_posts() ) :
    the_post();
?>
  <article id="post-<?php the_ID(); ?>" class="grid-reverse c-entry">
    <header class="col-12-first c-entryHeader">
      <h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    </header><!-- .entry-header -->

    <div class="col-12_md-10 c-entryContent">
      <?php the_content( '続きを読む &raquo;', true ); ?>
    </div><!-- .entry-content -->

    <footer class="col-12_md-2 c-entryFooter">
      <?php saa_entry_meta(); ?>
    </footer><!-- .entry-footer -->
  </article><!-- #post-## -->
<?php
  endwhile;
endif;

get_template_part( 'template-parts/post', 'pagination' );
?>
      </main>
<?php
get_sidebar('blog');
?>
    </div>
  </div>
<?php
get_footer();
