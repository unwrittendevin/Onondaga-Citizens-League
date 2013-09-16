<?php



// Homepage Options Dashboard Menu
//$file_url = get_bloginfo('template_directory').'/library/images/custom-post-icon.png';
function home_page_menu() {
  add_menu_page( 'Site Options', 'Site Options', 'edit_posts', 'home-menu', null, '', 32 );
}

add_action('admin_menu', 'home_page_menu');

// Custom Post Types
add_action( 'init', 'create_new_slides' );
function create_new_slides() {
	// Add Student Types
	$labels = array(
		'name' => 'Slides',
		 'singular_name' => 'Slide',
		 'menu_name' => 'Slides',
		 'add_new' => 'Add Slide',
		 'add_new_item' => 'Add New Slide',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Slide',
		 'new_item' => 'New Slide',
		 'view' => 'View Slide',
		 'view_item' => 'View Slide',
		 'search_items' => 'Search Slides',
		 'not_found' => 'No Slides Found',
		 'not_found_in_trash' => 'No Slides Found in Trash',
		 'parent' => 'Parent Slide'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new slides for OCL. These are displayed on the homepage',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'slide'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 1,
		'show_in_menu' => 'home-menu',
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title'),
	);
	register_post_type('slide', $args);
};
function set_slide_columns($columns) {
    return array(
        'cb' => '<input type="checkbox" />',
        'title' => __('Title'),
        'date' => __('Date'),
        'author' => __('Author'),
		'column_1' => __('Slide Image'),
        'column_2' => __('Slide URL'),
    );
}
// POPULATE CUSTOM COLUMNS ON CUSTOM POST
add_action('manage_slide_posts_custom_column', 'add_new_slide_cols', 10, 2);
	function add_new_slide_cols($column, $post_id){
	global $post;
	switch ($column){
	case 'column_1':
	$column_1_content = the_field('slide_image');
	echo $column_1_content;
	case 'column_2':
	$column_2_content = the_field('slide_url');
	echo $column_2_content;
	default:
	break;
	}
}
add_filter('manage_slide_posts_columns' , 'set_slide_columns');
// New Modules For Site
add_action( 'init', 'create_new_modules' );
function create_new_modules() {
	// Add Modules
	$labels = array(
		'name' => 'Modules',
		 'singular_name' => 'Module',
		 'menu_name' => 'Modules',
		 'add_new' => 'Add Module',
		 'add_new_item' => 'Add New Module',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Module',
		 'new_item' => 'New Module',
		 'view' => 'View Module',
		 'view_item' => 'View Module',
		 'search_items' => 'Search Modules',
		 'not_found' => 'No Modules Found',
		 'not_found_in_trash' => 'No Modules Found in Trash',
		 'parent' => 'Parent Module'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new modules for OCL. These can be content blocks for the homepage',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'module'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 2,
		'show_in_menu' => 'home-menu',
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title', 'editor', 'thumbnail'),
	);
	register_post_type('module', $args);
};
// New Stories For Site
add_action( 'init', 'create_new_study' );
function create_new_study() {
	// Add Modules
	$labels = array(
		'name' => 'Studies',
		 'singular_name' => 'Study',
		 'menu_name' => 'Studies',
		 'add_new' => 'Add Study',
		 'add_new_item' => 'Add New Study',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Study',
		 'new_item' => 'New Study',
		 'view' => 'View Study',
		 'view_item' => 'View Study',
		 'search_items' => 'Search Studies',
		 'not_found' => 'No Studies Found',
		 'not_found_in_trash' => 'No Studies Found in Trash',
		 'parent' => 'Parent Study'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new studies for OCL.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => '/studies'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 33,
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title'),
	);
	register_post_type('study', $args);
};
function create_study_years()  {

	$labels = array(
		'name'                       => _x( 'Study Years', 'Taxonomy General Name', 'ocl-theme' ),
		'singular_name'              => _x( 'Study Year', 'Taxonomy Singular Name', 'ocl-theme' ),
		'menu_name'                  => __( 'Study Years', 'ocl-theme' ),
		'all_items'                  => __( 'All Study Years', 'ocl-theme' ),
		'parent_item'                => __( 'Parent Study Year', 'ocl-theme' ),
		'parent_item_colon'          => __( 'Parent Study Year:', 'ocl-theme' ),
		'new_item_name'              => __( 'New Study Year', 'ocl-theme' ),
		'add_new_item'               => __( 'Add New Study Year', 'ocl-theme' ),
		'edit_item'                  => __( 'Edit Study Year', 'ocl-theme' ),
		'update_item'                => __( 'Update Study Year', 'ocl-theme' ),
		'separate_items_with_commas' => __( 'Separate study years with commas', 'ocl-theme' ),
		'search_items'               => __( 'Search Study Years', 'ocl-theme' ),
		'add_or_remove_items'        => __( 'Add or Remove Study Year', 'ocl-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used study years', 'ocl-theme' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'study-year', 'study', $args );
}
// Hook into the 'init' action
add_action( 'init', 'create_study_years', 0 );

// Register Custom Taxonomy
// Add Content Tagging
function add_study_tags()  {

	$labels = array(
		'name'                       => _x( 'Study Keywords', 'Taxonomy General Name', 'ocl-theme' ),
		'singular_name'              => _x( 'Study Keyword', 'Taxonomy Singular Name', 'ocl-theme' ),
		'menu_name'                  => __( 'Study Keyword', 'ocl-theme' ),
		'all_items'                  => __( 'All Study Keywords', 'ocl-theme' ),
		'parent_item'                => __( 'Parent Study Keyword', 'ocl-theme' ),
		'parent_item_colon'          => __( 'Parent Study Keyword:', 'ocl-theme' ),
		'new_item_name'              => __( 'New Study Keyword', 'ocl-theme' ),
		'add_new_item'               => __( 'Add New Study Keyword', 'ocl-theme' ),
		'edit_item'                  => __( 'Edit Study Keyword', 'ocl-theme' ),
		'update_item'                => __( 'Update Study Keyword', 'ocl-theme' ),
		'separate_items_with_commas' => __( 'Separate study keywords with commas', 'ocl-theme' ),
		'search_items'               => __( 'Search Study Keywords', 'ocl-theme' ),
		'add_or_remove_items'        => __( 'Add or Remove Study Keywords', 'ocl-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used Study Keywords', 'ocl-theme' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'study_tags', 'study', $args );

}

// Hook into the 'init' action
add_action( 'init', 'add_study_tags', 0 );
// New Did You Knows For Site
add_action( 'init', 'create_new_quotes' );
function create_new_quotes() {
	// Add Modules
	$labels = array(
		'name' => 'Quotes',
		 'singular_name' => 'Quote',
		 'menu_name' => 'Quote',
		 'add_new' => 'Add Quote',
		 'add_new_item' => 'Add New Quote',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Quote',
		 'new_item' => 'New Quote',
		 'view' => 'View Quote',
		 'view_item' => 'View Quote',
		 'search_items' => 'Search Quotes',
		 'not_found' => 'No Quotes Found',
		 'not_found_in_trash' => 'No Quotes Found in Trash',
		 'parent' => 'Parent Quote'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new quote feature items for OCL. These are displayed on the homepage',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		//'rewrite' => array('slug' => 'quote'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 3,
		'show_in_menu' => 'home-menu',
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title'),
	);
	register_post_type('quote', $args);
};
// FAQs
add_action( 'init', 'create_new_faq' );
function create_new_faq() {
	// Add Student Types
	$labels = array(
		'name' => 'FAQs',
		 'singular_name' => 'FAQ',
		 'menu_name' => 'FAQs',
		 'add_new' => 'Add FAQ',
		 'add_new_item' => 'Add New FAQ',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit FAQ',
		 'new_item' => 'New FAQ',
		 'view' => 'View FAQ',
		 'view_item' => 'View FAQ',
		 'search_items' => 'Search FAQs',
		 'not_found' => 'No FAQs Found',
		 'not_found_in_trash' => 'No FAQs Found in Trash',
		 'parent' => 'Parent FAQ'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new FAQ items for ocl-theme.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'faq'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 34,
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title', 'editor'),
	);
	register_post_type('faq', $args);
};
// Register Custom Taxonomy
function faq_directory()  {
	$labels = array(
		'name'                       => _x( 'FAQ Sections', 'Taxonomy General Name', 'ocl-theme' ),
		'singular_name'              => _x( 'FAQ Section', 'Taxonomy Singular Name', 'ocl-theme' ),
		'menu_name'                  => __( 'FAQ Sections', 'ocl-theme' ),
		'all_items'                  => __( 'All FAQ Sections', 'ocl-theme' ),
		'parent_item'                => __( 'Parent FAQ Section', 'ocl-theme' ),
		'parent_item_colon'          => __( 'Parent FAQ Section:', 'ocl-theme' ),
		'new_item_name'              => __( 'New FAQ Section Name', 'ocl-theme' ),
		'add_new_item'               => __( 'Add New FAQ Section', 'ocl-theme' ),
		'edit_item'                  => __( 'Edit FAQ Section', 'ocl-theme' ),
		'update_item'                => __( 'Update FAQ Section', 'ocl-theme' ),
		'separate_items_with_commas' => __( 'Separate FAQ Sections with commas', 'ocl-theme' ),
		'search_items'               => __( 'Search FAQ Sections', 'ocl-theme' ),
		'add_or_remove_items'        => __( 'Add or remove FAQ Section', 'ocl-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used FAQ Section', 'ocl-theme' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	register_taxonomy( 'faq-sections', 'faq', $args );
}

// Hook into the 'init' action
add_action( 'init', 'faq_directory', 0 );

// FAQs
add_action( 'init', 'create_new_courses' );
function create_new_courses() {
	// Add Student Types
	$labels = array(
		'name' => 'Courses',
		 'singular_name' => 'Course',
		 'menu_name' => 'Courses',
		 'add_new' => 'Add Course',
		 'add_new_item' => 'Add New Course',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Course',
		 'new_item' => 'New Course',
		 'view' => 'View Course',
		 'view_item' => 'View Course',
		 'search_items' => 'Search Courses',
		 'not_found' => 'No Courses Found',
		 'not_found_in_trash' => 'No Courses Found in Trash',
		 'parent' => 'Parent Course'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new Courses listings for ocl-theme.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		//'rewrite' => array('slug' => 'courses'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 35,
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title', 'editor'),
	);
	register_post_type('courses', $args);
};
// Register Custom Taxonomy
function course_subjects()  {
	$labels = array(
		'name'                       => _x( 'Subject Sections', 'Taxonomy General Name', 'ocl-theme' ),
		'singular_name'              => _x( 'Subject Section', 'Taxonomy Singular Name', 'ocl-theme' ),
		'menu_name'                  => __( 'Subject Sections', 'ocl-theme' ),
		'all_items'                  => __( 'All Subject Sections', 'ocl-theme' ),
		'parent_item'                => __( 'Parent Subject Section', 'ocl-theme' ),
		'parent_item_colon'          => __( 'Parent Subject Section:', 'ocl-theme' ),
		'new_item_name'              => __( 'New Subject Section Name', 'ocl-theme' ),
		'add_new_item'               => __( 'Add New Subject Section', 'ocl-theme' ),
		'edit_item'                  => __( 'Edit Subject Section', 'ocl-theme' ),
		'update_item'                => __( 'Update Subject Section', 'ocl-theme' ),
		'separate_items_with_commas' => __( 'Separate Subject Sections with commas', 'ocl-theme' ),
		'search_items'               => __( 'Search Subject Sections', 'ocl-theme' ),
		'add_or_remove_items'        => __( 'Add or remove Subject Section', 'ocl-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used Subject Section', 'ocl-theme' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	register_taxonomy( 'subjects', 'courses', $args );
}

// Hook into the 'init' action
add_action( 'init', 'course_subjects', 0 );

//
add_action( 'init', 'create_new_staff' );
function create_new_staff() {
	// Add Student Types
	$labels = array(
		'name' => 'Staff',
		 'singular_name' => 'Staff',
		 'menu_name' => 'Staff',
		 'add_new' => 'Add Staff',
		 'add_new_item' => 'Add New Staff Member',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Staff Member',
		 'new_item' => 'New Staff Member',
		 'view' => 'View Staff Member',
		 'view_item' => 'View Staff Member',
		 'search_items' => 'Search Staff Members',
		 'not_found' => 'No Staff Members Found',
		 'not_found_in_trash' => 'No Staff Members Found in Trash',
		 'parent' => 'Parent Staff'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new Staff Members for ocl-theme.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'about-us/staff'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 35,
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title'),
	);
	register_post_type('staff', $args);
};

//Media Gallery Custom Tax
// Register Custom Taxonomy
function media_directory()  {
	$labels = array(
		'name'                       => _x( 'Media Types', 'Taxonomy General Name', 'ocl-theme' ),
		'singular_name'              => _x( 'Media Type', 'Taxonomy Singular Name', 'ocl-theme' ),
		'menu_name'                  => __( 'Media Types', 'ocl-theme' ),
		'all_items'                  => __( 'All Media Types', 'ocl-theme' ),
		'parent_item'                => __( 'Parent Media Type', 'ocl-theme' ),
		'parent_item_colon'          => __( 'Parent Media Type:', 'ocl-theme' ),
		'new_item_name'              => __( 'New Media Type Name', 'ocl-theme' ),
		'add_new_item'               => __( 'Add New Media Type', 'ocl-theme' ),
		'edit_item'                  => __( 'Edit Media Type', 'ocl-theme' ),
		'update_item'                => __( 'Update Media Type', 'ocl-theme' ),
		'separate_items_with_commas' => __( 'Separate media types with commas', 'ocl-theme' ),
		'search_items'               => __( 'Search Media Types', 'ocl-theme' ),
		'add_or_remove_items'        => __( 'Add or remove media types', 'ocl-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used media types', 'ocl-theme' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	register_taxonomy( 'types', 'attachment', $args );
}

// Hook into the 'init' action
add_action( 'init', 'media_directory', 0 );

// Register Custom Taxonomy
function create_staff_roles()  {

	$labels = array(
		'name'                       => _x( 'Staff Roles', 'Taxonomy General Name', 'ocl-theme' ),
		'singular_name'              => _x( 'Staff Role', 'Taxonomy Singular Name', 'ocl-theme' ),
		'menu_name'                  => __( 'Staff Roles', 'ocl-theme' ),
		'all_items'                  => __( 'All Staff Roles', 'ocl-theme' ),
		'parent_item'                => __( 'Parent Staff Role', 'ocl-theme' ),
		'parent_item_colon'          => __( 'Parent Staff Role:', 'ocl-theme' ),
		'new_item_name'              => __( 'New Staff Role', 'ocl-theme' ),
		'add_new_item'               => __( 'Add New Staff Role', 'ocl-theme' ),
		'edit_item'                  => __( 'Edit Staff Role', 'ocl-theme' ),
		'update_item'                => __( 'Update Staff Role', 'ocl-theme' ),
		'separate_items_with_commas' => __( 'Separate staff roles with commas', 'ocl-theme' ),
		'search_items'               => __( 'Search Staff Roles', 'ocl-theme' ),
		'add_or_remove_items'        => __( 'Add or Remove Staff Role', 'ocl-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used staff roles', 'ocl-theme' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'roles', 'staff', $args );
}
// Hook into the 'init' action
add_action( 'init', 'create_staff_roles', 0 );
?>