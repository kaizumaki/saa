<?php
get_header();
?>
  <main role="main">
    <div class="l-row--subpage">
      <div class="l-container">
        <section id="post-<?php the_ID(); ?>">
          <h1 class="c-mainTitle u-alignCenter">work</h1>
          <?php get_template_part( 'template-parts/work', 'genre' ); ?>
<?php
if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();
    $images = get_field('photo');
    if ( $images ) :
?>
          <div class="grid-center">
            <div class="col-12_md-8">
              <div class="u-alignCenter"><img src="<?php echo $images[0]['sizes']['medium']; ?>" alt="<?php echo $images[0]['alt']; ?>" class="js-workMain"></div>
              <div><?php echo esc_html( get_post_meta( $post->ID, 'year', true ) ); ?><br><?php echo esc_html( get_post_meta( $post->ID, 'name', true ) ); ?><br><?php echo esc_html( get_post_meta( $post->ID, 'additional_name', true ) ); ?></div>
            </div>
          </div>
          <ul class="grid-center">
            <?php foreach ( $images as $image ) : ?>
            <li class="col-6_md-2">
              <div class="p-workThumb__item">
                <div class="p-workThumb__itemInner">
                  <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" class="u-positionCenter js-workThumb">
                </div>
              </div>
            </li>
            <?php endforeach; ?>
          </ul>
<?php
    endif;
  endwhile;
endif;
?>
        </section>
      </div>
    </div>
  </main>
<?php
get_footer();
