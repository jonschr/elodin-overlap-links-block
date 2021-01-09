<?php

// if( function_exists('acf_add_local_field_group') ):

// acf_add_local_field_group(array(
// 	'key' => 'group_5fcbf992c1eba',
// 	'title' => 'Featured Link Block',
// 	'fields' => array(
// 		array(
// 			'key' => 'field_5fcbf99978c32',
// 			'label' => 'Section background color',
// 			'name' => 'section_background_color',
// 			'type' => 'color_picker',
// 			'instructions' => '',
// 			'required' => 0,
// 			'conditional_logic' => 0,
// 			'wrapper' => array(
// 				'width' => '',
// 				'class' => '',
// 				'id' => '',
// 			),
// 			'default_value' => '',
// 		),
// 		array(
// 			'key' => 'field_5fcbfa791310d',
// 			'label' => 'Number of columns',
// 			'name' => 'columns',
// 			'type' => 'number',
// 			'instructions' => '',
// 			'required' => 0,
// 			'conditional_logic' => 0,
// 			'wrapper' => array(
// 				'width' => '',
// 				'class' => '',
// 				'id' => '',
// 			),
// 			'default_value' => '',
// 			'placeholder' => '',
// 			'prepend' => '',
// 			'append' => '',
// 			'min' => 1,
// 			'max' => 6,
// 			'step' => '',
// 		),
// 		array(
// 			'key' => 'field_5fcd4ee9e95f1',
// 			'label' => 'Background height',
// 			'name' => 'height',
// 			'type' => 'number',
// 			'instructions' => 'Minimum height in pixels (on desktop)',
// 			'required' => 0,
// 			'conditional_logic' => 0,
// 			'wrapper' => array(
// 				'width' => '',
// 				'class' => '',
// 				'id' => '',
// 			),
// 			'default_value' => '',
// 			'placeholder' => '',
// 			'prepend' => '',
// 			'append' => 'px',
// 			'min' => 200,
// 			'max' => '',
// 			'step' => '',
// 		),
// 		array(
// 			'key' => 'field_5fcbf9b278c33',
// 			'label' => 'Links',
// 			'name' => 'links',
// 			'type' => 'repeater',
// 			'instructions' => '',
// 			'required' => 0,
// 			'conditional_logic' => 0,
// 			'wrapper' => array(
// 				'width' => '',
// 				'class' => '',
// 				'id' => '',
// 			),
// 			'collapsed' => 'field_5fcbfa4c1310a',
// 			'min' => 1,
// 			'max' => 0,
// 			'layout' => 'block',
// 			'button_label' => 'Add featured link',
// 			'sub_fields' => array(
// 				array(
// 					'key' => 'field_5fcbf9c078c34',
// 					'label' => 'URL',
// 					'name' => 'url',
// 					'type' => 'link',
// 					'instructions' => '',
// 					'required' => 0,
// 					'conditional_logic' => 0,
// 					'wrapper' => array(
// 						'width' => '',
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'return_format' => 'url',
// 				),
// 				array(
// 					'key' => 'field_5fcbf9c778c35',
// 					'label' => 'Button label',
// 					'name' => 'button_label',
// 					'type' => 'text',
// 					'instructions' => '',
// 					'required' => 0,
// 					'conditional_logic' => array(
// 						array(
// 							array(
// 								'field' => 'field_5fcbf9c078c34',
// 								'operator' => '!=empty',
// 							),
// 						),
// 					),
// 					'wrapper' => array(
// 						'width' => '',
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'default_value' => '',
// 					'placeholder' => '',
// 					'prepend' => '',
// 					'append' => '',
// 					'maxlength' => '',
// 				),
// 				array(
// 					'key' => 'field_5fcbf9f378c38',
// 					'label' => 'Link target',
// 					'name' => 'link_target',
// 					'type' => 'button_group',
// 					'instructions' => '',
// 					'required' => 0,
// 					'conditional_logic' => array(
// 						array(
// 							array(
// 								'field' => 'field_5fcbf9c078c34',
// 								'operator' => '!=empty',
// 							),
// 						),
// 					),
// 					'wrapper' => array(
// 						'width' => '',
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'choices' => array(
// 						'_self' => 'Same tab',
// 						'_blank' => 'New tab',
// 					),
// 					'allow_null' => 0,
// 					'default_value' => '',
// 					'layout' => 'horizontal',
// 					'return_format' => 'value',
// 				),
// 				array(
// 					'key' => 'field_5fcbfa4c1310a',
// 					'label' => 'Background image',
// 					'name' => 'background_image',
// 					'type' => 'image',
// 					'instructions' => '',
// 					'required' => 0,
// 					'conditional_logic' => 0,
// 					'wrapper' => array(
// 						'width' => '',
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'return_format' => 'array',
// 					'preview_size' => 'medium',
// 					'library' => 'all',
// 					'min_width' => '',
// 					'min_height' => '',
// 					'min_size' => '',
// 					'max_width' => '',
// 					'max_height' => '',
// 					'max_size' => '',
// 					'mime_types' => '',
// 				),
// 				array(
// 					'key' => 'field_5fcbf9ce78c36',
// 					'label' => 'Heading (optional)',
// 					'name' => 'heading',
// 					'type' => 'text',
// 					'instructions' => '',
// 					'required' => 0,
// 					'conditional_logic' => 0,
// 					'wrapper' => array(
// 						'width' => '',
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'default_value' => '',
// 					'placeholder' => '',
// 					'prepend' => '',
// 					'append' => '',
// 					'maxlength' => '',
// 				),
// 				array(
// 					'key' => 'field_5fcbf9d278c37',
// 					'label' => 'Description (optional)',
// 					'name' => 'description',
// 					'type' => 'textarea',
// 					'instructions' => '',
// 					'required' => 0,
// 					'conditional_logic' => 0,
// 					'wrapper' => array(
// 						'width' => '',
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'default_value' => '',
// 					'placeholder' => '',
// 					'maxlength' => '',
// 					'rows' => '',
// 					'new_lines' => '',
// 				),
// 			),
// 		),
// 	),
// 	'location' => array(
// 		array(
// 			array(
// 				'param' => 'block',
// 				'operator' => '==',
// 				'value' => 'acf/featured-links',
// 			),
// 		),
// 	),
// 	'menu_order' => 0,
// 	'position' => 'normal',
// 	'style' => 'default',
// 	'label_placement' => 'top',
// 	'instruction_placement' => 'label',
// 	'hide_on_screen' => '',
// 	'active' => true,
// 	'description' => '',
// ));

// endif;