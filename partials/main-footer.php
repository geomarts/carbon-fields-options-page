<?php
$footer_text       = carbon_get_theme_option( 'footer_text' );
$footer_text_color = carbon_get_theme_option( 'footer_text_color' ) ? carbon_get_theme_option( 'footer_text_color' ) : '#000';
$footer_bg_color   = carbon_get_theme_option( 'footer_bg_color' ) ? carbon_get_theme_option( 'footer_bg_color' ) : 'transparent';
?>

<footer class="site-footer" style="color: <?php echo esc_attr( $footer_text_color ); ?>; background: <?php echo esc_attr( $footer_bg_color ); ?>">
	<div class="container">
		<?php echo wp_kses_post( $footer_text ); ?>
	</div>
</footer>
