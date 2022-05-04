<?php 

// Theme Files
function theme_files()
{

    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');

    wp_enqueue_script( 'bootstrap.js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array('jquery'), true, true);
    wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), true, true );

    wp_enqueue_style('google-fonts','//fonts.googleapis.com/css2?family=Bubblegum+Sans&family=Lato&display=swap');
}
add_action( 'wp_enqueue_scripts', 'theme_files');

function bearyBare_features() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme','bearyBare_features');

function staff_post_types() { 
    register_post_type('ceo',array (
      'supports' => array('title','editor','thumbnail','custom-fields'),
      'public' =>true,
      'show_in_rest' =>true,
      'labels' => array (
        'name' => 'Staff',
        'add_new_item' => 'Add New Staff Member',
        'edit_item' => 'Edit Staff Member',
        'all_items' => 'All Staff',
        'singular_name' => 'Staff'
      ),
      'menu_icon' =>'dashicons-id'
    ));

}
add_action('init','staff_post_types');

function theme_widgets_init() {
  register_sidebar( array(
      'name'          => __( 'Sidebar', 'theme-domain' ),
      'id'            => 'sidebar-1',
      'description'   => __( 'Widgets in this area will be shown on the front page.', 'theme-domain' ),
      'before_widget' => '<aside>',
      'after_widget'  => '</aside>',
      'before_title'  => '<h2 class="widgettitle">',
      'after_title'   => '</h2>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Blog Sidebar', 'theme-domain' ),
    'id'            => 'sidebar-2',
    'description'   => __( 'Widgets in this area will be shown on the front page.', 'theme-domain' ),
    'before_widget' => '<aside>',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
) );
}
add_action( 'widgets_init', 'theme_widgets_init' );


// bootstrap 5 wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start',
    'dropdown-menu-end',
    'dropdown-menu-sm-start',
    'dropdown-menu-sm-end',
    'dropdown-menu-md-start',
    'dropdown-menu-md-end',
    'dropdown-menu-lg-start',
    'dropdown-menu-lg-end',
    'dropdown-menu-xl-start',
    'dropdown-menu-xl-end',
    'dropdown-menu-xxl-start',
    'dropdown-menu-xxl-end'
  ];

  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $dropdown_menu_class[] = '';
    foreach($this->current_item->classes as $class) {
      if(in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent = str_repeat("\t", $depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $this->current_item = $item;

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;
    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu dropdown-menu-end';
    }

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
    $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
    $attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}
// register a new menu
register_nav_menu('main-menu', 'Main menu');

// Custom Widgets
function custom_widgets() {

  register_sidebar( array(
		'name'          => 'Footer Widgets',
		'id'            => 'footer_widgets',
		'before_widget' => '<div class="col fs-5 d-flex flex-column"><div class="footer_widget">',
		'after_widget'  => '</div></div>',
		'before_title'  => '',
		'after_title'   => '',
	) );


}
add_action( 'widgets_init', 'custom_widgets' );

?>