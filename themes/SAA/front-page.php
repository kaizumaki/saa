<?php
get_header();
?>
  <main role="main">
    <div class="l-row--img">
      <img src="<?php header_image(); ?>" alt="">
    </div>
<?php
$info_args = array(
  'post_type' => 'info',
  'posts_per_page' => 5,
);
$info_posts = new WP_Query( $info_args );
if ( $info_posts->have_posts() ) :
?>
    <div id="info" class="l-row--colored">
      <div class="l-container grid-center">
        <section class="col-12_md-6">
          <h2 class="c-mainTitle u-alignCenter">information</h2>
          <ul>
<?php
  while ( $info_posts->have_posts() ) :
    $info_posts->the_post();
?>
            <li>
              <span class="p-info__date"><?php the_time( 'Y.m.d' ); ?></span>
              <div class="p-info__text"><?php the_content(); ?></div>
            </li>
<?php
  endwhile;
  wp_reset_postdata();
?>
          </ul>
        </section>
      </div>
    </div>
<?php
endif;
?>
<?php
$work_args = array(
  'post_type' => 'work',
  'posts_per_page' => 4,
);
$work_posts = new WP_Query( $work_args );
if ( $work_posts->have_posts() ) :
?>
    <div class="l-row">
      <div class="l-container">
        <section>
          <h2 class="c-mainTitle u-alignCenter">work</h2>
          <ul class="grid-spaceBetween-equalHeight">
<?php
  while ( $work_posts->have_posts() ) :
    $work_posts->the_post();
    get_template_part( 'template-parts/work', 'list' );
  endwhile;
  wp_reset_postdata();
?>
          </ul>
          <div class="grid-center">
            <div class="col-10_md-4">
              <a href="<?php echo get_post_type_archive_link( 'work' ); ?>" class="c-btn u-textLarge">and more...</a>
            </div>
          </div>
        </section>
      </div>
    </div>
<?php
endif;
?>
    <div id="contact" class="l-row--colored">
      <div class="l-container">
        <section>
          <h2 class="c-mainTitle u-alignCenter">contact us</h2>
          <div class="grid-center">
            <div class="col-12_md-8">
<?php
  $page_info = get_page_by_path( 'contact_contents' );
  $page = get_post( $page_info );
  echo $page->post_content;
?>
            </div>
            <div id="map" class="col-12_md-4 p-map"></div>
          </div>
        </section>
      </div>
    </div>
  </main>
<?php
get_footer();
