  <footer role="contentinfo" class="l-globalFooter">
    <div class="l-row--footer">
      <div class="l-container">
<?php
$args = array(
    'theme_location'  => 'footer',
    'menu_class'      => 'grid-center p-globalNav'
);
wp_nav_menu( $args );
?>
        <ul class="grid-center">
          <li><a href="https://www.facebook.com/SalixAssociatesArchitects/" target="_blank" class="u-white"><i class="genericon genericon-facebook"></i></a></li>
        </ul>
        <div class="u-alignCenter">
          <small>&copy;Salix &amp; Associates, Architects</small>
        </div>
      </div>
    </div>
  </footer>
<?php wp_footer(); ?>
</body>
</html>
