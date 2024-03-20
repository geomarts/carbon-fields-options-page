<?php
get_header();

$address         = carbon_get_theme_option( 'address' );
$directions      = carbon_get_theme_option( 'address_directions' );
$phone           = carbon_get_theme_option( 'phone' );
$email           = carbon_get_theme_option( 'email' );
$newsletter_form = carbon_get_theme_option( 'newsletter_form' );
$socials         = carbon_get_theme_option( 'socials' );
?>

<main class="site-main">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="container">
					<address>
						<?php echo wp_kses_post( $address ); ?>
						<a href="<?php echo esc_url( $directions ); ?>" target="_blank">
							<?php esc_html_e( 'See Map', 'playground' ); ?>
						</a>
						<a href="<?php echo esc_url( 'tel:' . $phone ); ?>">
							<?php echo esc_html( $phone ); ?>
						</a>
						<a href="<?php echo esc_url( 'mailto:' . $email ); ?>">
							<?php echo esc_html( $email ); ?>
						</a>
					</address>
					<div>
						<?php echo do_shortcode( '[contact-form-7 id="' . esc_attr( $newsletter_form ) . '"]' ); ?>
					</div>

					<ul>
						<?php
						foreach ( $socials as $social ) :
							//https://github.com/WordPress/WordPress-Coding-Standards/issues/1029
							/* translators: %s: social channel */
							$title = sprintf( __( 'Find us on %s', 'playground' ), $social['social_title'] );
							?>
							<li>
								<a href="<?php echo esc_url( $social['social_url'] ); ?>" aria-label="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" target="_blank">
									<i class="<?php echo esc_attr( $social['social_icon'] ); ?>" aria-hidden="true"></i>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>

				</div>
			</article>
			<?php
		endwhile;
	endif;
	?>
</main>

<?php
get_footer();
