<?php

//** === === === === === === ===>>> THEME SETUP
if (!function_exists('tfd_setup')){ function tfd_setup(){

    // HIDE ADMIN MENU / BAR
    show_admin_bar(false);

    // DISABLE FILE EDITOR
    define('DISALLOW_FILE_EDIT', true);

	// REGISTER NAV MENU
	register_nav_menu('main-nav-menu', __('Main Nav Menu'));
	register_nav_menu('footer-nav', __('Footer Navigation'));

	// ADD FEATURED IMAGE SUPPORT
	add_theme_support('post-thumbnails');

	// ADD CUSTOM IMAGE SIZES
	add_image_size('page', 1120, 400, true);

	// CUSTOM POST THUMBNAIL SIZE
	// set_post_thumbnail_size(200, 140, true);

	// CREATE ACF OPTIONS PAGE
	if (function_exists('acf_add_options_page')){
		acf_add_options_page(array(
			'page_title' 	=> 'Together for Development Options',
			'menu_title'	=> 'TFD Options',
			'menu_slug' 	=> 'tfd-options',
			'icon_url'		=> 'dashicons-clipboard',
			'position' 		=> 2,
			'redirect'		=> false
		));
	}

	// LOAD FAVICON.PNG
	if (file_exists(TEMPLATEPATH . "/images/tfd_favicon.png")){
		add_action('wp_head', 'include_favicon_png');
		function include_favicon_png(){ ?>
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/tfd_favicon.png" type="image/png"/>
		<?php }
	}
    
	// LOAD FAVICON.ICO
	if (file_exists(TEMPLATEPATH . "/images/tfd_favicon.ico")){
		add_action('wp_head', 'include_favicon');
		function include_favicon(){ ?>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/tfd_favicon.ico" type="image/x-icon"/>
		<?php }
	}
    
}} add_action('after_setup_theme', 'tfd_setup');


//** === === === === === === ===>>> LOAD JAVASCRIPT AND CSS
if (!function_exists('tfd_scripts')){ function tfd_scripts(){

	// LOAD CSS
	wp_enqueue_style('fancybox', get_template_directory_uri().'/css/jquery.fancybox.css', null, null);
    wp_enqueue_style('slicknav', get_template_directory_uri().'/css/slicknav.css', null, null);
	wp_enqueue_style('style', get_stylesheet_uri(), null, null);

	// LOAD JQUERY - IN FOOTER
	wp_deregister_script('jquery');
	wp_register_script('jquery', '/wp-includes/js/jquery/jquery.js', false, null, true);
	wp_enqueue_script('jquery');

	// LOAD BACKSTRETCH
	wp_register_script('backstretch', get_template_directory_uri().'/js/jquery.backstretch.min.js', array('jquery'), null, true);
	wp_enqueue_script('backstretch');

    // LOAD SLICKNAV
    wp_register_script('slicknav', get_template_directory_uri().'/js/jquery.slicknav.min.js', array('jquery'), null, true);
    wp_enqueue_script('slicknav');
    
	// LOAD FANCYBOX
	wp_register_script('fancybox', get_template_directory_uri().'/js/jquery.fancybox.js', array('jquery'), null, true);
	wp_enqueue_script('fancybox');

    // LOAD CENTERR
    wp_register_script('centerr', get_template_directory_uri() . '/js/jquery.centerr-min.js', null, null, true);
    wp_enqueue_script('centerr');
    
    // LOAD SAMESIZR
    wp_register_script('samesizr', get_template_directory_uri() . '/js/jquery.samesizr-min.js', null, null, true);
    wp_enqueue_script('samesizr');

    // LOAD SCROLLTO
    // wp_register_script('scrollTo', get_template_directory_uri() . '/js/jquery.scrollTo.js', null, null, true);
    // wp_enqueue_script('scrollTo');

	// LOAD MAIN.JS
	wp_register_script('main', get_template_directory_uri().'/js/main.js', array('jquery'), null, true);
	wp_enqueue_script('main');

}} add_action('wp_enqueue_scripts', 'tfd_scripts', 999);


//** === === === === === === ===>>> LOAD FOOTER CSS
if (!function_exists('tfd_add_footer_styles')){ function tfd_add_footer_styles(){

    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Roboto+Slab:400,700', null, null);
    wp_enqueue_style('hover', get_template_directory_uri().'/css/hover-min.css', null, null);
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', null, null);

}} add_action('get_footer', 'tfd_add_footer_styles');


//** === === === === === === ===>>> PAGE TITLES SANS SEO PLUGIN
function sans_seo_wp_title($title, $sep){
	global $paged, $page;

	if (is_feed())
		return $title;

	$title .= get_bloginfo('name');
	$site_description = get_bloginfo('description', 'display');

	if ($site_description && (is_home() || is_front_page()))
		$title = "$title $sep $site_description";

	if ($paged >= 2 || $page >= 2)
		$title = sprintf(__('Page %s', 'mayer'),max($paged,$page)) . " $sep $title";

	return $title;
}
add_filter('wp_title', 'sans_seo_wp_title', 10, 2);


//** === === === === === === ===>>> LOAD POST-SPECIFIC JAVASCRIPTS IN FOOTER
if (!function_exists('get_page_javascripts')) { function get_page_javascripts(){
	global $post;
	wp_reset_query();

	// Check if it's a child page
	if (is_page() && $post->post_parent > 0){
	    $parent = get_post($post->post_parent)->post_name;
	    if (file_exists(TEMPLATEPATH . "/js/$parent.js")){ ?>
			<script src="<?php echo get_template_directory_uri(); ?>/js/<?php echo $parent; ?>.js"></script>
		<?php }
	}

	$slug = (is_home() || is_front_page()) ? "home" : get_post($post)->post_name;
	if (file_exists(TEMPLATEPATH . "/js/$slug.js")){ ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/<?php echo $slug; ?>.js"></script>
<?php }

}} add_action('wp_footer', 'get_page_javascripts', 31);


//** === === === === === === ===>>> LOAD TEMPLATE-SPECIFIC JAVASCRIPTS IN FOOTER
if (!function_exists('get_template_javascripts')){ function get_template_javascripts() {

    global $template;
    $template = str_replace('.php', '', str_replace(get_template_directory().'/', '', $template));

    if (file_exists(TEMPLATEPATH . "/js/$template.js")){ ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/<?php echo $template; ?>.js"></script>
<?php }

}} add_action('wp_footer', 'get_template_javascripts', 30);


//** === === === === === === ===>>> LOAD TEMPLATE-SPECIFIC CSS
if (!function_exists('get_template_css')){ function get_template_css() {

    global $template;
    $template = str_replace('.php', '', str_replace(get_template_directory().'/', '', $template));

    if (file_exists(TEMPLATEPATH . "/css/$template.css"))
	    wp_enqueue_style('template-specific', get_template_directory_uri()."/css/$template.css", null, null);

}} add_action('wp_enqueue_scripts', 'get_template_css', 999);


//** === === === === === === ===>>> LOAD POST-SPECIFIC CSS
if (!function_exists('get_post_css')){ function get_post_css() {

    global $post;
	wp_reset_query();

	// Check if it's a child page
	if (is_page() && $post->post_parent > 0){
	    $parent = get_post($post->post_parent)->post_name;
	    if (file_exists(TEMPLATEPATH . "/css/$parent.css"))
            wp_enqueue_style('parent-page', get_template_directory_uri()."/css/$parent.css", null, null);
    }

    $slug = (is_home() || is_front_page()) ? "home" : get_post($post)->post_name;
    if (file_exists(TEMPLATEPATH . "/css/$slug.css"))
        wp_enqueue_style('post-specific', get_template_directory_uri()."/css/$slug.css", null, null);

}} add_action('wp_enqueue_scripts', 'get_post_css', 999);


//** === === === === === === ===>>> GET FEATURED IMAGE URL
function wp_get_thumbnail_url($id, $size = "thumbnail"){

	if (has_post_thumbnail($id)){
		$img_array = wp_get_attachment_image_src(get_post_thumbnail_id($id), $size);
		$img_url = $img_array[0];
		return $img_url;
    }

    return false;

}


//** === === === === === === ===>>> HIDE WORDPRESS VERSION
if (!function_exists('remove_version')){ function remove_version(){

  return '';

}} add_filter('the_generator', 'remove_version');

