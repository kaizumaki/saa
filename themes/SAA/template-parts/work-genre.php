<ul class="grid p-workNav">
  <li class="p-workNav__item <?php if ( is_post_type_archive( get_post_type() ) ) { echo 'current'; }; ?>">
    <a href="<?php echo get_post_type_archive_link( get_post_type() ); ?>">All</a>
  </li>
  <?php
    $taxonomy = 'genre';
    $terms = get_terms( $taxonomy );
    if ( !is_wp_error( $terms ) && $terms ) :
      foreach ( $terms as $term ) :
        $term_link = get_term_link( $term );
        if ( is_object_in_term( get_the_ID(), $taxonomy, $term->slug ) && !is_post_type_archive( get_post_type() ) ) :
  ?>
  <li class="p-workNav__item current">
  <?php else: ?>
  <li class="p-workNav__item">
  <?php endif; ?>
    <a href="<?php echo esc_url( $term_link ); ?>">
      <?php echo esc_html( $term->name ) ?>
    </a>
  </li>
  <?php
      endforeach;
    endif;
  ?>
</ul>
