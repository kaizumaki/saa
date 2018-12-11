<?php
if ( is_active_sidebar( 'sidebar-1' ) ) :
?>
<aside role="complementary" class="col-12_md-3 l-sidebar">
<?php
  dynamic_sidebar( 'sidebar-1' );
?>
</aside>
<?php
endif;
?>
