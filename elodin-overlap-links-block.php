<?php
/*
	Plugin Name: Elodin Block: Overlap Links
	Plugin URI: https://github.com/jonschr/elodin-featured-links-block
    Description: Just another overlap links block
	Version: 1.0.0
    Author: Jon Schroeder
    Author URI: https://elod.in

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
*/

/* Prevent direct access to the plugin */
if ( !defined( 'ABSPATH' ) ) {
    die( "Sorry, you are not allowed to access this page directly." );
}

// Plugin directory
define( 'ELODIN_OVERLAP_LINKS', dirname( __FILE__ ) );

// Define the version of the plugin
define ( 'ELODIN_OVERLAP_LINKS_VERSION', '1.0.0' );

require_once( 'acf-json/fields.php' );

add_action('acf/init', 'elodin_overlap_links_block_register_block');
function elodin_overlap_links_block_register_block() {

    // Check function exists.
    if( function_exists( 'acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'overlap-links',
            'title'             => __('Overlap Links'),
            'description'       => __('A multicolumn block to feature several links'),
            'render_callback'   => 'elodin_overlap_links_render',
            'enqueue_assets'    => 'elodin_overlap_links_enqueue',
            'category'          => 'formatting',
            'icon'              => 'grid-view',
            'keywords'          => array( 'section', 'container', 'overlap', 'links', 'featured', 'columns' ),
            'mode'              => 'preview',
            'align'              => 'normal',
            'supports'          => array(
                'align' => array( 'full', 'wide', 'normal' ),
                'mode' => false,
                'jsx' => true
            ),
        ));
    }
}

function elodin_overlap_links_render( $block, $content = '', $is_preview = false, $post_id = 0 ) {
    
    //* Default class
    $className = 'elodin-overlap-links';
    
    //* Default ID
    $id = 'overlap-links-' . $block['id'];
    
    //* Set defaults
    $style = null;
    $columns = count( get_field( 'links' ) );
        
    //* Get settings
    $section_background_color = get_field( 'section_background_color' );
    $countitems = get_field( 'columns' );
    $links = get_field( 'links' );
    $height = get_field( 'height' );
    
    // Create id attribute allowing for custom "anchor" value.
    if( isset($block['anchor']) ) 
        $id = $block['anchor'];

    // Create class attribute allowing for custom "className" and "align" values.
    if( isset($block['className']) )
        $className .= ' ' . $block['className'];

    if( isset($block['align']) )
        $className .= ' align' . $block['align'];
        
    if ( isset($columns) ) {
        $className .= ' columns-' . $columns;
    } else {
        $className .= ' columns-' . $countitems;
    }
                        
    //* color matching for background colors
    $colors = current( (array) get_theme_support( 'editor-color-palette' ) );
    if ( $colors ) {
        foreach( $colors as $color ) {
            if ( in_array( $section_background_color, $color ) ) {
                $className .= ' has-' . $color['slug'] . '-background-color';
                $section_background_color = null;
            }            
        }
    }
    
    if ( $section_background_color )
        $style = sprintf( 'background-color:%s;', $section_background_color );
            
    // echo '<pre>';
    // print_r( $links );
    // echo '</pre>';
        
    //* Render
    printf( '<div id="%s" class="%s" style="%s">', $id, $className, $style );
        
        echo '<div class="overlap-links-container">';
    
            foreach ( $links as $link ) {
                
                // echo '<pre>';
                // print_r( $link );
                // echo '</pre>';
                            
                $url = $link['url'];
                $link_target = $link['link_target'];
                $button_label = $link['button_label'];
                $heading = $link['heading'];
                $description = apply_filters( 'the_content', $link['description'] );
                
                if ( !$button_label )
                    $button_label = 'More information';
                
                $background_image = $link['background_image']['sizes']['large'];
                // $background_image_url = wp_get_attachment_image_src( $background_image_id, 'large' );
                            
                echo '<div class="overlap-link">';
                
                    if ( $heading )
                        printf( '<h3>%s</h3>', $heading );
                        
                    if ( $background_image )
                        printf( '<div class="background-image" style="background-image:url(%s);"></div>', $background_image );
                        
                    if ( $description )
                        printf( '<div class="description">%s</div>', $description );
                        
                    if ( $url )
                        printf( '<div class="buttons-wrap"><a href="%s" target="%s" class="button">%s</a></div>', $url, $link_target, $button_label );
                                                
                echo '</div>'; // .overlap-link
            }
            
        echo '</div>';
        
        if ( isset( $height ) ) {
            ?>
            <style>
                #overlap-links-<?php echo $block['id']; ?> .background-image {
                    height: <?php echo $height; ?>px;
                }
            </style>
            <?php
        }
                                
    echo '</div>';
   
}

function elodin_overlap_links_enqueue() {
    wp_enqueue_style( 'overlap-links-block-style', plugin_dir_url( __FILE__ ) . 'css/overlap-links.css', array(), ELODIN_OVERLAP_LINKS_VERSION, 'screen' );
    wp_enqueue_script( 'make-it-overlap', plugin_dir_url( __FILE__ ) . 'js/overlap.js', array( 'jquery' ), ELODIN_OVERLAP_LINKS_VERSION );
}

function elodin_overlap_links_block_get_the_colors_formatted_for_acf() {
	
	// get the colors
    $color_palette = current( (array) get_theme_support( 'editor-color-palette' ) );

	// bail if there aren't any colors found
	if ( !$color_palette )
		return;

	// output begins
	ob_start();

	// output the names in a string
	echo '[';
		foreach ( $color_palette as $color ) {
			echo "'" . $color['color'] . "', ";
		}
	echo ']';
    
    return ob_get_clean();

}

add_action( 'acf/input/admin_footer', 'elodin_overlap_links_block_register_acf_color_palette' );
function elodin_overlap_links_block_register_acf_color_palette() {

    $color_palette = elodin_overlap_links_block_get_the_colors_formatted_for_acf();
    if ( !$color_palette )
        return;
    
    ?>
    <script type="text/javascript">
        (function( $ ) {
            acf.add_filter( 'color_picker_args', function( args, $field ){

                // add the hexadecimal codes here for the colors you want to appear as swatches
                args.palettes = <?php echo $color_palette; ?>

                // return colors
                return args;

            });
        })(jQuery);
    </script>
    <?php

}

// Updater
require 'vendor/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/jonschr/elodin-overlap-links-block',
	__FILE__,
	'elodin-overlap-links-block'
);

// Optional: Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');