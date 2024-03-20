<?php
$show_header_ribbon = carbon_get_theme_option( 'show_header_ribbon' );
?>

<header class="site-header">
	<nav>
		<?php
		if ( $show_header_ribbon ) :
			$header_ribbon            = carbon_get_theme_option( 'header_ribbon' );
			$header_ribbon_text_color = carbon_get_theme_option( 'header_ribbon_text_color' ) ? carbon_get_theme_option( 'header_ribbon_text_color' ) : '#000';
			$header_ribbon_bg_color   = carbon_get_theme_option( 'header_ribbon_bg_color' ) ? carbon_get_theme_option( 'header_ribbon_bg_color' ) : 'transparent';
			?>
			<div class="header-top" style="color: <?php echo esc_attr( $header_ribbon_text_color ); ?>; background: <?php echo esc_attr( $header_ribbon_bg_color ); ?>">
				<?php echo wp_kses_post( $header_ribbon ); ?>
			</div>
		<?php endif; ?>
		<div class="header-bottom">A nice header here</div>
	</nav>
</header>
