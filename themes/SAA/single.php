<?php
get_header();
?>
   <div class="l-row--subpage">
    <div class="grid l-container">
      <h1 class="col-12 c-mainTitle u-alignCenter"><a href="/blog/">blog</a></h1>
      <main role="main" class="col-12_md-9">
<?php
if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();
?>
  <article id="post-<?php the_ID(); ?>" class="grid-reverse c-entry">
    <header class="col-12-first c-entryHeader">
      <h2><?php the_title(); ?></h2>
    </header><!-- .entry-header -->

    <div class="col-12_md-10 c-entryContent">
      <?php the_content(); ?>
    </div><!-- .entry-content -->

    <footer class="col-12_md-2 c-entryFooter">
      <?php saa_entry_meta(); ?>
    </footer><!-- .entry-footer -->
  </article><!-- #post-## -->
<?php
    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif;
  endwhile;
endif;
?>
      </main>
<?php
get_sidebar('blog');
?>
    </div>
  </div>
<?php
get_footer();
