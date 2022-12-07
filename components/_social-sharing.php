<div class="social-sharing">
  <!-- Sharingbutton LinkedIn -->
  <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode_deep( get_permalink() ); ?>" target="_blank" rel="noopener" aria-label="Share on LinkedIn">
    <span class="fab fa-linkedin" title="Share Via LinkedIn"></span>
  </a>
  
  <!-- Sharingbutton E-Mail -->
  <a href="mailto:?subject=Recent%20Articl%20&amp;body=<?php echo get_permalink(); ?>" target="_self" rel="noopener" aria-label="Share by E-Mail">
    <span class="fas fa-envelope" title="Share Via Email"></span>
  </a>
  
  <!-- Sharingbutton Twitter -->
  <a href="https://twitter.com/intent/tweet/?text=<?php echo urlencode_deep( get_the_title() ); ?>&amp;url=<?php echo urlencode_deep( get_permalink() ); ?>" target="_blank" rel="noopener" aria-label="Share on Twitter">
    <span class="fab fa-twitter" title="Share Via Twitter"></span>
  </a>
  
  <!-- Sharingbutton Facebook -->
  <a href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode_deep( get_permalink() ); ?>" target="_blank" rel="noopener" aria-label="Share on Facebook">
    <span class="fab fa-facebook" title="Share Via Facebook"></span>
  </a>
</div>