<?php

//Show homepage link on nav

function my_page_menu_args( $args ) {
        $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'my_page_menu_args' );

//Remove nav container div

function my_wp_nav_menu_args( $args = '' )
{
	$args['container'] = false;
	return $args;
} // function (why is this comment here?)

add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );

//Post thumbnails

add_theme_support( 'post-thumbnails' ); 

add_image_size( 'front-page-standard', 174, 130, 1 );
add_image_size( 'front-page-featured', 920, 476, 1 );
add_image_size( 'about-page', 334, 250, 1 );


//Fuck wordpress putting paragraph tags around images that's just shit

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

// Add editor-style.css to the visual editor

add_action( 'admin_init', 'add_my_editor_style' );

function add_my_editor_style() {
	add_editor_style();
}

add_editor_style('editor-style.css');

// Remove 'category' meta box from wp-admin post screen - because I'll misuse wordpress however I want!

function remove_category_box()
{
	remove_meta_box( 'categorydiv', 'post', 'side' );
}
add_action( 'admin_menu', 'remove_category_box' );

// Sidebar (credit: quickchic)

function quickchic_widgets_init() {
	register_sidebar(array(
		'name' => __( 'Front Page Sidebar', 'quickchic' ),
		'id' => 'sidebar-front',
		'class' => 'sidebar',
		'before_widget' => '<aside id="%1$s" class="sidebar-item widget %2$s">',
		'after_widget' => '</aside> <hr />',
		'before_title' => '<h3 class="sidebar-heading">',
		'after_title' => '</h3>',
	));
}
add_action( 'init', 'quickchic_widgets_init' );

// Change excerpt length\formatting (this functions.php was looking real clean until now)

function custom_excerpt_length( $length ) {
	return 26;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }

//Add HTML5 search form
add_theme_support('html5', array('search-form'));

//Style next\previous posts buttons
add_filter('next_posts_link_attributes', 'posts_link_attributes_next');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_prev');

function posts_link_attributes_prev() {
    return 'class="button pagination-newer"';
}
function posts_link_attributes_next() {
    return 'class="button pagination-older"';
}

//fucking wordpress can only negatively filter tags by their id
function convert_slug_to_id($slug) {
  return get_term_by( 'slug', $slug, 'post_tag', 'ARRAY_A' ) ;
}

//register menus

add_theme_support( 'menus' );
add_action( 'init', 'register_my_menus' );

function register_my_menus() {
  register_nav_menus( array(
    'Navigation' => 'Default navigation',
  ) );
}

//by default, wordprss doesn't do mobile-friendly navigations
//for some reason (credit: Dennis Winter)

class Walker_Nav_Menu_Dropdown extends Walker_Nav_Menu {
 
    function start_lvl($output, $depth) {    }
 
    function end_lvl($output, $depth) {    }
 
    function start_el($output, $item, $depth, $args) {
        // Here is where we create each option.
        $item_output = '';
 
        // add spacing to the title based on the depth
        $item->title = str_repeat("&amp;nbsp;", $depth * 4) . $item->title;
 
        // Get the attributes.. Though we likely don't need them for this...
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' value="'   . esc_attr( $item->url        ) .'"' : '';

        // Add the html
        $item_output .= '<option'. $attributes .'>';

        $item_output .= apply_filters( 'the_title_attribute', $item->title );
 
        // Add this new item to the output string.
        $output .= $item_output;
 
    }
 
    function end_el($output, $item, $depth) {
        // Close the item.
        $output .= "</option>\n";
 
    }
 
}

// Credit: eggplant studios

add_action('wp_footer', 'dropdown_menu_scripts');
function dropdown_menu_scripts() {
    ?>
        <script>
          jQuery(document).ready(function ($) {
            $("#mobile-menu").change( function() {
                    document.location.href =  $(this).val();
            });
          });
        </script>
    <?php
}

// display content type on front page by tag.

function get_media_type() {
  if (has_tag( 'editorial' ) == true ){ echo "Editorial by "; }
  elseif (has_tag( 'video' ) == true ){ echo "Video by "; }
  elseif (has_tag( 'review' ) == true ){ echo "Review by "; }
  elseif (has_tag( 'podcast' ) == true ){ echo "Podcast by "; }
  elseif (has_tag( 'comic' ) == true ){ echo "Comic by "; }
  elseif (has_tag( 'news' ) == true ){ echo "News by "; }
  else{ echo "By "; }
}

//Image caption fix
add_filter( 'img_caption_shortcode', 'wap8_img_caption', 10, 3 );
function wap8_img_caption($nowt, $attr, $content) {
  extract( shortcode_atts( array(
    'id' => '',
    'align' => 'alignnone',
    'width' => '',
    'caption' => '',
  ), $attr ) );
  if ( 1 > (int) $width || empty( $caption ) ) {
    return $content;
  }
  if ( $id )
    $id = 'id="' . esc_attr( $id ) . '" ';
  return '<div ' . $id . 'class="wp-caption ' . esc_attr( $align ) . '" style="width:' . ( (int) $width ) . 'px;">' . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}

//Image caption styling - stolen from Justin Tadlock, used totally without
//permission. It may look like this does nothing of value, but it actually stops
//Wordpress's weird behaviour when you wrap up an image in arbitrary div tags.

add_filter( 'img_caption_shortcode', 'cleaner_caption', 10, 3 );

function cleaner_caption( $output, $attr, $content ) {

  /* We're not worried abut captions in feeds, so just return the output here. */
  if ( is_feed() )
    return $output;

  /* Set up the default arguments. */
  $defaults = array(
    'id' => '',
    'align' => 'alignnone',
    'width' => '',
    'caption' => ''
  );

  /* Merge the defaults with user input. */
  $attr = shortcode_atts( $defaults, $attr );

  /* If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags. */
  if ( 1 > $attr['width'] || empty( $attr['caption'] ) )
    return $content;

  /* Set up the attributes for the caption <div>. */
  $attributes = ( !empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
  $attributes .= ' class="wp-caption ' . esc_attr( $attr['align'] ) . '"';
  $attributes .= ' style="width: ' . esc_attr( $attr['width'] ) . 'px"';

  /* Open the caption <div>. */
  $output = '<div' . $attributes .'>';

  /* Allow shortcodes for the content the caption was created for. */
  $output .= do_shortcode( $content );

  /* Append the caption text. */
  $output .= '<p class="wp-caption-text">' . $attr['caption'] . '</p>';

  /* Close the caption </div>. */
  $output .= '</div>';

  /* Return the formatted, clean caption. */
  return $output;
}

// Let contributors upload images (why is this not default?) by Dan Morgan


add_action('admin_init', 'allow_contributor_uploads');
 
function allow_contributor_uploads() {
     $contributor = get_role('contributor');
     $contributor->add_cap('upload_files');
}

// Stop wordpress from fucking with image width\height attributes (credit: chris coiyer)

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

// Stop tinyMCE screwing with our lovely <span> tags (credit: jason1111)

function override_mce_options($initArray) {
    $opts = '*[*]';
    $initArray['valid_elements'] = $opts;
    $initArray['extended_valid_elements'] = $opts;
    return $initArray;
}
add_filter('tiny_mce_before_init', 'override_mce_options');