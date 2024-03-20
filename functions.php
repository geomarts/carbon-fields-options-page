<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

function crb_attach_theme_options() {
	Container::make( 'theme_options', __( 'Theme Settings', 'playground' ) )
	->set_page_menu_position( 4 )
	->set_icon( 'dashicons-admin-settings' )
	->add_tab(
		__( 'Header', 'playground' ),
		array(
			Field::make( 'header_scripts', 'header_scripts', __( 'Header Scripts', 'playground' ) ),
			Field::make( 'rich_text', 'header_ribbon', __( 'Ribbon', 'playground' ) )
			->set_conditional_logic(
				array(
					array(
						'field' => 'show_header_ribbon',
						'value' => true,
					),
				)
			),
			Field::make( 'color', 'header_ribbon_text_color', __( 'Ribbon Text Color', 'playground' ) )
			->set_conditional_logic(
				array(
					array(
						'field' => 'show_header_ribbon',
						'value' => true,
					),
				)
			),
			Field::make( 'color', 'header_ribbon_bg_color', __( 'Ribbon Background Color', 'playground' ) )
			->set_conditional_logic(
				array(
					array(
						'field' => 'show_header_ribbon',
						'value' => true,
					),
				)
			),
			Field::make( 'checkbox', 'show_header_ribbon', __( 'Show Ribbon (Top Header)?', 'playground' ) )->set_option_value( 'yes' ),
		)
	)
	->add_tab(
		__( 'Contact', 'playground' ),
		array(
			Field::make( 'textarea', 'address', __( 'Address', 'playground' ) ),
			Field::make( 'text', 'address_directions', __( 'Address Directions', 'playground' ) )->set_attribute( 'type', 'url' ),
			Field::make( 'text', 'phone', __( 'Phone', 'playground' ) )->set_attribute( 'type', 'tel' ),
			Field::make( 'text', 'email', __( 'Email', 'playground' ) )->set_attribute( 'type', 'email' ),
			Field::make( 'select', 'newsletter_form', __( 'Select Newsletter Form', 'playground' ) )
			->add_options( 'get_all_forms' ), // or set
		)
	)
	->add_tab(
		__( 'Socials', 'playground' ),
		array(
			Field::make( 'complex', 'socials' )
			->set_layout( 'tabbed-horizontal' )
			->add_fields(
				array(
					Field::make( 'text', 'social_title', __( 'Social Title', 'playground' ) ),
					Field::make( 'text', 'social_url', __( 'Social URL', 'playground' ) )->set_attribute( 'type', 'url' ),
					Field::make( 'text', 'social_icon', __( 'Social Icon', 'playground' ) )
					->set_attribute( 'placeholder', 'Add a class from the Font Awesome library' ),
				)
			),
		)
	)
	->add_tab(
		__( 'Footer', 'playground' ),
		array(
			Field::make( 'rich_text', 'footer_text', __( 'Footer Text', 'playground' ) ),
			Field::make( 'color', 'footer_text_color', __( 'Footer Text Color', 'playground' ) ),
			Field::make( 'color', 'footer_bg_color', __( 'Footer Background Color', 'playground' ) ),
		)
	);
}

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );

function crb_load() {
	require_once( 'vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();
}
add_action( 'after_setup_theme', 'crb_load' );

function get_all_forms() {
	$all_forms_array = array();
	$all_forms       = get_posts(
		array(
			'post_type'      => 'wpcf7_contact_form',
			'posts_per_page' => -1,
		)
	);

	foreach ( $all_forms as $form ) :
		$all_forms_array[ $form->ID ] = esc_html( $form->post_title );
	endforeach;
	return $all_forms_array;
}
