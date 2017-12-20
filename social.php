
	<div id="social-icons" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<?php 
	$social_icon_path = get_template_directory_uri() . '/images/social/' . get_theme_mod('iconset');
	if (get_theme_mod('social') == 1) {
			 if (get_theme_mod('facebook')) { ?>
	 <a target="_blank" href="<?php echo get_theme_mod('facebook'); ?>" title="Facebook" ><img src="<?php echo 
	$social_icon_path .'/facebook.png'; ?>"></a>
<?php } ?>
		<?php if (get_theme_mod('twitter')) { ?>
	 <a target="_blank" href="<?php echo get_theme_mod('twitter'); ?>" title="Twitter" ><img src="<?php echo $social_icon_path . "/twitter.png"; ?>"></a>
<?php } ?>
	<?php if (get_theme_mod('google')) { ?>
	 <a target="_blank" href="<?php echo get_theme_mod('google'); ?>" title="Google" ><img src="<?php echo $social_icon_path . "/google.png"; ?>"></a>
<?php } ?>
	<?php if (get_theme_mod('instagram')) { ?>
	 <a target="_blank" href="<?php echo get_theme_mod('instagram'); ?>" title="Instagram" ><img src="<?php echo $social_icon_path . "/instagram.png"; ?>"></a>
<?php } ?>
	<?php if (get_theme_mod('youtube')) { ?>
	 <a target="_blank" href="<?php echo get_theme_mod('youtube'); ?>" title="Youtube" ><img src="<?php echo $social_icon_path . "/youtube.png"; ?>"></a>
<?php } ?>
	<?php if (get_theme_mod('pinterest')) { ?>
	 <a target="_blank" href="<?php echo get_theme_mod('pinterest'); ?>" title="Pinterest" ><img src="<?php echo $social_icon_path . "/pinterest.png"; ?>"></a>
<?php } ?>
	<?php if (get_theme_mod('rss')) { ?>
	 <a target="_blank" href="<?php echo get_theme_mod('rss'); ?>" title="Rss" ><img src="<?php echo $social_icon_path . "/rss.png"; ?>"></a>
<?php } ?>
	<?php if (get_theme_mod('mail')) { ?>
	 <a target="_blank" href="<?php echo get_theme_mod('mail'); ?>" title="Mail" ><img src="<?php echo $social_icon_path . "/mail.png"; ?>"></a>
<?php } ?>
	<?php if (get_theme_mod('vimeo')) { ?>
	 <a target="_blank" href="<?php echo get_theme_mod('vimeo'); ?>" title="Vimeo" ><img src="<?php echo $social_icon_path . "/vimeo.png"; ?>"></a>
<?php } 
	}
?>

	</div>