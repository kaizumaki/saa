<?php
get_header();
?>
  <main role="main">
    <div class="l-row--subpage">
      <div class="l-container">
        <section id="post-<?php the_ID(); ?>">
          <h1 class="c-mainTitle u-alignCenter">work</h1>
          <?php get_template_part( 'template-parts/work', 'genre' ); ?>
          <ul class="grid-equalHeight js-workCategory">
<?php
if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();
    get_template_part( 'template-parts/work', 'list' );
  endwhile;
endif;
?>
          </ul>
        </section>
      </div>
    </div>
  </main>
<?php
get_footer();
