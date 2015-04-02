<?php if ( post_password_required() ): ?>
    <form class="password-protected" action="<?php bloginfo('url'); ?>/wp-login.php?action=postpass" method="post">
	    <p>This page is password protected. Please enter your password below:</p>
	    <p><input name="post_password" id="" type="password" size="20" /><input type="submit" name="Submit" value="Submit" /></p>
    </form>
<?php endif; ?>