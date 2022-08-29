<?php if (!defined('ABSPATH')) exit; ?>
<form method="get" class="searchform" id="searchform" action="<?php bloginfo('url'); ?>/" role="search">
  <input type="text" placeholder="Search" name="s" id="s" class="search-input"/>
  <input type="submit" id="searchsubmit" value="Search" />
  <div id="search-close" title="close search"><span class="fas fa-times"></span></div>
</form>
