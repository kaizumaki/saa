<?php
$images = get_field('photo');
if ( $images ) :
?>
<li class="col-12_md-3 p-work__item">
  <div class="p-work__itemInner">
    <div class="p-work__itemLinkWrap">
      <a href="<?php the_permalink(); ?>"><div class="p-work__itemImgWrap"><img src="<?php echo $images[0]['sizes']['medium']; ?>" alt="<?php echo $images[0]['alt']; ?>" class="u-positionCenter"></div></a>
    </div>
    <div class="p-work__itemInfo"><?php echo esc_html( get_post_meta( $post->ID, 'year', true ) ); ?><br><?php echo esc_html( get_post_meta( $post->ID, 'name', true ) ); ?><br><?php if( !is_front_page() ){ echo esc_html( get_post_meta( $post->ID, 'additional_name', true ) ); } ?></div>
  </div>
</li>
<?php
endif;
